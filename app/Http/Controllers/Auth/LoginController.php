<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        $kategori = DB::table('kategoris')->count();
        $arsip = DB::table('arsips')->count();

        return view('dashboard.dashboard', compact('kategori', 'arsip'));
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();
            return redirect('dashboard')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Cek kembali data login anda!');
    }    

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
