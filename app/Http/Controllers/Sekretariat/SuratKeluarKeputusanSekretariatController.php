<?php

namespace App\Http\Controllers\Sekretariat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuratKeluarKeputusan;

class SuratKeluarKeputusanSekretariatController extends Controller
{
    public function index()
    {
        $data = SuratKeluarKeputusan::orderBy('tgl_sk_keluar', 'desc')->get();
        return view('pages.sekretariat.data_sk_keputusan', compact('data'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'no_sk_keputusan' => 'required',
                'tgl_sk_keluar'   => 'required',
                'perihal_sk'      => 'required',
                'ditujukan_sk'    => 'required',
                'foto_sk_keputusan' => 'required|mimes:jpg,png,jpeg|image|max:2048'
            ],
            [
                'no_sk_keputusan.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sk_keluar.required'   => 'Tanggal Surat Keluar Tidak Boleh Kosong',
                'perihal_sk.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'ditujukan_sk.required'    => 'Tidak Boleh Kosong',
                'foto_sk_keputusan.required' => 'Foto Surat Keputusan Tidak Boleh Kosong'
            ]
        );
        $data = SuratKeluarKeputusan::create($request->all());
        if ($request->hasFile('foto_sk_keputusan')) {
            $request->file('foto_sk_keputusan')->move('foto_sk_keputusan/', $request->file('foto_sk_keputusan')->getClientOriginalName());
            $data->foto_sk_keputusan = $request->file('foto_sk_keputusan')->getClientOriginalName();
            $data->save();
        }
        return redirect('sk_keputusan_sekretariat')->with('message', 'Data Berhasil Di Tambahkan');
    }
    public function show($id)
    {
        $data = SuratKeluarKeputusan::find($id);
        return view('pages.sekretariat.detail_sk_keputusan', compact('data'));
    }
    public function edit($id)
    {
        $data = SuratKeluarKeputusan::find($id);
        return view('pages.sekretariat.edit_sk_keputusan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'no_sk_keputusan' => 'required',
                'tgl_sk_keluar'   => 'required',
                'perihal_sk'      => 'required',
                'ditujukan_sk'    => 'required',
                'foto_sk_keputusan' => 'mimes:jpg,png,jpeg|image|max:2048'
            ],
            [
                'no_sk_keputusan.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sk_keluar.required'   => 'Tanggal Surat Keluar Tidak Boleh Kosong',
                'perihal_sk.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'ditujukan_sk.required'    => 'Tidak Boleh Kosong',
                'foto_sk_keputusan.required' => 'Foto Surat Keputusan Tidak Boleh Kosong'
            ]
        );
        $data = $request->all();
        if ($image = $request->file('foto_sk_keputusan')) {
            $destination    = 'foto_sk_keputusan/';
            $profileImage   = $image->getClientOriginalName();
            $image->move($destination, $profileImage);
            $data['foto_sk_keputusan']   = "$profileImage";
        } else {
            unset($data['foto_sk_keputusan']);
        }
        $update = SuratKeluarKeputusan::findOrFail($id);
        $update->update($data);
        return redirect('sk_keputusan_sekretariat')->with('message', 'Data Berhasil Diperbaharui');
    }
    public function delete($id)
    {
        $data = SuratKeluarKeputusan::find($id);
        $data->delete();
        return redirect('sk_keputusan_sekretariat')->with('message', 'Data Berhasil Di Hapus');
    }
}
