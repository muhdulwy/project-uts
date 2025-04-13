<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Coba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard.index'); // Redirect ke dashboard
        }

        // Jika gagal login
        return back()->withErrors(['email' => 'Login gagal, periksa kembali email dan password.']);
    }

    public function index()
    {
        return view('admin.dashboard.index'); // Pastikan view ini ada
    }
}
