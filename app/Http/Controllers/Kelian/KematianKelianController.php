<?php

namespace App\Http\Controllers\Kelian;

use App\Models\Kematian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KematianKelianController extends Controller
{
    public function index()
    {
            $data['kematian'] = Kematian::join('users', 'users.id', '=', 'kematian.user_id')
            ->where('banjar', Auth::user()->banjar)
            ->select('users.level', 4)
            ->select('users.banjar', 'kematian.*')
            ->orderBy('created_at', 'Desc')
            ->get();
        return view('pages.kelian.datakematian', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate(
            $request,
            [
                'nama'              => 'required',
                'jenis_kelamin'     => 'required',
                'tgl_lahir'         => 'required',
                'umur'              => 'required',
                'agama'             => 'required',
                'alamat'            => 'required',
                'tgl_kematian'      => 'required',
                'sebab_kematian'    => 'required',
                'ahli_waris'        => 'required',
                'foto_ktp'          => 'required|mimes:jpg,png,jpeg|image|max:2048'
            ],
            [
                'nama.required'             => 'Nama Tidak Boleh Kosong',
                'jenis_kelamin.required'    => 'Jenis Kelamin Tidak Boleh Kosong',
                'tgl_lahir.required'        => 'Tanggal Lahir Tidak Boleh Kosong',
                'umur.required'             => 'Umur Tidak Boleh Kosong',
                'agama.required'            => 'Agama Tidak Boleh Kosong',
                'alamat.required'           => 'Alamat Tidak Boleh Kosong',
                'tgl_kematian.required'     => 'Tanggal Kematian Tidak Boleh Kosong',
                'sebab_kematian.required'   => 'Sebab Kematian Tidak Boleh Kosong',
                'ahli_waris.required'       => 'Nama Ahli Waris Tidak Boleh Kosong',
                'foto_ktp.required'         => 'Foto KTP tidak Boleh Kosong'
            ]

        );

        $kematian = [
            'user_id'           => Auth::user()->id,
            'nama'              => $request->nama,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'tgl_lahir'         => $request->tgl_lahir,
            'umur'              => $request->umur,
            'agama'             => $request->agama,
            'alamat'            => $request->alamat,
            'tgl_kematian'      => $request->tgl_kematian,
            'sebab_kematian'    => $request->sebab_kematian,
            'ahli_waris'        => $request->ahli_waris,
            'foto_ktp'          => $request->foto_ktp
        ];

        $data = Kematian::create($kematian);
        if ($request->hasFile('foto_ktp')) {
            $request->file('foto_ktp')->move('foto_ktp_kematian/', $request->file('foto_ktp')->getClientOriginalName());
            $data->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
            $data->save();
        }

        return redirect('kematian_kelian')->with('message', 'Data Berhasil Disimpan');
    }

    public function show($id)
    {
        $data['kematian'] = Kematian::find($id);
        return view('pages.kelian.detail_data_kematian', $data);
    }

    public function edit($id)
    {
        $data['data'] = Kematian::find($id);
        $data['jenis_kelamin'] = ['Pria', 'Wanita'];
        $data['agama'] = [
            'Hindu',
            'Islam',
            'Budha',
            'Kristen Protestan',
            'Kristen Katolik',
            'Konghucu'
        ];
        return view('pages.kelian.edit_data_kematian', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama'          => 'required',
                'jenis_kelamin' => 'required',
                'tgl_lahir'     => 'required',
                'umur'          => 'required',
                'agama'         => 'required',
                'alamat'        => 'required',
                'tgl_kematian'  => 'required',
                'sebab_kematian' => 'required',
                'ahli_waris'    => 'required',
                'foto_ktp'      => 'mimes:jpg,png,jpeg|image|max:2048'
            ],
            [
                'nama.required'             => 'Nama Tidak Boleh Kosong',
                'jenis_kelamin.required'    => 'Jenis Kelamin Tidak Boleh Kosong',
                'tgl_lahir.required'        => 'Tanggal Lahir Tidak Boleh Kosong',
                'umur.required'             => 'Umur Tidak Boleh Kosong',
                'agama.required'            => 'Agama Tidak Boleh Kosong',
                'alamat.required'           => 'Alamat Tidak Boleh Kosong',
                'tgl_kematian.required'     => 'Tanggal Kematian Tidak Boleh Kosong',
                'sebab_kematian.required'   => 'Sebab Kematian Tidak Boleh Kosong',
                'ahli_waris.required'       => 'Nama Ahli Waris Tidak Boleh Kosong',
                'foto_ktp.required'         => 'Foto KTP tidak Boleh Kosong'
            ]
        );

        $data = [
            'user_id'           => Auth::user()->id,
            'nama'              => $request->nama,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'tgl_lahir'         => $request->tgl_lahir,
            'umur'              => $request->umur,
            'agama'             => $request->agama,
            'alamat'            => $request->alamat,
            'tgl_kematian'      => $request->tgl_kematian,
            'sebab_kematian'    => $request->sebab_kematian,
            'ahli_waris'        => $request->ahli_waris,
            'foto_ktp'          => $request->foto_ktp
        ];
        // dd($data);
        if ($image = $request->file('foto_ktp')) {
            $destination    = 'foto_ktp_kematian/';
            $profileImage   = $image->getClientOriginalName();
            $image->move($destination, $profileImage);
            $data['foto_ktp']   = "$profileImage";
        } else {
            unset($data['foto_ktp']);
        }
        $update = Kematian::findOrFail($id);
        $update->update($data);
        return redirect('kematian_kelian')->with('message', 'Data Berhasil Diperbaharui');
    }

    public function delete($id)
    {
        $data = Kematian::find($id);
        $data->delete();
        return redirect('kematian_kelian')->with('message', 'Data Berhasil Di Hapus');
    }
}
