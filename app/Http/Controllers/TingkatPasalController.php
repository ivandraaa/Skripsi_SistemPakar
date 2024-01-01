<?php

namespace App\Http\Controllers;

use App\Models\TingkatPasal;
use App\Http\Requests\StoreTingkatPasalRequest;
use App\Http\Requests\UpdateTingkatPasalRequest;

class TingkatPasalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pasal.pasal', [
            'pasal' => TingkatPasal::all()
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
     * @param  \App\Http\Requests\StoreTingkatPasalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTingkatPasalRequest $request)
    {
        $valid = $request->validate([
            'kode_pasal' => 'required|unique:tingkat_pasal,kode_pasal',
            'pasal' => 'required'
        ]);
        TingkatPasal::create($valid);
        return redirect()->route('pasal.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">
        Daftar pasal telah ditambahkan
        </div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TingkatPasal  $tingkatPasal
     * @return \Illuminate\Http\Response
     */
    public function show(TingkatPasal $tingkatPasal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TingkatPasal  $tingkatPasal
     * @return \Illuminate\Http\Response
     */
    public function edit(TingkatPasal $tingkatPasal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTingkatPasalRequest  $request
     * @param  \App\Models\TingkatPasal  $tingkatPasal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTingkatPasalRequest $request, $tingkatPasal)
    {
        $valid = $request->validate([
            'pasal' => 'required'
        ]);
        $status = TingkatPasal::find($tingkatPasal)->update($valid);
        if ($status) {
            return redirect()->route('pasal.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">Daftar pasal telah diupdate</div>');
        }
        return redirect()->route('pasal.index')->with('pesan', '<div class="alert alert-warning p-3 mt-3" role="alert">Daftar pasal gagal diupdate</div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TingkatPasal  $tingkatPasal
     * @return \Illuminate\Http\Response
     */
    public function destroy($tingkatPasal)
    {
        // dd($tingkatPasal);
        TingkatPasal::find($tingkatPasal)->delete();
        return redirect()->route('pasal.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">
        Daftar pasal telah dihapus
        </div>');
    }
}
