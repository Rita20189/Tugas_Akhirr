<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ItemPesanan;
use App\Models\Meja;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $pesanan = Pesanan::get();
            return view(
                'Backend.manajemen-pesanan.data-pesanan.index',
                [
                    'pesanans' => $pesanan
                ]
            );
        } elseif ($user->role === 'outlet') {
            $outletId = $user->outlet->id;

            $itemPesanan = ItemPesanan::whereHas('menu', function ($query) use ($outletId) {
                $query->where('outlet_id', $outletId);
            })->get();
            return view(
                'Backend.manajemen-pesanan.data-pesanan.index',
                [
                    'itemPesanans' => $itemPesanan
                ]
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.manajemen-pesanan.data-pesanan.create', [
            'mejas' => Meja::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'meja' => 'required',
            'nama' => 'required',
        ]);

        $pesanan = new Pesanan();
        $pesanan->meja_id  = $request->input('meja');
        $pesanan->nama = $request->input('nama');
        $pesanan->save();
        return redirect('data-pesanan')->with('success', 'Pesanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $pesanan= Pesanan::findOrFail($id);
        $ItemPesanan = ItemPesanan::where('pesanan_id', $id)->get();

        // dd($itemPesanan);
        return view('backend.manajemen-pesanan.data-pesanan.detail', [
            'itemPesanans' => $ItemPesanan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pesanan = Pesanan::find($id);
        return view('Backend.manajemen-pesanan.data-pesanan.edit', [
            'pesanan' => $pesanan,
            'mejas' => Meja::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $request->validate([
            'nomor_meja' => 'required',
            'nama' => 'required',
        ]);

        $pesanan->update([
            'nama' => $request->input('nama'),
            'meja_id' => $request->input('nomor_meja'),
        ]);

        return redirect('data-pesanan')->with('success', 'Pesanan berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Temukan data pesanan berdasarkan ID
            $pesanan = Pesanan::findOrFail($id);

            // Hapus data pesanan itu sendiri
            $pesanan->delete();

            return redirect()->back()->with('success', 'Pesanan berhasil dihapus.');
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
