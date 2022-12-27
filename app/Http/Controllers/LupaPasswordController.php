<?php

namespace App\Http\Controllers;

use App\Models\LupaPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LupaPasswordController extends Controller
{
    public function index()
    {
        $data = LupaPassword::all();
        return view('login.lupa_password', compact('data'));
    }

    public function proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('login.link_lupa_password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'Kami Mengirimkan Email Reset Password. Silahkan Cek Email Anda!');
    }
    public function edit($token)
    {
        $data['reset'] = LupaPassword::where('token', $token)->first();
        return view('login.konfirmasi_password', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        User::where('email', $request->email)
            ->update(['password' => bcrypt($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('/login')->with('message', 'Password Anda Berhasil Diubah!');
    }
}
