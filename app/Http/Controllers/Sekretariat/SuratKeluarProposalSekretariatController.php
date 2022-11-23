<?php

namespace App\Http\Controllers\Sekretariat;

use Illuminate\Http\Request;
use App\Models\SuratKeluarProposal;
use App\Http\Controllers\Controller;

class SuratKeluarProposalSekretariatController extends Controller
{
    public function index()
    {
        $data = SuratKeluarProposal::all();
        return view('pages.sekretariat.data_sk_proposal', compact('data'));
    }

    public function create()
    {
        return view('create_sk_proposal_sekretariat');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'no_sk_proposal' => 'required',
                'tgl_sk_keluar'   => 'required',
                'perihal_sk'      => 'required',
                'ditujukan_sk'    => 'required',
                'foto_sk_proposal' => 'required|mimes:jpg,png,jpeg|image|max:2048'
            ],
            [
                'no_sk_proposal.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sk_keluar.required'   => 'Tanggal Surat Keluar Tidak Boleh Kosong',
                'perihal_sk.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'ditujukan_sk.required'    => 'Tidak Boleh Kosong',
                'foto_sk_proposal.required' => 'Foto Surat Proposal Tidak Boleh Kosong'
            ]
        );
        $data = SuratKeluarProposal::create($request->all());
        if ($request->hasFile('foto_sk_proposal')) {
            $request->file('foto_sk_proposal')->move('foto_sk_proposal/', $request->file('foto_sk_proposal')->getClientOriginalName());
            $data->foto_sk_proposal = $request->file('foto_sk_proposal')->getClientOriginalName();
            $data->save();
        }
        return redirect('sk_proposal_sekretariat')->with('message', 'Data Berhasil Di Tambahkan');
    }
    public function show($id)
    {
        $data = SuratKeluarProposal::find($id);
        return view('pages.sekretariat.detail_sk_proposal', compact('data'));
    }
    public function edit($id)
    {
        $data = SuratKeluarProposal::find($id);
        return view('pages.sekretariat.edit_sk_proposal', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'no_sk_proposal' => 'required',
                'tgl_sk_keluar'   => 'required',
                'perihal_sk'      => 'required',
                'ditujukan_sk'    => 'required',
                'foto_sk_proposal' => 'mimes:jpg,png,jpeg|image|max:2048'
            ],
            [
                'no_sk_proposal.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sk_keluar.required'   => 'Tanggal Surat Keluar Tidak Boleh Kosong',
                'perihal_sk.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'ditujukan_sk.required'    => 'Tidak Boleh Kosong',
                'foto_sk_proposal.required' => 'Foto Surat Proposal Tidak Boleh Kosong'
            ]
        );
        $data = $request->all();
        if ($image = $request->file('foto_sk_proposal')) {
            $destination    = 'foto_sk_proposal/';
            $profileImage   = $image->getClientOriginalName();
            $image->move($destination, $profileImage);
            $data['foto_sk_proposal']   = "$profileImage";
        } else {
            unset($data['foto_sk_proposal']);
        }
        $update = SuratKeluarProposal::findOrFail($id);
        $update->update($data);
        return redirect('sk_proposal_sekretariat')->with('message', 'Data Berhasil Diperbaharui');
    }

    public function delete($id)
    {
        $data = SuratKeluarProposal::find($id);
        $data->delete();
        return redirect('sk_proposal_sekretariat')->with('message', 'Data Berhasil Di Hapus');
    }
}
