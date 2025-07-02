<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Tampilkan form login khusus admin
    public function showLoginForm()
    {
        return view('auth.admin-login'); // Pastikan view ini nanti kamu buat
    }

    // Proses login admin
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Coba login
        if (Auth::attempt($credentials)) {
            // Cek apakah user yang login adalah admin
            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // Jika bukan admin, logout
            Auth::logout();
            return redirect()->route('admin.login')->withErrors([
                'email' => 'Akun ini bukan admin.',
            ]);
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Halaman dashboard admin
    public function index()
    {
        return view('admin.dashboard'); // Buat view ini untuk dashboard admin
    }
}
