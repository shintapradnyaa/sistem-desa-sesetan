<?php

namespace App\Http\Controllers\Sekretariat;

use Illuminate\Http\Request;
use App\Models\SuratMasukKeputusan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SuratMasukKeputusanSekretariatController extends Controller
{
    public function index()
    {
        $data['sm_keputusan'] = SuratMasukKeputusan::orderBy('no_sm_keputusan', 'desc')->get();
        return view('pages.sekretariat.data_sm_keputusan', $data);
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
                'no_sm_keputusan' => 'required',
                'tgl_sm_masuk'   => 'required',
                'perihal_sm'      => 'required',
                'asal_sm'         => 'required',
                'ditujukan_sm'    => 'required',
                'foto_sm_keputusan' => 'required|mimes:doc,docx,pdf'
            ],
            [
                'no_sm_keputusan.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sm_masuk.required'   => 'Tanggal Surat Masuk Tidak Boleh Kosong',
                'perihal_sm.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'asal_sm.required'         => 'Asal Surat Tidak Boleh Kosong',
                'ditujukan_sm.required'    => 'Tidak Boleh Kosong',
                'foto_sm_keputusan.required' => 'Surat Keputusan Tidak Boleh Kosong'
            ]
        );
        $data = [
            'user_id'            => Auth::user()->id,
            'no_sm_keputusan'    => $request->no_sm_keputusan,
            'tgl_sm_masuk'      => $request->tgl_sm_masuk,
            'asal_sm'           => $request->asal_sm,
            'perihal_sm'         => $request->perihal_sm,
            'ditujukan_sm'       => $request->ditujukan_sm,
            'foto_sm_keputusan'  => $request->foto_sm_keputusan
        ];
        $sm_keputusan = SuratMasukKeputusan::create($data);
        if ($request->hasFile('foto_sm_keputusan')) {
            $request->file('foto_sm_keputusan')->move('foto_sm_keputusan/', $request->file('foto_sm_keputusan')->getClientOriginalName());
            $sm_keputusan->foto_sm_keputusan = $request->file('foto_sm_keputusan')->getClientOriginalName();
            $sm_keputusan->save();
        }
        return redirect('sm_keputusan_sekretariat')->with('message', 'Data Berhasil Di Tambahkan');
    }
    public function show($id)
    {
        $data = SuratMasukKeputusan::find($id);
        return view('pages.sekretariat.detail_sm_keputusan', compact('data'));
    }

    public function edit($id)
    {
        $data = SuratMasukKeputusan::find($id);
        return view('pages.sekretariat.edit_sm_keputusan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'no_sm_keputusan' => 'required',
                'tgl_sm_masuk'   => 'required',
                'perihal_sm'      => 'required',
                'asal_sm'         => 'required',
                'ditujukan_sm'    => 'required',
                'foto_sm_keputusan' => 'mimes:doc,docx,pdf'
            ],
            [
                'no_sm_keputusan.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sm_masuk.required'   => 'Tanggal Surat Masuk Tidak Boleh Kosong',
                'perihal_sm.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'asal_sm.required'         => 'Asal Surat Tidak Boleh Kosong',
                'ditujukan_sm.required'    => 'Tidak Boleh Kosong',
                'foto_sm_keputusan.required' => 'Surat Keputusan Tidak Boleh Kosong'
            ]
        );
        $data = $request->all();
        if ($image = $request->file('foto_sm_keputusan')) {
            $destination    = 'foto_sm_keputusan/';
            $profileImage   = $image->getClientOriginalName();
            $image->move($destination, $profileImage);
            $data['foto_sm_keputusan']   = "$profileImage";
        } else {
            unset($data['foto_sm_keputusan']);
        }
        $update = SuratMasukKeputusan::findOrFail($id);
        $update->update($data);
        return redirect('sm_keputusan_sekretariat')->with('message', 'Data Berhasil Diperbaharui');
    }


    public function delete($id)
    {
        $data = SuratMasukKeputusan::find($id);
        $data->delete();
        return redirect('sm_keputusan_sekretariat')->with('message', 'Data Berhasil Di Hapus');
    }
}
