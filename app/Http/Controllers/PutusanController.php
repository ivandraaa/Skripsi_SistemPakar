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
            'putusan' => $putusan,
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
            'kondisi_user' => KondisiUser::all(),
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
            if ($val != '#') {
                echo "key : $key, val : $val";
                echo '<br>';
                array_push($kodeIdentifikasi, $key);
                array_push($bobotPilihan, [$key, $val]);
            }
        }

        $pasal = TingkatPasal::all();
        $cf = 0;
        // pasal
        $arrIdentifikasi = [];
        for ($i = 0; $i < count($pasal); $i++) {
            $cfArr = [
                'cf' => [],
                'kode_pasal' => [],
            ];
            $ruleSetiapPasal = Keputusan::whereIn('kode_identifikasi', $kodeIdentifikasi)
                ->where('kode_pasal', $pasal[$i]->kode_pasal)
                ->get();
            if (count($ruleSetiapPasal) > 0) {
                foreach ($ruleSetiapPasal as $ruleKey) {
                    $bobot = $bobotPilihan[array_search($ruleKey->kode_identifikasi, array_column($bobotPilihan, 0))][1];
                    $mb = $ruleKey->mb * $bobot;
                    $md = $ruleKey->md * $bobot;
                    $cf = $mb - $md;
                    array_push($cfArr['cf'], $cf);
                    array_push($cfArr['kode_pasal'], $ruleKey->kode_pasal);
                }
                $res = $this->getGabunganCf($cfArr);
                array_push($arrIdentifikasi, $res);
            } else {
                continue;
            }
        }

        $putusan_id = uniqid();
        $ins = Putusan::create([
            'putusan_id' => strval($putusan_id),
            'data_putusan' => json_encode($arrIdentifikasi),
            'kondisi' => json_encode($bobotPilihan),
        ]);
        return redirect()->route('spk.result', ['putusan_id' => $putusan_id]);
    }

    public function getGabunganCf($cfArr)
    {
        if (!$cfArr['cf']) {
            return 0;
        }
        if (count($cfArr['cf']) == 1) {
            return [
                'value' => strval($cfArr['cf'][0]),
                'kode_pasal' => $cfArr['kode_pasal'][0],
            ];
        }

        $cfoldGabungan = $cfArr['cf'][0];
        for ($i = 0; $i < count($cfArr['cf']) - 1; $i++) {
            $cfoldGabungan = $cfoldGabungan + $cfArr['cf'][$i + 1] * (1 - $cfoldGabungan);
        }

        return [
            'value' => "$cfoldGabungan",
            'kode_pasal' => $cfArr['kode_pasal'][0],
        ];
    }

    public function putusanResult($putusan_id)
    {
        $putusan = Putusan::where('putusan_id', $putusan_id)->first();

        if (!$putusan) {
            return redirect()
                ->back()
                ->with('errorModal', 'Putusan tidak ditemukan.')
                ->withInput();
        }

        $identifikasi = json_decode($putusan->kondisi, true);
        $data_putusan = json_decode($putusan->data_putusan, true);

        $int = 0.0;
        $putusan_dipilih = null;

        foreach ($data_putusan as $val) {
            if (isset($val['value']) && isset($val['kode_pasal'])) {
                if (floatval($val['value']) > $int) {
                    $int = floatval($val['value']);
                    $putusan_dipilih = [
                        'value' => $int,
                        'kode_pasal' => TingkatPasal::where('kode_pasal', $val['kode_pasal'])->first(),
                    ];
                }
            }
        }

        if (!$putusan_dipilih || !isset($putusan_dipilih['kode_pasal'])) {
            // Handle ketika kunci "kode_pasal" tidak ditemukan pada $putusan_dipilih
            return redirect()
                ->back()
                ->with('errorModal', 'HASIL PUTUSAN TIDAK DITEMUKAN!! Identifikasi yang Anda Inputkan Belum Cukup Untuk Mengidentifikasikan Perkara')
                ->with('saran', '*Pastikan Anda telah mengisi identifikasi dengan lengkap dan benar, sesuai dengan fakta perkara yang terjadi, dan perhatikan nilai kepercayaan yang anda yakini.');
        }

        $kodeIdentifikasi = array_column($identifikasi, 0);

        $kode_pasal = $putusan_dipilih['kode_pasal']->kode_pasal;
        $pakar = Keputusan::whereIn('kode_identifikasi', $kodeIdentifikasi)
            ->where('kode_pasal', $kode_pasal)
            ->get();

        $identifikasi_by_user = [];

        foreach ($pakar as $key) {
            foreach ($identifikasi as $gKey) {
                if ($gKey[0] == $key->kode_identifikasi) {
                    $identifikasi_by_user[] = $gKey;
                }
            }
        }

        $nilaiPakar = [];

        foreach ($pakar as $key) {
            $nilaiPakar[] = $key->mb - $key->md;
        }

        $nilaiUser = array_column($identifikasi_by_user, 1);

        $cfKombinasi = $this->getCfCombinasi($nilaiPakar, $nilaiUser);
        $hasil = $this->getGabunganCf($cfKombinasi);

        $artikel = Artikel::where('kode_pasal', $kode_pasal)->first();

        return view('clients.cl_putusan_result', [
            'putusan' => $putusan,
            'putusan_dipilih' => $putusan_dipilih,
            'identifikasi' => $identifikasi,
            'data_putusan' => $data_putusan,
            'pakar' => $pakar,
            'identifikasi_by_user' => $identifikasi_by_user,
            'cf_kombinasi' => $cfKombinasi,
            'hasil' => $hasil,
            'artikel' => $artikel,
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
                'cf' => $cfComb,
                'kode_pasal' => ['0'],
            ];
        } else {
            return 'Data tidak valid';
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
