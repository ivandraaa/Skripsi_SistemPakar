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
    public function index() // Menampilkan daftar semua putusan.
    {
        // Mengambil semua data putusan dari model Putusan dan mengirimkannya ke view 'admin.putusan.admin_semua_putusan
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
    public function create() // Menampilkan formulir untuk membuat putusan baru.
    {
        // Mengambil data identifikasi dan kondisi user dari model Identifikasi dan KondisiUser, kemudian mengirimnya ke view 'clients.form_putusan'
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
    public function store(StorePutusanRequest $request) // Menyimpan putusan ke Database
    {
        // Akan memfilter dan mengambil data dari input form dengan nama 'kondisi'.
        $filteredArray = $request->post('kondisi');
        $kondisi = array_filter($filteredArray, function ($value) {
            return $value !== null;
        });

        // Jika nilai kondisi tidak sama dengan '#' (id), maka kode identifikasi dan bobot pilihan ditambahkan ke array terkait.
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

        // Mendapatkan semua pasal dari model TingkatPasal dan melakukan loop melalui setiap pasal.
        $pasal = TingkatPasal::all();
        $cf = 0;
        $arrIdentifikasi = [];
        for ($i = 0; $i < count($pasal); $i++) {
            // Inisialisasi array untuk menyimpan nilai CF dan kode pasal pada setiap iterasi.
            $cfArr = [
                'cf' => [],
                'kode_pasal' => [],
            ];
            // Mengambil aturan-aturan yang terkait dengan pasal yang sedang di-loop dari model Keputusan.
            $ruleSetiapPasal = Keputusan::whereIn('kode_identifikasi', $kodeIdentifikasi)
                ->where('kode_pasal', $pasal[$i]->kode_pasal)
                ->get();
            // Memeriksa apakah terdapat aturan untuk pasal yang sedang diproses, Jika ya, maka melakukan loop melalui setiap aturan.
            if (count($ruleSetiapPasal) > 0) {
                foreach ($ruleSetiapPasal as $ruleKey) {
                    // Mencari bobot pilihan yang sesuai dengan kode identifikasi dari aturan yang sedang diproses.
                    $bobot = $bobotPilihan[array_search($ruleKey->kode_identifikasi, array_column($bobotPilihan, 0))][1];
                    // Mengalikan nilai MB (Measure of Belief) dan MD (Measure of Disbelief) dengan bobot pilihan.
                    $mb = $ruleKey->mb * $bobot;
                    $md = $ruleKey->md * $bobot;
                    // Menghitung nilai Confidence Factor (CF) dengan mengurangkan nilai MD dari MB.
                    $cf = $mb - $md;
                    array_push($cfArr['cf'], $cf);
                    array_push($cfArr['kode_pasal'], $ruleKey->kode_pasal);
                }
                // Memanggil fungsi $this->getGabunganCf() untuk menggabungkan nilai CF dari setiap aturan.
                $res = $this->getGabunganCf($cfArr);
                array_push($arrIdentifikasi, $res);
            // Jika tidak ada aturan untuk pasal tersebut, maka skip dan lanjut ke pasal berikutnya.
            } else {
                continue;
            }
        }

        // Setelah proses perhitungan selesai, data putusan baru dibuat dan disimpan ke dalam database berbentuk JSON.
        $putusan_id = uniqid();
        $ins = Putusan::create([
            'putusan_id' => strval($putusan_id),
            'data_putusan' => json_encode($arrIdentifikasi),
            'kondisi' => json_encode($bobotPilihan),
        ]);
        return redirect()->route('spk.result', ['putusan_id' => $putusan_id]);
    }

    public function getGabunganCf($cfArr) // // Menggabungkan nilai Confidence Factor (CF) dari setiap aturan yang terkait dengan suatu pasal.
    {
        // Jika tidak ada nilai Confidence Factor (CF) yang disimpan dalam array, maka fungsi mengembalikan nilai 0.
        if (!$cfArr['cf']) {
            return 0;
        }
        // Jika hanya terdapat satu nilai Confidence Factor (CF), maka fungsi langsung mengembalikan nilai tersebut bersama dengan kode pasal terkait.
        if (count($cfArr['cf']) == 1) {
            return [
                'value' => strval($cfArr['cf'][0]),
                'kode_pasal' => $cfArr['kode_pasal'][0],
            ];
        }

        // Jika terdapat lebih dari satu nilai Confidence Factor (CF), maka fungsi akan menggabungkannya.
        $cfoldGabungan = $cfArr['cf'][0];
        for ($i = 0; $i < count($cfArr['cf']) - 1; $i++) {
            // Proses penggabungan dilakukan dengan iterasi melalui seluruh nilai CF dan menghitung nilai gabungan menggunakan rumus: 𝐶𝐹𝑐𝑜𝑚𝑏𝑖𝑛𝑒𝐶𝐹[ℎ, 𝑒]1,2 = 𝐶𝐹[ℎ, 𝑒]1 + 𝐶𝐹[ℎ, 𝑒]2 ∗ [1 − 𝐶𝐹[ℎ, 𝑒]1]
            $cfoldGabungan = $cfoldGabungan + $cfArr['cf'][$i + 1] * (1 - $cfoldGabungan);
        }

        // Fungsi mengembalikan hasil gabungan Confidence Factor (CF) dan kode pasal terkait.
        return [
            'value' => "$cfoldGabungan",
            'kode_pasal' => $cfArr['kode_pasal'][0],
        ];
    }

    public function putusanResult($putusan_id) // Menampilkan hasil dari proses sistem pakar terkait suatu putusan
    {
        // Pertama, fungsi mencari data putusan berdasarkan putusan_id. Jika putusan tidak ditemukan, fungsi akan mengembalikan response redirect ke halaman sebelumnya dengan pesan kesalahan.
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

        // Dilakukan iterasi pada data putusan untuk mendapatkan putusan dengan nilai tertinggi berdasarkan value.
        foreach ($data_putusan as $val) {
            // Pengecekan apakah setiap elemen data putusan memiliki kunci 'value' dan 'kode_pasal'.
            // Jika ya, dilakukan pengecekan apakah nilai (Confidence Factor) yang ditemukan lebih tinggi dari nilai sebelumnya ($int).
            // Jika nilai lebih tinggi, nilai tersebut diupdate dan informasi putusan yang memiliki nilai tersebut disimpan dalam variabel $putusan_dipilih.
            // Pada value, disimpan nilai Confidence Factor tertinggi, dan pada kode_pasal, disimpan objek TingkatPasal yang sesuai dengan kode pasal dari data putusan.
            if (isset($val['value']) && isset($val['kode_pasal'])) {
                if (floatval($val['value']) > $int) {
                    $int = floatval($val['value']);
                    // Setelah iterasi selesai, variabel $putusan_dipilih akan berisi informasi mengenai putusan dengan nilai Confidence Factor tertinggi.
                    // value: Nilai Confidence Factor tertinggi.
                    // kode_pasal: Objek TingkatPasal yang sesuai dengan kode pasal dari data putusan.
                    $putusan_dipilih = [
                        'value' => $int,
                        'kode_pasal' => TingkatPasal::where('kode_pasal', $val['kode_pasal'])->first(),
                    ];
                }
            }
        }

        // Penanganan apabila hasil putusan tidak ditemukan atau kunci "kode_pasal" tidak ada pada hasil putusan. Mengembalikan response redirect ke halaman sebelumnya dengan pesan kesalahan.
        if (!$putusan_dipilih || !isset($putusan_dipilih['kode_pasal'])) {
            // Handle ketika kunci "kode_pasal" tidak ditemukan pada $putusan_dipilih
            return redirect()
                ->back()
                ->with('errorModal', 'HASIL PUTUSAN TIDAK DITEMUKAN!! Identifikasi yang Anda Inputkan Belum Cukup Untuk Mengidentifikasikan Perkara')
                ->with('saran', '*Pastikan Anda telah mengisi identifikasi dengan lengkap dan benar, sesuai dengan fakta perkara yang terjadi, dan perhatikan nilai kepercayaan yang anda yakini.');
        }

        // Mendapatkan data keputusan dari database berdasarkan identifikasi dan kode pasal terkait hasil putusan.
        $kodeIdentifikasi = array_column($identifikasi, 0);
        $kode_pasal = $putusan_dipilih['kode_pasal']->kode_pasal;
        $pakar = Keputusan::whereIn('kode_identifikasi', $kodeIdentifikasi)
            ->where('kode_pasal', $kode_pasal)
            ->get();

        $identifikasi_by_user = [];

        // Melakukan iterasi pada data keputusan pakar dan data identifikasi. Pada akhir iterasi, array tersebut berisi identifikasi yang diberikan oleh pengguna.
        foreach ($pakar as $key) {
            foreach ($identifikasi as $gKey) {
                if ($gKey[0] == $key->kode_identifikasi) {
                    $identifikasi_by_user[] = $gKey;
                }
            }
        }

        // Melakukan iterasi pada data keputusan pakar. Setiap nilai Confidence Factor (CF) pakar dihitung sebagai selisih antara nilai (MB) dan nilai (MD).
        $nilaiPakar = [];
        foreach ($pakar as $key) {
            $nilaiPakar[] = $key->mb - $key->md;
        }

        // Mengambil nilai identifikasi pengguna dari array $identifikasi_by_user. Nilai tersebut diambil dari kolom kedua (indeks 1) pada setiap elemen array identifikasi pengguna.
        $nilaiUser = array_column($identifikasi_by_user, 1);

        // Memanggil fungsi getCfCombinasi untuk menghitung kombinasi Confidence Factor (CF) antara pakar dan pengguna.
        $cfKombinasi = $this->getCfCombinasi($nilaiPakar, $nilaiUser);

        // Memanggil fungsi getGabunganCf untuk menghitung hasil akhir dari kombinasi CF.
        $hasil = $this->getGabunganCf($cfKombinasi);

        // Mendapatkan data artikel terkait putusan berdasarkan kode pasal.
        $artikel = Artikel::where('kode_pasal', $kode_pasal)->first();

        // Mengembalikan view cl_putusan_result dengan data-data terkait yang akan digunakan untuk menampilkan hasil putusan kepada pengguna.
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

    public function getCfCombinasi($pakar, $user) // Mengkombinasikan nilai Confidence Factor (CF) dari pakar dan pengguna untuk suatu pasal
    {
        $cfComb = [];
        // Fungsi melakukan pengecekan apakah jumlah nilai Confidence Factor (CF) dari pakar sama dengan jumlah nilai CF dari pengguna. Jika jumlahnya sama, proses kombinasi akan dilakukan.
        if (count($pakar) == count($user)) {
            // Fungsi melakukan iterasi melalui setiap nilai Confidence Factor (CF) dari pakar dan pengguna. Setiap nilai CF dari pakar dikalikan dengan nilai CF yang sesuai dari pengguna.
            for ($i = 0; $i < count($pakar); $i++) {
                $res = $pakar[$i] * $user[$i];
                array_push($cfComb, floatval($res));
            }
            // Fungsi mengembalikan hasil kombinasi Confidence Factor (CF) beserta kode pasal. Kode pasal diset ke ['0'] untuk menandakan bahwa hasil kombinasi ini tidak terkait dengan suatu pasal tertentu.
            return [
                'cf' => $cfComb,
                'kode_pasal' => ['0'],
            ];
        // Jika jumlah nilai CF pakar dan pengguna tidak sama, fungsi akan mengembalikan string 'Data tidak valid'.
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
