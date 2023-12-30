<?php

namespace App\Http\Controllers;

use App\Models\TingkatPenyakit;
use App\Http\Requests\StoreTingkatPenyakitRequest;
use App\Http\Requests\UpdateTingkatPenyakitRequest;

class TingkatPenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.penyakit.penyakit', [
            'penyakit' => TingkatPenyakit::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTingkatPenyakitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTingkatPenyakitRequest $request)
    {
        $valid = $request->validate([
            'kode_penyakit' => 'required|unique:tingkat_penyakit,kode_penyakit',
            'penyakit' => 'required'
        ]);
        TingkatPenyakit::create($valid);
        return redirect()->route('penyakit.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">
        Daftar penyakit telah ditambahkan
        </div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TingkatPenyakit  $tingkatPenyakit
     * @return \Illuminate\Http\Response
     */
    public function show(TingkatPenyakit $tingkatPenyakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TingkatPenyakit  $tingkatPenyakit
     * @return \Illuminate\Http\Response
     */
    public function edit(TingkatPenyakit $tingkatPenyakit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTingkatPenyakitRequest  $request
     * @param  \App\Models\TingkatPenyakit  $tingkatPenyakit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTingkatPenyakitRequest $request, $tingkatPenyakit)
    {
        $valid = $request->validate([
            'penyakit' => 'required'
        ]);
        $status = TingkatPenyakit::find($tingkatPenyakit)->update($valid);
        if ($status) {
            return redirect()->route('penyakit.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">Daftar penyakit telah diupdate</div>');
        }
        return redirect()->route('penyakit.index')->with('pesan', '<div class="alert alert-warning p-3 mt-3" role="alert">Daftar penyakit gagal diupdate</div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TingkatPenyakit  $tingkatPenyakit
     * @return \Illuminate\Http\Response
     */
    public function destroy($tingkatPenyakit)
    {
        // dd($tingkatPenyakit);
        TingkatPenyakit::find($tingkatPenyakit)->delete();
        return redirect()->route('penyakit.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">
        Daftar penyakit telah dihapus
        </div>');
    }
}
