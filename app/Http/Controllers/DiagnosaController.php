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
use App\Models\TingkatPasal;
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

        $pasal = TingkatPasal::all();
        $cf = 0;
        // pasal
        $arrGejala = [];
        for ($i = 0; $i < count($pasal); $i++) {
            $cfArr = [
                "cf" => [],
                "kode_pasal" => []
            ];
            $ruleSetiapPasal = Keputusan::whereIn("kode_gejala", $kodeGejala)->where("kode_pasal", $pasal[$i]->kode_pasal)->get();
            if (count($ruleSetiapPasal) > 0) {
                foreach ($ruleSetiapPasal as $ruleKey) {
                    $bobot = $bobotPilihan[array_search($ruleKey->kode_gejala, array_column($bobotPilihan, 0))][1];
                    $mb = $ruleKey->mb * $bobot;
                    $md = $ruleKey->md * $bobot;
                    $cf = $mb - $md;
                    array_push($cfArr["cf"], $cf);
                    array_push($cfArr["kode_pasal"], $ruleKey->kode_pasal);
                }
                $res = $this->getGabunganCf($cfArr);
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
        // if ($cfArr["kode_pasal"][0] == "P004") {
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
                "kode_pasal" => $cfArr["kode_pasal"][0]
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
            "kode_pasal" => $cfArr["kode_pasal"][0]
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
                $diagnosa_dipilih["kode_pasal"] = TingkatPasal::where("kode_pasal", $val["kode_pasal"])->first();
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
        $kode_pasal = $diagnosa_dipilih["kode_pasal"]->kode_pasal;
        $pakar = Keputusan::whereIn("kode_gejala", $kodeGejala)->where("kode_pasal", $kode_pasal)->get();
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

        $artikel = Artikel::where('kode_pasal', $kode_pasal)->first();

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
                "kode_pasal" => ["0"]
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
