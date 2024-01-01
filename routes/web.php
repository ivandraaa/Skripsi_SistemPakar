<?php

use App\Http\Controllers\PutusanController;
use App\Http\Controllers\IdentifikasiController;
use App\Http\Controllers\TingkatPasalController;
use App\Models\Putusan;
use App\Models\TingkatPasal;
use App\Models\KondisiUser;
use App\Models\Identifikasi;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('landing');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $data = [
            'identifikasi' => Identifikasi::all(),
            'kondisi_user' => KondisiUser::all(),
            'user' => User::all(),
            'tingkat_pasal' => TingkatPasal::all()

        ];
        return view('admin.dashboard', $data);
    });

    Route::get('/dashboard/admin', function () {
        $data = [
            'user' => User::all()
        ];
        return view('admin.list_admin', $data);
    });

    Route::get('/dashboard/add_admin', function () {
        return view('admin.add_admin');
    });




    Route::get('/home', function () {
        return redirect('/dashboard');
    });

    Route::resource('/identifikasi', IdentifikasiController::class);
    Route::resource('/pasal', TingkatPasalController::class);
    Route::resource('/spk', PutusanController::class)->only('index');
});


Route::get('/form', function () {
    $data = [
        'identifikasi' => Identifikasi::all(),
        'kondisi_user' => KondisiUser::all()
    ];
    return view('form', $data);
});

Route::get('/form-faq', function () {
    $data = [
        'identifikasi' => Identifikasi::all(),
        'kondisi_user' => KondisiUser::all()
    ];

    return view('faq', $data);
})->name('cl.form');

Route::resource('/spk', PutusanController::class);
Route::get('/spk/result/{putusan_id}', [PutusanController::class, 'putusanResult'])->name('spk.result');

Auth::routes();
