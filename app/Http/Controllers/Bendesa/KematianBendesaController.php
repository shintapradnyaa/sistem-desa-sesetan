<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\Kematian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KematianBendesaController extends Controller
{
    public function index()
    {
        $data['kematian'] = Kematian::join('users', 'users.id', '=', 'kematian.user_id')
            ->select('users.banjar','kematian.*')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.bendesa.datakematian', $data);
    }

    public function show($id)
    {
        $data['kematian'] = Kematian::find($id);
        $data['kematian'] = DB::table('kematian')->where('kematian.id', $id)
        ->join('users', 'users.id', '=', 'kematian.user_id')
        ->select('kematian.*', 'users.banjar')
        ->first();
        return view('pages.bendesa.detail_data_kematian', $data);
    }

    public function edit($id)
    {
        $data['data']   = Kematian::find($id);
        $data['jenis_kelamin'] = ['Pria', 'Wanita  '];
        $data['agama'] = [
            'Hindu',
            'Islam',
            'Budha',
            'Kristen Protestan',
            'Kristen Katolik',
            'Konghucu'
        ];
        $data['kematian'] = DB::table('kematian')->where('kematian.id', $id)
            ->join('users', 'users.id', '=', 'kematian.user_id')
            ->select('kematian.*', 'users.banjar',)
            ->first();
        return view('pages.bendesa.edit_data_kematian', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'tgl_ngaben'                => 'required'
            ],
            [
                'tgl_ngaben.required'       => 'Tanggal Ngaben Tidak Boleh Kosong',
            ]
        );

        $data = [
            'tgl_ngaben'    => $request->tgl_ngaben
        ];

        $update = Kematian::find($id);
        $update->update($data);


        return redirect('kematian_bendesa')->with('message', 'Data Berhasil Diperbaharui');
    }

    public function delete($id)
    {
        $data = Kematian::find($id);
        $data->delete();
        return redirect('kematian_bendesa')->with('message', 'Data Berhasil Di Hapus');
    }
}
