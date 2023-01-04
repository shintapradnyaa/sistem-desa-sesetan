<?php

namespace App\Http\Controllers\Kelihan;

use App\Models\Kematian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KematianKelihanController extends Controller
{
    public function index(Request $request)
    {
        $data = Kematian::orderBy('tgl_kematian', 'desc')->get();
        return view('pages.kelihan.datakematian', compact('data'));
    }

    public function create()
    {

        return view('create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate(
            $request,
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
                'foto_ktp' => 'required|mimes:jpg,png,jpeg|image|max:2048'
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

        $data = Kematian::create($request->all());
        if ($request->hasFile('foto_ktp')) {
            $request->file('foto_ktp')->move('foto_ktp_kematian/', $request->file('foto_ktp')->getClientOriginalName());
            $data->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
            $data->save();
        }
        return redirect('kematian_kelihan')->with('message', 'Data Berhasil Disimpan');
    }

    public function show($id)
    {
        $data = Kematian::find($id);
        return view('pages.kelihan.detail_data_kematian', compact('data'));
    }

    public function edit($id)
    {
        $data['data']   = Kematian::find($id);
        $data['banjar'] = [
            'Banjar Tengah',
            'Banjar Pembungan',
            'Banjar Gaduh',
            'Banjar Kaja',
            'Banjar Puri Agung',
            'Banjar Lantang Bejuh',
            'Banjar Dukuh Sari',
            'Banjar Pegok',
            'Banjar Suwung Batan Kendal'
        ];
        $data['jenis_kelamin'] = ['Pria', 'Wanita'];
        $data['agama'] = [
            'Hindu',
            'Islam',
            'Budha',
            'Kristen Protestan',
            'Kristen Katolik',
            'Konghucu'
        ];
        return view('pages.kelihan.edit_data_kematian', $data);
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


        return redirect('kematian_kelihan')->with('message', 'Data Berhasil Diperbaharui');
    }

    public function delete($id)
    {
        $data = Kematian::find($id);
        $data->delete();
        return redirect('kematian_kelihan')->with('message', 'Data Berhasil Di Hapus');
    }
}
