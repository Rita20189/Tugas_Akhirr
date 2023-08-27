<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ItemPesanan;
use App\Models\Kategori;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Outlet;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
  public function index()
  {
    return view('frontend.index');
  }

  public function pilih_outlet()
  {
    // Ambil id_booking dari sesi
    $id_pesanan = session('id_pesanan');
    //  dd($id_pesanan);
    $itemPesanan = ItemPesanan::where('pesanan_id', $id_pesanan)->get();
    return view('Frontend.pilih_outlet', [
      'outlet' => Outlet::get(),
      'id_pesanan' => $id_pesanan,
      'itemPesanan' => $itemPesanan
    ]);
  }

  public function pilih_menu($id, $kategori = 'Semua') // Tambahkan parameter $kategori
  {
    // Ambil id_booking dari sesi
    $id_pesanan = session('id_pesanan');
    //  dd($id_pesanan);

    $outlet = Outlet::findOrFail($id); // Gunakan findOrFail untuk menghindari 404 jika outlet tidak ditemukan

    $menuQuery = Menu::where('outlet_id', $id);

    if ($kategori !== 'Semua') {
      $menuQuery->where('kategori', $kategori);
    }

    $menuData = $menuQuery->get();

    return view('Frontend.halaman-menu.pilih_menu', [
      'menuData' => $menuData,
      'kategoris' => Kategori::get(),
      'outlet' => $outlet,
      'selectedKategori' => $kategori, // Tambahkan variabel untuk kategori yang dipilih
      'id_pesanan' => $id_pesanan, // Tambahkan variabel untuk kategori yang dipilih
    ]);
  }

  public function getMenuData($id)
  {
    $menu = Menu::where('outlet_id', $id)->get();
    return response()->json($menu);
  }

  public function getPesanan()
  {
    $meja = Meja::all();
    return view('frontend.halaman_pesanan.index', [
      'meja' => $meja
    ]);
  }

  public function getMejaPesanan(Request $request)
  {
    $request->validate([
      'nama_pelanggan' => 'required',
      'meja_id' => 'required'
    ]);

    $mejaId = $request->input('meja_id');

    $pesanan = Pesanan::create([
      'nama_pelanggan' => $request->input('nama_pelanggan'),
      'meja_id' => $mejaId,
      'tanggal_transaksi' => now()
    ]);

    $pesananId = $pesanan->id;
    // Simpan pesanan ke dalam sesi
    session(['id_pesanan' => $pesananId]);


    return redirect('/pesan/' . $pesananId);
  }

  public function getDataMenu(Request $request)
  {

    // Ambil id_booking dari sesi
    $id_pesanan = session('id_pesanan');

    $request->validate([
      'menu_id' => 'required',
      'jumlah' => 'required'
    ]);

    $menu = Menu::findOrFail($request->input('menu_id'));
    $jumlah = $request->input('jumlah');
    $total_harga = $menu->harga * $jumlah;

    $pesananItem = ItemPesanan::create([
      'pesanan_id' => $id_pesanan,
      'menu_id' => $request->input('menu_id'),
      'total_pesanan' => $jumlah,
      'total_harga' => $total_harga
    ]);
   
    // Update jumlah dan total harga di tabel pesanan
    $totalPesanan = ItemPesanan::where('pesanan_id', $id_pesanan)->sum('total_pesanan');
    $totalHarga = ItemPesanan::where('pesanan_id', $id_pesanan)->sum('total_harga');

    $pesanan = Pesanan::findOrFail($id_pesanan);
    $pesanan->total_pesanan = $totalPesanan;
    $pesanan->total_harga = $totalHarga;
    $pesanan->save();

    return redirect('/pesan/'.$id_pesanan);
  }

  public function getDataCart() {
    // Ambil id_booking dari sesi
    $id_pesanan = session('id_pesanan');
    $itemPesanan = ItemPesanan::where('pesanan_id',$id_pesanan)->get();
    return view ('frontend.halaman-cart.cart',[
      'itemPesanan' => $itemPesanan,
      'id_pesanan' => $id_pesanan
    ]);
  }

  public function hapus_item($id) {
    $itemPesanan = ItemPesanan::find($id);
    $itemPesanan->delete();
    return redirect()->back();
  }
}