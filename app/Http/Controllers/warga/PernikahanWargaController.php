<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\Pernikahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PernikahanWargaController extends Controller
{
    public function index()
    {
        $data = Pernikahan::orderBy('no_suket', 'desc')->get();
        return view('pages.warga.datapernikahan', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl_pernikahan' => 'required',
            'banjar'         => 'required',
            'nama_pria'      => 'required',
            'status_pria'    => 'required',
            'tgl_lahir_pria' => 'required',
            'alamat_pria'    => 'required',
            'nama_wanita'    => 'required',
            'status_wanita'  => 'required',
            'tgl_lahir_wanita' => 'required',
            'alamat_wanita'   => 'required'
        ], [
            'tgl_pernikahan.required'   => 'Tanggal Pernikahan Tidak Boleh Kosong',
            'banjar.required'           => 'Banjar Tidak Boleh Kosong',
            'nama_pria.required'        => 'Nama Pria Tidak Boleh Kosong',
            'status_pria.required'      => 'Status Pria Tidak Boleh Kosong',
            'tgl_lahir_pria.required'   => 'Tanggal Lahir Tidak Boleh Kosong',
            'alamat_pria.required'      => 'Alamat Tidak Boleh Kosong',
            'nama_wanita.required'      => 'Nama Wanita Tidak Boleh Kosong',
            'status_wanita.required'    => 'Status Wanita Tidak Boleh Kosong',
            'tgl_lahir_wanita.required' => 'Tanggal Lahir Tidak Boleh Kosong',
            'alamat_wanita.required'    => 'Alamat Tidak Boleh Kosong'
        ]);

        $data = [
            'user_id'           => Auth::user()->id,
            'tgl_pernikahan'    => $request->tgl_pernikahan,
            'banjar'            => $request->banjar,
            'nama_pria'         => $request->nama_pria,
            'status_pria'       => $request->status_pria,
            'tgl_lahir_pria'    => $request->tgl_lahir_pria,
            'alamat_pria'       => $request->alamat_pria,
            'nama_wanita'       => $request->nama_wanita,
            'status_wanita'     => $request->status_wanita,
            'tgl_lahir_wanita'  => $request->tgl_lahir_wanita,
            'alamat_wanita'     => $request->alamat_wanita
        ];

        Pernikahan::create($data);
        return redirect('pernikahan_warga')->with('message', 'Data Berhasil Di Tambahkan');
    }

    public function show($id)
    {
        $data['show'] = Pernikahan::find($id);
        return view('pages.warga.detail_data_pernikahan', $data);
    }
    public function edit($id)
    {
        $data['data'] = Pernikahan::find($id);
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
        $data['status_pria'] = ['Purusa', 'Pradana'];
        $data['status_wanita'] = ['Purusa', 'Pradana'];
        $data['status_surat'] = ['Proses', 'Selesai'];
        return view('pages.warga.edit_data_pernikahan', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'no_suket'       => 'required',
            'tgl_pernikahan' => 'required',
            'banjar'         => 'required',
            'nama_pria'      => 'required',
            'status_pria'    => 'required',
            'tgl_lahir_pria' => 'required',
            'alamat_pria'    => 'required',
            'nama_wanita'    => 'required',
            'status_wanita'  => 'required',
            'tgl_lahir_wanita' => 'required',
            'alamat_wanita'   => 'required'
        ], [
            'no_suket.required'         => 'Nomor Surat Tidak Boleh Kosong',
            'tgl_pernikahan.required'   => 'Tanggal Pernikahan Tidak Boleh Kosong',
            'banjar.required'           => 'Banjar Tidak Boleh Kosong',
            'nama_pria.required'        => 'Nama Pria Tidak Boleh Kosong',
            'status_pria.required'      => 'Status Pria Tidak Boleh Kosong',
            'tgl_lahir_pria.required'   => 'Tanggal Lahir Tidak Boleh Kosong',
            'alamat_pria.required'      => 'Alamat Tidak Boleh Kosong',
            'nama_wanita.required'      => 'Nama Wanita Tidak Boleh Kosong',
            'status_wanita.required'    => 'Status Wanita Tidak Boleh Kosong',
            'tgl_lahir_wanita.required' => 'Tanggal Lahir Tidak Boleh Kosong',
            'alamat_wanita.required'    => 'Alamat Tidak Boleh Kosong'
        ]);

        $data = Pernikahan::find($id);
        $data->update($request->all());
        return redirect('pernikahan_warga')->with('message', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $data = Pernikahan::find($id);
        $data->delete();
        return redirect('pernikahan_warga')->with('message', 'Data Berhasil Di Hapus');
    }
}
