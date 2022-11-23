<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\Kematian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;


class KematianBendesaController extends Controller
{
    public function index(Request $request)
    {
        $data = Kematian::all();
        return view('pages.bendesa.datakematian', compact('data'));
    }

    public function show($id)
    {
        $data = Kematian::find($id);
        return view('pages.bendesa.detail_data_kematian', compact('data'));
    }

    public function edit($id)
    {
        $data = Kematian::find($id);

        return view('pages.bendesa.edit_data_kematian', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => 'required',
                'banjar' => 'required',
                'jenis_kelamin' => 'required',
                'tgl_lahir' => 'required',
                'agama' => 'required',
                'alamat' => 'required',
                'tgl_kematian' => 'required',
                'sebab_kematian' => 'required',
                'ahli_waris' => 'required',
                'foto_ktp' => 'mimes:jpg,png,jpeg|image|max:2048'
            ],
            [
                'nama.required' => 'Nama Tidak Boleh Kosong',
                'banjar.required' => 'Banjar Tidak Boleh Kosong',
                'jenis_kelamin.required' => 'Jenis Kelamin Tidak Boleh Kosong',
                'tgl_lahir.required' => 'Tanggal Lahir Tidak Boleh Kosong',
                'agama.required' => 'Agama Tidak Boleh Kosong',
                'alamat.required' => 'Alamat Tidak Boleh Kosong',
                'tgl_kematian.required' => 'Tanggal Kematian Tidak Boleh Kosong',
                'sebab_kematian.required' => 'Sebab Kematian Tidak Boleh Kosong',
                'ahli_waris.required' => 'Nama Ahli Waris Tidak Boleh Kosong',
                'foto_ktp.required' => 'Foto KTP tidak Boleh Kosong'
            ]
        );

        $data = $request->all();
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


        return redirect('kematian_bendesa')->with('message', 'Data Berhasil Diperbaharui');
    }

    public function delete($id)
    {
        $data = Kematian::find($id);
        $data->delete();
        return redirect('kematian_bendesa')->with('message', 'Data Berhasil Di Hapus');
    }

    // public function export_pdf_kematian()
    // {
    //     $data = Kematian::all();
    //     view()->share('data', $data);
    //     $pdf = PDF::loadview('data_kematian-pdf');
    //     return $pdf->download('Data_Kematian.pdf');
    // }
}