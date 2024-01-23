<?php

namespace App\Http\Controllers;

use App\Models\Putusan;
use App\Http\Requests\StorePutusanRequest;
use App\Http\Requests\UpdatePutusanRequest;
use App\Models\Artikel;
use App\Models\Identifikasi;
use App\Models\Keputusan;
use App\Models\Kode_Identifikasi;
use App\Models\KondisiUser;
use App\Models\TingkatPasal;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;
use function PHPSTORM_META\type;

class PutusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $putusan = Putusan::all();

        return view('admin.putusan.admin_semua_putusan', [
            "putusan" => $putusan,
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
            'identifikasi' => Identifikasi::all(),
            'kondisi_user' => KondisiUser::all()
        ];

        return view('clients.form_putusan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePutusanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePutusanRequest $request)
    {
        $filteredArray = $request->post('kondisi');
        $kondisi = array_filter($filteredArray, function ($value) {
            return $value !== null;
        });

        // dd($kondisi);
        $kodeIdentifikasi = [];
        $bobotPilihan = [];
        foreach ($kondisi as $key => $val) {
            if ($val != "#") {
                echo "key : $key, val : $val";
                echo "<br>";
                array_push($kodeIdentifikasi, $key);
                array_push($bobotPilihan, array($key, $val));
            }
        }

        $pasal = TingkatPasal::all();
        $cf = 0;
        // pasal
        $arrIdentifikasi = [];
        for ($i = 0; $i < count($pasal); $i++) {
            $cfArr = [
                "cf" => [],
                "kode_pasal" => []
            ];
            $ruleSetiapPasal = Keputusan::whereIn("kode_identifikasi", $kodeIdentifikasi)->where("kode_pasal", $pasal[$i]->kode_pasal)->get();
            if (count($ruleSetiapPasal) > 0) {
                foreach ($ruleSetiapPasal as $ruleKey) {
                    $bobot = $bobotPilihan[array_search($ruleKey->kode_identifikasi, array_column($bobotPilihan, 0))][1];
                    $mb = $ruleKey->mb * $bobot;
                    $md = $ruleKey->md * $bobot;
                    $cf = ($mb - $md);
                    array_push($cfArr["cf"], $cf);
                    array_push($cfArr["kode_pasal"], $ruleKey->kode_pasal);
                }
                $res = $this->getGabunganCf($cfArr);
                array_push($arrIdentifikasi, $res);
            } else {
                continue;
            }
        }
        // dd($arrIdentifikasi);
        // echo "<br> arrIdentifikasi : ";
        // print_r($arrIdentifikasi);
        // echo "<br>";

        $putusan_id = uniqid();
        $ins =  Putusan::create([
            'putusan_id' => strval($putusan_id),
            'data_putusan' => json_encode($arrIdentifikasi),
            'kondisi' => json_encode($bobotPilihan)
        ]);

        // CODE UNTUK AUTH NILAI <0
        // $cf = $this->getGabunganCf($cfArr);
        // if (is_array($cf) && isset($cf['value'])) {
        //     $cfValue = $cf['value'];
        
        //     if ($cfValue < 0) {
        //         return redirect()->back()->with('errorModal', 'Lengkapi identifikasi nya kembali, karena hasil yang anda inputkan belum bisa mengidentifikasi dasar hukum yang pelaku langgar.')->withInput();
        //     }
        // } else {
        //     return redirect()->back()->withErrors(['error' => 'Nilai kepercayaan tidak valid.'])->withInput();
        // }
        return redirect()->route('spk.result', ["putusan_id" => $putusan_id]);
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

    public function putusanResult($putusan_id)
    {
        $putusan = Putusan::where('putusan_id', $putusan_id)->first();
        $identifikasi = json_decode($putusan->kondisi, true);
        $data_putusan = json_decode($putusan->data_putusan, true);
        // dd($data_putusan);
        $int = 0.0;
        $putusan_dipilih = [];
        foreach ($data_putusan as $val) {
            // print_r(floatval($val["value"]));
            if (floatval($val["value"]) > $int) {
                $putusan_dipilih["value"] = floatval($val["value"]);
                $putusan_dipilih["kode_pasal"] = TingkatPasal::where("kode_pasal", $val["kode_pasal"])->first();
                $int = floatval($val["value"]);
            }
        }
        // dd($putusan_dipilih);
        // dd($identifikasi);

        $kodeIdentifikasi = [];
        foreach ($identifikasi as $key) {
            array_push($kodeIdentifikasi, $key[0]);
        }
        // dd($kodeIdentifikasi);
        $kode_pasal = $putusan_dipilih["kode_pasal"]->kode_pasal;
        $pakar = Keputusan::whereIn("kode_identifikasi", $kodeIdentifikasi)->where("kode_pasal", $kode_pasal)->get();
        // dd($pakar);
        $identifikasi_by_user = [];
        foreach ($pakar as $key) {
            $i = 0;
            foreach ($identifikasi as $gKey) {
                if ($gKey[0] == $key->kode_identifikasi) {
                    array_push($identifikasi_by_user, $gKey);
                }
            }
        }
        // dd($identifikasi_by_user);

        $nilaiPakar = [];
        foreach ($pakar as $key) {
            array_push($nilaiPakar, ($key->mb - $key->md));
        }
        $nilaiUser = [];
        foreach ($identifikasi_by_user as $key) {
            array_push($nilaiUser, $key[1]);
        }
        // dd($nilaiPakar);
        // dd($nilaiUser);

        $cfKombinasi = $this->getCfCombinasi($nilaiPakar, $nilaiUser);
        // dd($cfKombinasi);
        $hasil = $this->getGabunganCf($cfKombinasi);
        // dd($hasil);

        $artikel = Artikel::where('kode_pasal', $kode_pasal)->first();

        return view('clients.cl_putusan_result', [
            "putusan" => $putusan,
            "putusan_dipilih" => $putusan_dipilih,
            "identifikasi" => $identifikasi,
            "data_putusan" => $data_putusan,
            "pakar" => $pakar,
            "identifikasi_by_user" => $identifikasi_by_user,
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
     * @param  \App\Models\Putusan  $putusan
     * @return \Illuminate\Http\Response
     */
    public function show(Putusan $putusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Putusan  $putusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Putusan $putusan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePutusanRequest  $request
     * @param  \App\Models\Putusan  $putusan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePutusanRequest $request, Putusan $putusan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Putusan  $putusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Putusan $putusan)
    {
        //
    }
}
