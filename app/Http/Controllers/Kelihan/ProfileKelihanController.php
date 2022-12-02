<?php

namespace App\Http\Controllers\Kelihan;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileKelihanController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('pages.kelihan.edit_pengguna', compact('data'));
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
        return view('pages.kelihan.edit_pengguna', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'username'  => 'required',
                'name'      => 'required',
                'no_telfon' => 'required',
                'banjar'    => 'required',
                'email'     => 'required|email',
                'foto_pengguna' => 'mimes:jpg,png,jpeg|image|max:2048'
            ],
            [
                'username.required' => 'Username Tidak Boleh Kosong',
                'name.required' => 'Nama Lengkap Tidak Boleh Kosong',
                'no_telfon.required' => 'Nomor Telepon Tidak Boleh Kosong',
                'banjar.required' => 'Banjar Tidak Boleh Kosong',
                'email.required' => 'Email Tidak Boleh Kosong',
                'foto_ktp.required' => 'Foto KTP tidak Boleh Kosong'
            ]
        );

        $data = [
            'name'          => $request->name,
            'username'      => $request->username,
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

        return redirect('edit_profile/edit/' . $id)->with('message', 'Data Berhasil Diperbaharui');
    }
}
