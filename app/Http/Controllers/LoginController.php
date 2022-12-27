<?php

namespace App\Http\Controllers;

use App\Models\Pernikahan;
use App\Models\User;
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
            } elseif ($user->level == '4') {
                return redirect()->intended('dashboard_login_warga');
            }
        }
        return view('login.view_login');
    }

    public function proses(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Silahkan Periksa Kembali Email dan Password',
            ]
        );

        $kredensial = $request->only('email', 'password');
        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->level == '1') {
                return redirect()->intended('dashboard_bendesa');
            } elseif ($user->level == '2') {
                return redirect()->intended('dashboard_sekretariat');
            } elseif ($user->level == '3') {
                return redirect()->intended('dashboard_kelihan');
            } elseif ($user->level == '4') {
                return redirect()->intended('dashboard_login_warga');
            }
            return redirect()->intended('/');
        }


        return back()->withErrors([
            'email' => 'Maaf email atau Password Anda Salah',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function indexPengguna()
    {
        $data = User::all();
        return view('pages.bendesa.kelola_pengguna', compact('data'));
    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'level'     => 'required',
            'username'  => 'required',
            'password'  => 'required',
            'name'      => 'required',
            'no_telfon' => 'required',
            'banjar'    => 'required',
            'email'     => 'required|email',
            'foto_pengguna' => 'mimes:jpg,png,jpeg|image|max:2048'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'no_telfon' => $request->no_telfon,
            'banjar' => $request->banjar,
            'foto_pengguna' => $request->foto_pengguna
        ];
        $data = User::create($data);
        if ($request->hasFile('foto_pengguna')) {
            $request->file('foto_pengguna')->move('foto_user_login/', $request->file('foto_pengguna')->getClientOriginalName());
            $data->foto_pengguna = $request->file('foto_pengguna')->getClientOriginalName();
            $data->save();
        }
        return redirect('kelola_pengguna')->with('message', 'Data Berhasil Disimpan');
    }
    public function show($id)
    {
        $data = User::find($id);
        return view('pages.bendesa.detail_pengguna', compact('data'));
    }
    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('kelola_pengguna')->with('message', 'Data Berhasil Di Hapus');
    }

    public function index_register()
    {
        return view('login.register');
    }
    public function proses_register(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'no_telfon' => 'required',
                'banjar' => 'required',
                'password' => 'required'
            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'email.unique' => 'Email sudah digunakan',
                'no_telfon.required' => 'No Telepon tidak boleh kosong',
                'banjar.required' => 'Banjar tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong'
            ]
        );

        $data = [
            'name'      => $request->name,
            'email'     => $request->email,
            'level'     => 4,
            'password'  => bcrypt($request->password),
            'no_telfon' => $request->no_telfon,
            'banjar'    => $request->banjar
        ];

        $data = User::create($data);
        return redirect('login')->with('message', 'Pendaftaran Berhasil');
    }
}
