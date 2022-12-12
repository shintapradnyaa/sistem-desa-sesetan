<?php

namespace App\Http\Controllers\Sekretariat;

use Illuminate\Http\Request;
use App\Models\SuratMasukProposal;
use App\Http\Controllers\Controller;

class SuratMasukProposalSekretariatController extends Controller
{
    public function index()
    {
        $data = SuratMasukProposal::orderBy('tgl_sm_masuk', 'desc')->get();
        return view('pages.sekretariat.data_sm_proposal', compact('data'));
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
                'no_sm_proposal' => 'required',
                'tgl_sm_masuk'   => 'required',
                'perihal_sm'      => 'required',
                'asal_sm'         => 'required',
                'ditujukan_sm'    => 'required',
                'foto_sm_proposal' => 'required|mimes:jpg,png,jpeg|image|max:2048'
            ],
            [
                'no_sm_proposal.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sm_masuk.required'   => 'Tanggal Surat Keluar Tidak Boleh Kosong',
                'perihal_sm.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'asal_sm.required'         => 'Asal Surat Tidak Boleh Kosong',
                'ditujukan_sm.required'    => 'Tidak Boleh Kosong',
                'foto_sm_proposal.required' => 'Foto Surat Proposal Tidak Boleh Kosong'
            ]
        );
        $data = SuratMasukProposal::create($request->all());
        if ($request->hasFile('foto_sm_proposal')) {
            $request->file('foto_sm_proposal')->move('foto_sm_proposal/', $request->file('foto_sm_proposal')->getClientOriginalName());
            $data->foto_sm_proposal = $request->file('foto_sm_proposal')->getClientOriginalName();
            $data->save();
        }
        return redirect('sm_proposal_sekretariat')->with('message', 'Data Berhasil Di Tambahkan');
    }
    public function show($id)
    {
        $data = SuratMasukProposal::find($id);
        return view('pages.sekretariat.detail_sm_proposal', compact('data'));
    }
    public function edit($id)
    {
        $data = SuratMasukProposal::find($id);
        return view('pages.sekretariat.edit_sm_proposal', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'no_sm_proposal' => 'required',
                'tgl_sm_masuk'   => 'required',
                'perihal_sm'      => 'required',
                'asal_sm'         => 'required',
                'ditujukan_sm'    => 'required',
                'foto_sm_proposal' => 'mimes:jpg,png,jpeg|image|max:2048'
            ],
            [
                'no_sm_proposal.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sm_masuk.required'   => 'Tanggal Surat Keluar Tidak Boleh Kosong',
                'perihal_sm.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'asal_sm.required'         => 'Asal Surat Tidak Boleh Kosong',
                'ditujukan_sm.required'    => 'Tidak Boleh Kosong',
                'foto_sm_proposal.required' => 'Foto Surat Proposal Tidak Boleh Kosong'
            ]
        );
        $data = $request->all();
        if ($image = $request->file('foto_sm_proposal')) {
            $destination    = 'foto_sm_proposal/';
            $profileImage   = $image->getClientOriginalName();
            $image->move($destination, $profileImage);
            $data['foto_sm_proposal']   = "$profileImage";
        } else {
            unset($data['foto_sm_proposal']);
        }
        $update = SuratMasukProposal::findOrFail($id);
        $update->update($data);
        return redirect('sm_proposal_sekretariat')->with('message', 'Data Berhasil Diperbaharui');
    }

    public function delete($id)
    {
        $data = SuratMasukProposal::find($id);
        $data->delete();
        return redirect('sm_proposal_sekretariat')->with('message', 'Data Berhasil Di Hapus');
    }
}
