<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'Backend.data-master.data-outlet.index',
            [
                'outlets' => Outlet::get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.data-master.data-outlet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_outlet' => 'required',
            'pemilik_outlet' => 'required',
            'status' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'logo' => 'required|image', // Validasi gambar
        ]);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        $outlet = new Outlet();
        $outlet->nama_outlet = $request->input('nama_outlet');
        $outlet->pemilik_outlet = $request->input('pemilik_outlet');
        $outlet->status = $request->input('status');
        $outlet->jam_buka = $request->input('jam_buka');
        $outlet->jam_tutup = $request->input('jam_tutup');
        $outlet->logo = $imageName; // Simpan nama gambar ke dalam tabel
        $outlet->save();
        return redirect('data-outlet')->with('success', 'Outlet berhasil ditambahkan.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
