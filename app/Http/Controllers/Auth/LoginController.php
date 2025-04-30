<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

    
        $users = User::whereIn('email', [$credentials['email']])->first();

        // Coba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if ( $users->role == 'Admin') {
                return redirect()->route('dashboard.admin.index');
            } elseif($users->role == 'Anggota') {
                return redirect()->route('dashboard.anggota.index');
            }else{
                return redirect()->route('dashboard.user.index');
            }
        }
        

        // Jika gagal login
        return back()->withErrors(['email' => 'Login gagal, periksa kembali email dan password.']);
    }

    public function index()
    {
        return view('dashboard.admin.index'); // Pastikan view ini ada
    }
}
