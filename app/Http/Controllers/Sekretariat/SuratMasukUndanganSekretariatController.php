<?php

namespace App\Http\Controllers\Sekretariat;

use Illuminate\Http\Request;
use App\Models\SuratMasukUndangan;
use App\Http\Controllers\Controller;

class SuratMasukUndanganSekretariatController extends Controller
{
    public function index()
    {
        $data = SuratMasukUndangan::all();
        return view('pages.sekretariat.data_sm_undangan', compact('data'));
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
                'no_sm_undangan' => 'required',
                'tgl_sm_masuk'   => 'required',
                'perihal_sm'      => 'required',
                'asal_sm'         => 'required',
                'ditujukan_sm'    => 'required',
                'foto_sm_undangan' => 'mimes:jpg,png,jpeg|image|max:2048'
            ],
            [
                'no_sm_undangan.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sm_masuk.required'   => 'Tanggal Surat Masuk Tidak Boleh Kosong',
                'perihal_sm.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'asal_sm.required'         => 'Asal Surat Tidak Boleh Kosong',
                'ditujukan_sm.required'    => 'Tidak Boleh Kosong',
                'foto_sm_undangan.required' => 'Foto Surat Undangan Tidak Boleh Kosong'
            ]
        );
        $data = SuratMasukUndangan::create($request->all());
        if ($request->hasFile('foto_sm_undangan')) {
            $request->file('foto_sm_undangan')->move('foto_sm_undangan/', $request->file('foto_sm_undangan')->getClientOriginalName());
            $data->foto_sm_undangan = $request->file('foto_sm_undangan')->getClientOriginalName();
            $data->save();
        }
        return redirect('sm_undangan_sekretariat')->with('message', 'Data Berhasil Di Tambahkan');
    }
    public function show($id)
    {
        $data = SuratMasukUndangan::find($id);
        return view('pages.sekretariat.detail_sm_undangan', compact('data'));
    }
    public function edit($id)
    {
        $data = SuratMasukUndangan::find($id);
        return view('pages.sekretariat.edit_sm_undangan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SuratMasukUndangan::find($id);
        $data->update($request->all());
        return redirect('sm_undangan_sekretariat')->with('message', 'Data Berhasil Di Update');
    }


    public function delete($id)
    {
        $data = SuratMasukUndangan::find($id);
        $data->delete();
        return redirect('sm_undangan_sekretariat')->with('message', 'Data Berhasil Di Delete');
    }
}
