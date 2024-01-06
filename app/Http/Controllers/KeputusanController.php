<?php

namespace App\Http\Controllers;

use App\Models\Keputusan;
use App\Http\Requests\StoreKeputusanRequest;
use App\Http\Requests\UpdateKeputusanRequest;

class KeputusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keputusan = Keputusan::paginate(15);
        return view('admin.keputusan.keputusan', compact('keputusan'));
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
     * @param  \App\Http\Requests\StoreKeputusanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKeputusanRequest $request)
    {
        // dd($request->all());
        $valid = $request->validate([
            "kode_identifikasi" => 'required:keputusan,kode_identifikasi',
            'kode_pasal' => 'required:keputusan,kode_pasal',
            'mb' => 'required:keputusan,mb',
            'md' => 'required:keputusan,md',

        ]);
        Keputusan::create($valid);
        return redirect()->route('keputusan.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">
        Keputusan telah ditambahkan
        </div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function show(Keputusan $keputusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Keputusan $keputusan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKeputusanRequest  $request
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKeputusanRequest $request, Keputusan $keputusan)
    {
        $valid = $request->validate([
            "kode_identifikasi" => "required",
            "kode_pasal" => "required",
            "mb" => "required",
            "md" => "required",
        ]);
        $keputusan->update($valid);
        return redirect()->route('keputusan.index')->with('pesan', '<div class="alert alert-info p-3 mt-3" role="alert">
        Keputusan telah diperbarui
        </div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keputusan $keputusan)
    {
        $keputusan->delete();
        return redirect()->route('keputusan.index')->with('pesan', '<div class="alert alert-danger p-3 mt-3" role="alert">
        Keputusan telah dihapus
        </div>');
    }
}
