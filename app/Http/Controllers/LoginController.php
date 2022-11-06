<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->level == '1') {
                return redirect()->intended('dashboard_bendesa');
            } elseif ($user->level == '2') {
                return redirect()->intended('dashboard_sekretariat');
            } elseif ($user->level == '3') {
                return redirect()->intended('dashboard_kelihan');
            } //elseif ($user->level == '4') {
            //     return redirect()->intended('dashboard_warga');
            // }
        }
        return view('login.view_login');
    }

    public function proses(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Silahkan Periksa Kembali Username dan Password',
            ]
        );

        $kredensial = $request->only('username', 'password');
        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->level == '1') {
                return redirect()->intended('dashboard_bendesa');
            } elseif ($user->level == '2') {
                return redirect()->intended('dashboard_sekretariat');
            } elseif ($user->level == '3') {
                return redirect()->intended('dashboard_kelihan');
                // } elseif ($user->level == '4') {
                //     return redirect()->intended('dashboard_warga');
            }
            return redirect()->intended('/');
        }


        return back()->withErrors([
            'username' => 'Maaf Username atau Password Anda Salah',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
