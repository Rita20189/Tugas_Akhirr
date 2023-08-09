<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
{
    return view('auth.login');
}
public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        // Login berhasil
        return redirect()->intended('/dashboard'); // Ganti '/dashboard' dengan halaman yang ingin dituju setelah login berhasil.
    }

    // Jika login gagal
    return back()->withErrors(['email' => 'Login gagal. Periksa kembali email dan password Anda.']);
}

public function logout(Request $request)
{
    Auth::logout();
    return redirect('/'); // Ganti '/' dengan halaman yang ingin dituju setelah logout berhasil.
}

}
