<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'Backend.data-master.data-meja.index',
            [
                'mejas' => Meja::get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.data-master.data-meja.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_meja' => 'required|unique:mejas',
        ], [
            'nomor_meja.required' => 'Nomor meja harus diisi.',
            'nomor_meja.unique' => 'Nomor meja sudah tersedia.'
        ]);
        $meja = new Meja();
        $meja->nomor_meja  = $request->input('nomor_meja');
        $meja->save();

        return redirect('data-meja')->with('success', 'Data Meja berhasil ditambahkan.');
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
        $meja = Meja::find($id);
        return view('Backend.data-master.data-meja.edit', ['meja' => $meja]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $meja = Meja::findOrFail($id);
        $request->validate([
            'nomor_meja' => 'required',
        ]);

        $meja->update([
        'nomor_meja' => $request->input('nomor_meja'),
        ]);

        return redirect('data-meja')->with('success', 'Data meja berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Meja::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data Meja berhasil dihapus.');
    }
}
