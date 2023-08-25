<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Outlet;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function pilih_outlet()
    {
        return view('Frontend.pilih_outlet', [
            'outlet' => Outlet::get()
        ]);
    }

    public function pilih_menu($id, $kategori = 'Semua') // Tambahkan parameter $kategori
    {
        $outlet = Outlet::findOrFail($id); // Gunakan findOrFail untuk menghindari 404 jika outlet tidak ditemukan

        $menuQuery = Menu::where('outlet_id', $id);

        if ($kategori !== 'Semua') {
            $menuQuery->where('kategori', $kategori);
        }

        $menuData = $menuQuery->get();

        return view('Frontend.menu.pilih_menu', [
            'menuData' => $menuData,
            'kategoris' => Kategori::get(),
            'outlet' => $outlet,
            'selectedKategori' => $kategori, // Tambahkan variabel untuk kategori yang dipilih
        ]);
    }

    public function getMenuData($id)
    {
        $menu = Menu::where('outlet_id', $id)->get();
        return response()->json($menu);
    }
}
