<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        
        if ($user->role === 'admin') {
            $menu = Menu::get();
        }elseif($user->role === 'outlet'){
            $menu = Menu::where('outlet_id', $user->outlet->id)->get();
        }
        return view('Backend.data-master.data-menu.index',
            [
                'menus' => $menu
            ]
        );        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.data-master.data-menu.create',[
            'kategoris' => Kategori::get(),
            'outlets' => Outlet::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'kategori' => 'required',
            'outlet' => 'required',
            'harga' => 'required',
            'status' => 'required',
            'gambar_menu' => 'required|image', // Validasi gambar
        ]);

        if ($request->hasFile('gambar_menu')) {
            $image = $request->file('gambar_menu');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        $menu = new Menu();
        $menu->nama_menu  = $request->input('nama_menu');
        $menu->kategori_id = $request->input('kategori');
        $menu->outlet_id = $request->input('outlet');
        $menu->harga = $request->input('harga');
        $menu->status = $request->input('status');
        $menu->gambar_menu = $imageName; // Simpan nama gambar ke dalam tabel
        $menu->save();
        return redirect('data-menu')->with('success', 'Menu berhasil ditambahkan.');
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
        $menu = Menu::find($id);
        return view('Backend.data-master.data-menu.edit', [
            'menu' => $menu,
            'kategoris' => Kategori::get(),
            'outlets' => Outlet::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::findOrFail($id);
        $request->validate([
            'nama_menu' => 'required',
            'kategori' => 'required',
            'outlet' => 'required',
            'harga' => 'required',
            'status' => 'required',
            'gambar_menu' => 'required|image',
        ]);

        if ($request->hasFile('gambar_menu')) {
            $image = $request->file('gambar_menu');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        };

        $menu->update([
        'nama_menu' => $request->input('nama_menu'),
        'kategori_id' => $request->input('kategori'),
        'outlet_id' => $request->input('outlet'),
        'harga' => $request->input('harga'),
        'status' => $request->input('status'),
        'gambar_menu'=> $imageName,
        ]);

        return redirect('data-menu')->with('success', 'Menu berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Menu::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Menu berhasil dihapus.');
    }
}
