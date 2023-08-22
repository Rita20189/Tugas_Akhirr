<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ItemPesanan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class ItemPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'Backend.manajemen-pesanan.item-pesanan.index',
            [
                'ItemPesanans' => ItemPesanan::get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.data-master.data-menu.create', [
            'pesanans' => Pesanan::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ItemPesanan' => 'required',
            'pesanan' => 'required',
            'menu' => 'required',
            'jumlah_item' => 'required',
            'jumlah_harga' => 'required',

        ]);

        $ItemPesanan = new ItemPesanan();
        $ItemPesanan->pesanan_id = $request->input('nama');
        $ItemPesanan->menu_id = $request->input('menu');
        $ItemPesanan->jumlah_item = $request->input('jumlah_item');
        $ItemPesanan->save();
        return redirect('item-pesanan')->with('success', 'Item Pesanan berhasil ditambahkan.');
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ItemPesanan = ItemPesanan::findOrFail($id);
        $request->validate([
            'ItemPesanan' => 'required',
            'pesanan' => 'required',
            'menu' => 'required',
            'jumlah_item' => 'required',
            'jumlah_harga' => 'required',
        ]);

        $ItemPesanan->update([
        'ItemPesanan' =>$request->input('ItemPesanan'),
        'pesanan' =>$request->input('pesanan'),
        'menu' =>$request->input('menu'),
        'jumlah_item' =>$request->input('jumlah_item'),
        'jumlah_harga' =>$request->input('jumlah_harga'),
        
        ]);

        return redirect('item-pesanan')->with('success', 'Item Pesanan berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ItemPesanan::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Item Pesanan Berhasil Dihapus.');
    }
}
