<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    private function redirectToDashboard()
{
    $role = auth()->user()->role;

    return match($role) {
        'masyarakat' => redirect()->route('masyarakat.dashboard'),
        'dokter'     => redirect()->route('dokter.dashboard'),
        'toko'       => redirect()->route('toko.dashboard'),
        default      => redirect()->route('login'),
    };
}



    // --- Masyarakat ---
    public function showMasyarakatLogin() {
        return view('auth.login-masyarakat');
    }

    public function masyarakatLogin(Request $request) {
        $credentials = $request->only('email','password');
        if (Auth::attempt(array_merge($credentials, ['role'=>'masyarakat']))) {
            return redirect()->route('masyarakat.dashboard');
        }
        return back()->withErrors(['email'=>'Login gagal']);
    }

    public function showMasyarakatRegister() {
        return view('auth.register-masyarakat');
    }

    public function masyarakatRegister(Request $request) {
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
        ]);
        $data['password'] = bcrypt($data['password']);
        $data['role'] = 'masyarakat';
        User::create($data);

        return redirect()->route('login')->with('success','Registrasi berhasil, silakan login');
    }

    // --- Dokter ---
    public function showDokterLogin() {
        return view('auth.login-dokter');
    }

    public function dokterLogin(Request $request) {
        $credentials = $request->only('email','password');
        if (Auth::attempt(array_merge($credentials, ['role'=>'dokter']))) {
            return redirect()->route('dokter.dashboard');
        }
        return back()->withErrors(['email'=>'Login gagal']);
    }

    // --- Toko ---
    public function showTokoLogin() {
        return view('auth.login-toko');
    }

    public function tokoLogin(Request $request) {
        $credentials = $request->only('email','password');
        if (Auth::attempt(array_merge($credentials, ['role'=>'toko']))) {
            return redirect()->route('toko.dashboard');
        }
        return back()->withErrors(['email'=>'Login gagal']);
    }
}