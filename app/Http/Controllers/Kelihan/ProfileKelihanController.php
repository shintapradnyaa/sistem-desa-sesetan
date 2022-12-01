<?php

namespace App\Http\Controllers\Kelihan;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProfileKelihanController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('pages.kelihan.edit_pengguna', compact('data'));
    }

    public function edit($id)
    {
        $data = User::where("id", $id)
            ->first();
        return view('pages.kelihan.edit_pengguna', compact('data'));
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

        $data = $request->all();

        if ($image = $request->file('foto_pengguna')) {
            $destination    = 'foto_user_login/';
            $profileImage   = $image->getClientOriginalName();
            $image->move($destination, $profileImage);
            $data['foto_pengguna']   = "$profileImage";
            dd($data);
        } else {
            unset($data['foto_pengguna']);
        }
        $update = User::findOrFail($id);
        dd($update);
        $update->update($data);

        return redirect('edit_profile')->with('message', 'Data Berhasil Diperbaharui');
    }
}
