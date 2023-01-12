<?php

namespace App\Http\Controllers\Sekretariat;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileSekretariatController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('pages.sekretariat.edit_pengguna', compact('data'));
    }

    public function edit($id)
    {
        $data['data']   = User::findOrFail($id);
        $data['banjar'] = [
            'Banjar Kaja',
            'Banjar Pembungan',
            'Banjar Tengah',
            'Banjar Gaduh',
            'Banjar Puri Agung',
            'Banjar Lantang Bejuh',
            'Banjar Dukuh Sari',
            'Banjar Pegok',
            'Banjar Suwung Batan Kendal'
        ];
        return view('pages.sekretariat.edit_pengguna', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'      => 'required',
                'no_telfon' => 'required',
                'banjar'    => 'required',
                'email'     => 'required|email',
                'foto_pengguna' => 'mimes:jpg,png,jpeg|image|max:2048'
            ],
            [
                'name.required' => 'Nama Lengkap Tidak Boleh Kosong',
                'no_telfon.required' => 'Nomor Telepon Tidak Boleh Kosong',
                'banjar.required' => 'Banjar Tidak Boleh Kosong',
                'email.required' => 'Email Tidak Boleh Kosong',
                'foto_ktp.required' => 'Foto KTP tidak Boleh Kosong'
            ]
        );

        $data = [
            'name'          => $request->name,
            'no_telfon'     => $request->no_telfon,
            'banjar'        => $request->banjar,
            'email'         => $request->email,
            'foto_pengguna' => $request->foto_pengguna
        ];

        if ($image = $request->file('foto_pengguna')) {
            $destination    = 'foto_user_login/';
            $profileImage   = $image->getClientOriginalName();
            $image->move($destination, $profileImage);
            $data['foto_pengguna']   = "$profileImage";
        } else {
            unset($data['foto_pengguna']);
        }
        $update = User::findOrFail($id);
        $update->update($data);

        return redirect('edit_profile_sekretariat/edit/' . $id)->with('message', 'Data Berhasil Diperbaharui');
    }

    public function edit_password($id)
    {
        return view('pages.sekretariat.edit_password');
    }

    public function update_password(Request $request)
    {
        $request->validate(
            [
                'current_password'  => 'required',
                'password'          => 'required|confirmed'
            ],
            [
                'current_password.required' => 'Password lama tidak boleh kosong',
                'password.required'         => 'Password baru tidak boleh kosong',
                'password.confirmed'        => 'Password baru anda tidak sama!'
            ]
        );

        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            return back()->with('message', 'Password berhasil diperbaharui');
        }

        throw ValidationException::withMessages([
            'current_password' => 'Password lama anda salah!'
        ]);
    }
}
