<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'Backend.manajemen-pengguna.data-pengguna.index',
            [
                'penggunas' => User::get()
            ]
        );
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.manajemen-pengguna.data-pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'role' => 'required',
            // Validasi password
            'password'=> 'required|min:8|regex:/[0-9]/|regex:/[A-Z]/'
        ]);

        $user = new User();
        $user->nama = $request->input('nama');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        // Password di hashing
        $user->password = Hash::make($request->input('password'));
        $user->save();
        // dd("Reached here");

        // Redirect ke halaman data pengguna
        return redirect('data-pengguna')->with('success', 'Data Pengguna berhasil ditambahkan !');
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
        $pengguna = Pengguna::find($id);
        return view('Backend.manajemen-pengguna.data-pengguna.edit', ['pengguna' => $pengguna]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'role' => 'required',
             // Validasi password
             'password'=> 'required|min:8|regex:/[0-9]/|regex:/[A-Z]/'
        ]);

        $user->update([
        'nama' => $request->input('nama'),
        'email' => $request->input('email'),
        'role' => $request->input('role'),
        'password'=>$request->input('password'),
            
        ]);

        return redirect('data-pengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pengguna::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
