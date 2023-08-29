<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'Backend.manajemen-pegawai.data-pegawai.index',
            [
                'pegawais' => Pegawai::get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.manajemen-pegawai.data-pegawai.create'); 
    }

    /**3q1
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'nip' => 'required',
        ]);

        $pegawai = Pegawai::get();
        $pegawai = new Pegawai();
        $pegawai->nama_pegawai = $request->input('nama_pegawai');
        $pegawai->nip = $request->input('nip');
        $pegawai->save();
       
        return redirect('data-pegawai')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pegawai = Pegawai::find($id);
        return view('Backend.manajemen-pegawai.data-pegawai.edit', ['pegawai' => $pegawai]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $request->validate([
            'nama_pegawai' => 'required',
            'nip' => 'required',
        ]);

        $pegawai->update([
        'nama_pegawai' => $request->input('nama_pegawai'),
        'nip' => $request->input('nip'),
        ]);

        return redirect('data-pegawai')->with('success', 'Pegawai berhasil diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pegawai::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Pegawai berhasil dihapus.');
    }
}
