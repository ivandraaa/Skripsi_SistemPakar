<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Http\Requests\StoreDiagnosaRequest;
use App\Http\Requests\UpdateDiagnosaRequest;
use App\Models\Artikel;
use App\Models\Gejala;
use App\Models\Keputusan;
use App\Models\Kode_Gejala;
use App\Models\KondisiUser;
use App\Models\TingkatPenyakit;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;
use function PHPSTORM_META\type;

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diagnosa = Diagnosa::all();

        return view('admin.diagnosa.admin_semua_diagnosa', [
            "diagnosa" => $diagnosa,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'gejala' => Gejala::all(),
            'kondisi_user' => KondisiUser::all()
        ];

        return view('clients.form_diagnosa', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiagnosaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiagnosaRequest $request)
    {
        $filteredArray = $request->post('kondisi');
        $kondisi = array_filter($filteredArray, function ($value) {
            return $value !== null;
        });

        // dd($kondisi);
        $kodeGejala = [];
        $bobotPilihan = [];
        foreach ($kondisi as $key => $val) {
            if ($val != "#") {
                echo "key : $key, val : $val";
                echo "<br>";
                array_push($kodeGejala, $key);
                array_push($bobotPilihan, array($key, $val));
            }
        }

        $penyakit = TingkatPenyakit::all();
        $cf = 0;
        // penyakit
        $arrGejala = [];
        for ($i = 0; $i < count($penyakit); $i++) {
            $cfArr = [
                "cf" => [],
                "kode_penyakit" => []
            ];
            $res = 0;
            $ruleSetiapPenyakit = Keputusan::whereIn("kode_gejala", $kodeGejala)->where("kode_penyakit", $penyakit[$i]->kode_penyakit)->get();
            // dd($ruleSetiapPenyakit);
            if (count($ruleSetiapPenyakit) > 0) {
                foreach ($ruleSetiapPenyakit as $ruleKey) {
                    $cf = $ruleKey->mb - $ruleKey->md;
                    array_push($cfArr["cf"], $cf);
                    array_push($cfArr["kode_penyakit"], $ruleKey->kode_penyakit);
                }
                $res = $this->getGabunganCf($cfArr);
                // dd($res);
                // print "<br> res : $res <br>";
                array_push($arrGejala, $res);
            } else {
                continue;
            }
        }
        // dd($arrGejala);
        // echo "<br> arrGejala : ";
        // print_r($arrGejala);
        // echo "<br>";

        $diagnosa_id = uniqid();
        $ins =  Diagnosa::create([
            'diagnosa_id' => strval($diagnosa_id),
            'data_diagnosa' => json_encode($arrGejala),
            'kondisi' => json_encode($bobotPilihan)
        ]);
        // dd($ins);
        return redirect()->route('spk.result', ["diagnosa_id" => $diagnosa_id]);
    }

    public function getGabunganCf($cfArr)
    {
        // if ($cfArr["kode_penyakit"][0] == "P004") {
        //     # code...
        //     dd($cfArr);
        // }
        // echo "<br> cfArr : ";
        // print_r($cfArr);
        // echo "<br>";
        // dd($cfArr);
        if (!$cfArr["cf"]) {
            return 0;
        }
        if (count($cfArr["cf"]) == 1) {
            return [
                "value" => strval($cfArr["cf"][0]),
                "kode_penyakit" => $cfArr["kode_penyakit"][0]
            ];
        }

        $cfoldGabungan = $cfArr["cf"][0];
        // dd($cfoldGabungan);

        // foreach ($cfArr["cf"] as $cf) {
        //     $cfoldGabungan = $cfoldGabungan + ($cf * (1 - $cfoldGabungan));
        // }

        for ($i = 0; $i < count($cfArr["cf"]) - 1; $i++) {
            $cfoldGabungan = $cfoldGabungan + ($cfArr["cf"][$i + 1] * (1 - $cfoldGabungan));
        }


        return [
            "value" => "$cfoldGabungan",
            "kode_penyakit" => $cfArr["kode_penyakit"][0]
        ];
    }

    public function diagnosaResult($diagnosa_id)
    {
        $diagnosa = Diagnosa::where('diagnosa_id', $diagnosa_id)->first();
        $gejala = json_decode($diagnosa->kondisi, true);
        $data_diagnosa = json_decode($diagnosa->data_diagnosa, true);
        // dd($data_diagnosa);
        $int = 0.0;
        $diagnosa_dipilih = [];
        foreach ($data_diagnosa as $val) {
            // print_r(floatval($val["value"]));
            if (floatval($val["value"]) > $int) {
                $diagnosa_dipilih["value"] = floatval($val["value"]);
                $diagnosa_dipilih["kode_penyakit"] = TingkatPenyakit::where("kode_penyakit", $val["kode_penyakit"])->first();
                $int = floatval($val["value"]);
            }
        }
        // dd($diagnosa_dipilih);
        // dd($gejala);

        $kodeGejala = [];
        foreach ($gejala as $key) {
            array_push($kodeGejala, $key[0]);
        }
        // dd($kodeGejala);
        $kode_penyakit = $diagnosa_dipilih["kode_penyakit"]->kode_penyakit;
        $pakar = Keputusan::whereIn("kode_gejala", $kodeGejala)->where("kode_penyakit", $kode_penyakit)->get();
        // dd($pakar);
        $gejala_by_user = [];
        foreach ($pakar as $key) {
            $i = 0;
            foreach ($gejala as $gKey) {
                if ($gKey[0] == $key->kode_gejala) {
                    array_push($gejala_by_user, $gKey);
                }
            }
        }
        // dd($gejala_by_user);

        $nilaiPakar = [];
        foreach ($pakar as $key) {
            array_push($nilaiPakar, ($key->mb - $key->md));
        }
        $nilaiUser = [];
        foreach ($gejala_by_user as $key) {
            array_push($nilaiUser, $key[1]);
        }
        // dd($nilaiPakar);
        // dd($nilaiUser);

        $cfKombinasi = $this->getCfCombinasi($nilaiPakar, $nilaiUser);
        // dd($cfKombinasi);
        $hasil = $this->getGabunganCf($cfKombinasi);
        // dd($hasil);

        $artikel = Artikel::where('kode_penyakit', $kode_penyakit)->first();

        return view('clients.cl_diagnosa_result', [
            "diagnosa" => $diagnosa,
            "diagnosa_dipilih" => $diagnosa_dipilih,
            "gejala" => $gejala,
            "data_diagnosa" => $data_diagnosa,
            "pakar" => $pakar,
            "gejala_by_user" => $gejala_by_user,
            "cf_kombinasi" => $cfKombinasi,
            "hasil" => $hasil,
            "artikel" => $artikel
        ]);
    }

    public function getCfCombinasi($pakar, $user)
    {
        $cfComb = [];
        if (count($pakar) == count($user)) {
            for ($i = 0; $i < count($pakar); $i++) {
                $res = $pakar[$i] * $user[$i];
                array_push($cfComb, floatval($res));
            }
            return [
                "cf" => $cfComb,
                "kode_penyakit" => ["0"]
            ];
        } else {
            return "Data tidak valid";
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function show(Diagnosa $diagnosa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnosa $diagnosa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiagnosaRequest  $request
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiagnosaRequest $request, Diagnosa $diagnosa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnosa $diagnosa)
    {
        //
    }
}
