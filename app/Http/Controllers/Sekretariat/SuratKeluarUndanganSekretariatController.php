<?php

namespace App\Http\Controllers\Sekretariat;

use Illuminate\Http\Request;
use App\Models\SuratKeluarUndangan;
use App\Http\Controllers\Controller;

class SuratKeluarUndanganSekretariatController extends Controller
{
    public function index()
    {
        $data = SuratKeluarUndangan::all();
        return view('pages.sekretariat.data_sk_undangan', compact('data'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'no_sk_undangan' => 'required',
                'tgl_sk_keluar'   => 'required',
                'perihal_sk'      => 'required',
                'ditujukan_sk'    => 'required',
                'foto_sk_undangan' => 'mimes:jpg,png,jpeg|image|max:2048'
            ],
            [
                'no_sk_undangan.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sk_keluar.required'   => 'Tanggal Surat Keluar Tidak Boleh Kosong',
                'perihal_sk.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'ditujukan_sk.required'    => 'Tidak Boleh Kosong',
                'foto_sk_undangan.required' => 'Foto Surat Undangan Tidak Boleh Kosong'
            ]
        );
        $data = SuratKeluarUndangan::create($request->all());
        if ($request->hasFile('foto_sk_undangan')) {
            $request->file('foto_sk_undangan')->move('foto_sk_undangan/', $request->file('foto_sk_undangan')->getClientOriginalName());
            $data->foto_sk_undangan = $request->file('foto_sk_undangan')->getClientOriginalName();
            $data->save();
        }
        return redirect('sk_undangan_sekretariat')->with('message', 'Data Berhasil Di Tambahkan');
    }

    public function show($id)
    {
        $data = SuratKeluarUndangan::find($id);
        return view('pages.sekretariat.detail_sk_undangan', compact('data'));
    }

    public function edit($id)
    {
        $data= SuratKeluarUndangan::find($id);
        return view('pages.sekretariat.edit_sk_undangan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'no_sk_undangan' => 'required',
                'tgl_sk_keluar'   => 'required',
                'perihal_sk'      => 'required',
                'ditujukan_sk'    => 'required',
                'foto_sk_undangan' => 'mimes:jpg,png,jpeg|image|max:2048'
            ],
            [
                'no_sk_undangan.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sk_keluar.required'   => 'Tanggal Surat Keluar Tidak Boleh Kosong',
                'perihal_sk.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'ditujukan_sk.required'    => 'Tidak Boleh Kosong',
                'foto_sk_undangan.required' => 'Foto Surat Undangan Tidak Boleh Kosong'
            ]
        );
        $data = $request->all();
        if ($image = $request->file('foto_sk_undangan')) {
            $destination    = 'foto_sk_undangan/';
            $profileImage   = $image->getClientOriginalName();
            $image->move($destination, $profileImage);
            $data['foto_sk_undangan']   = "$profileImage";
        } else {
            unset($data['foto_sk_undangan']);
        }
        $update = SuratKeluarUndangan::findOrFail($id);
        $update->update($data);
        return redirect('sk_undangan_sekretariat')->with('message', 'Data Berhasil Diperbaharui');
    }

    public function delete($id)
    {
        $data = SuratKeluarUndangan::find($id);
        $data->delete();

        return redirect('sk_undangan_sekretariat')->with('message', 'Data Berhasil Di Hapus');
    }
}
