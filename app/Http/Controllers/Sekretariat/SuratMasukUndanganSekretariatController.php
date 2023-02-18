<?php

namespace App\Http\Controllers\Sekretariat;

use Illuminate\Http\Request;
use App\Models\SuratMasukUndangan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SuratMasukUndanganSekretariatController extends Controller
{
    public function index()
    {
        $data['sm_undangan'] = SuratMasukUndangan::orderBy('tgl_sm_masuk', 'desc')->get();
        return view('pages.sekretariat.data_sm_undangan', $data);
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
                'foto_sm_undangan' => 'required|mimes:doc,docx,pdf'
            ],
            [
                'no_sm_undangan.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sm_masuk.required'   => 'Tanggal Surat Masuk Tidak Boleh Kosong',
                'perihal_sm.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'asal_sm.required'         => 'Asal Surat Tidak Boleh Kosong',
                'ditujukan_sm.required'    => 'Tidak Boleh Kosong',
                'foto_sm_undangan.required' => 'Surat Undangan Tidak Boleh Kosong'
            ]
        );
        $data = [
            'user_id'            => Auth::user()->id,
            'no_sm_undangan'     => $request->no_sm_undangan,
            'tgl_sm_masuk'       => $request->tgl_sm_masuk,
            'asal_sm'            => $request->asal_sm,
            'perihal_sm'         => $request->perihal_sm,
            'ditujukan_sm'       => $request->ditujukan_sm,
            'foto_sm_undangan'   => $request->foto_sm_undangan
        ];
        $sm_undangan = SuratMasukUndangan::create($data);
        if ($request->hasFile('foto_sm_undangan')) {
            $request->file('foto_sm_undangan')->move('foto_sm_undangan/', $request->file('foto_sm_undangan')->getClientOriginalName());
            $sm_undangan->foto_sm_undangan = $request->file('foto_sm_undangan')->getClientOriginalName();
            $sm_undangan->save();
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
        $this->validate(
            $request,
            [
                'no_sm_undangan' => 'required',
                'tgl_sm_masuk'   => 'required',
                'perihal_sm'      => 'required',
                'asal_sm'         => 'required',
                'ditujukan_sm'    => 'required',
                'foto_sm_undangan' => 'mimes:doc,docx,pdf'
            ],
            [
                'no_sm_undangan.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sm_masuk.required'   => 'Tanggal Surat Masuk Tidak Boleh Kosong',
                'perihal_sm.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'asal_sm.required'         => 'Asal Surat Tidak Boleh Kosong',
                'ditujukan_sm.required'    => 'Tidak Boleh Kosong',
                'foto_sm_undangan.required' => 'Surat Undangan Tidak Boleh Kosong'
            ]
        );
        $data = $request->all();
        if ($image = $request->file('foto_sm_undangan')) {
            $destination    = 'foto_sm_undangan/';
            $profileImage   = $image->getClientOriginalName();
            $image->move($destination, $profileImage);
            $data['foto_sm_undangan']   = "$profileImage";
        } else {
            unset($data['foto_sm_undangan']);
        }
        $update = SuratMasukUndangan::findOrFail($id);
        $update->update($data);
        return redirect('sm_undangan_sekretariat')->with('message', 'Data Berhasil Di Update');
    }


    public function delete($id)
    {
        $data = SuratMasukUndangan::find($id);
        $data->delete();
        return redirect('sm_undangan_sekretariat')->with('message', 'Data Berhasil Di Delete');
    }
}
