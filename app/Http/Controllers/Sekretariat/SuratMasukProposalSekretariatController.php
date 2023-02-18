<?php

namespace App\Http\Controllers\Sekretariat;

use Illuminate\Http\Request;
use App\Models\SuratMasukProposal;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SuratMasukProposalSekretariatController extends Controller
{
    public function index()
    {
        $data['sm_proposal'] = SuratMasukProposal::orderBy('tgl_sm_masuk', 'desc')->get();
        return view('pages.sekretariat.data_sm_proposal', $data);
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
                'foto_sm_proposal' => 'required|mimes:doc,docx,pdf'
            ],
            [
                'no_sm_proposal.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sm_masuk.required'   => 'Tanggal Surat Keluar Tidak Boleh Kosong',
                'perihal_sm.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'asal_sm.required'         => 'Asal Surat Tidak Boleh Kosong',
                'ditujukan_sm.required'    => 'Tidak Boleh Kosong',
                'foto_sm_proposal.required' => 'Surat Proposal Tidak Boleh Kosong'
            ]
        );
        $data = [
            'user_id'           => Auth::user()->id,
            'no_sm_proposal'    => $request->no_sm_proposal,
            'tgl_sm_masuk'      => $request->tgl_sm_masuk,
            'asal_sm'           => $request->asal_sm,
            'perihal_sm'        => $request->perihal_sm,
            'ditujukan_sm'      => $request->ditujukan_sm,
            'foto_sm_proposal'  => $request->foto_sm_proposal
        ];
        $sm_proposal = SuratMasukProposal::create($data);
        if ($request->hasFile('foto_sm_proposal')) {
            $request->file('foto_sm_proposal')->move('foto_sm_proposal/', $request->file('foto_sm_proposal')->getClientOriginalName());
            $sm_proposal->foto_sm_proposal = $request->file('foto_sm_proposal')->getClientOriginalName();
            $sm_proposal->save();
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
                'foto_sm_proposal' => 'mimes:doc,docx,pdf'
            ],
            [
                'no_sm_proposal.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sm_masuk.required'   => 'Tanggal Surat Keluar Tidak Boleh Kosong',
                'perihal_sm.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'asal_sm.required'         => 'Asal Surat Tidak Boleh Kosong',
                'ditujukan_sm.required'    => 'Tidak Boleh Kosong',
                'foto_sm_proposal.required' => 'Surat Proposal Tidak Boleh Kosong'
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
