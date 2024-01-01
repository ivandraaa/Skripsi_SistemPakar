<?php

namespace App\Http\Controllers;

use App\Models\Identifikasi;
use App\Http\Requests\StoreIdentifikasiRequest;
use App\Http\Requests\UpdateIdentifikasiRequest;

class IdentifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $identifikasi = Identifikasi::paginate(15);
        return view('admin.identifikasi.identifikasi', compact('identifikasi'));
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
     * @param  \App\Http\Requests\StoreIdentifikasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIdentifikasiRequest $request)
    {
        // dd($request->all());
        $valid = $request->validate([
            "kode_identifikasi" => 'required|unique:identifikasi,kode_identifikasi',
            'identifikasi' => 'required|unique:identifikasi,identifikasi'
        ]);
        Identifikasi::create($valid);
        return redirect()->route('identifikasi.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">
        Identifikasi telah ditambahkan
        </div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Identifikasi  $identifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(Identifikasi $identifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Identifikasi  $identifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Identifikasi $identifikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIdentifikasiRequest  $request
     * @param  \App\Models\Identifikasi  $identifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIdentifikasiRequest $request, Identifikasi $identifikasi)
    {
        $valid = $request->validate([
            "identifikasi" => "required"
        ]);
        $identifikasi->update($valid);
        return redirect()->route('identifikasi.index')->with('pesan', '<div class="alert alert-info p-3 mt-3" role="alert">
        Identifikasi telah diperbarui
        </div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Identifikasi  $identifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Identifikasi $identifikasi)
    {
        // dd($identifikasi);
        $identifikasi->delete();
        return redirect()->route('identifikasi.index')->with('pesan', '<div class="alert alert-danger p-3 mt-3" role="alert">
        Identifikasi telah dihapus
        </div>');
    }
}
