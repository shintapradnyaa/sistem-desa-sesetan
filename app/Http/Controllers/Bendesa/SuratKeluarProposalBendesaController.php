<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluarProposal;
use Illuminate\Http\Request;

class SuratKeluarProposalBendesaController extends Controller
{
    public function index()
    {
        $data = SuratKeluarProposal::all();
        return view('pages.bendesa.data_sk_proposal', compact('data'));
    }

    public function create()
    {
        return view('create_sk_proposal_bendesa');
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
        return redirect('sk_proposal_bendesa')->with('message', 'Data Berhasil Di Tambahkan');
    }
    public function show($id)
    {
        $data = SuratKeluarProposal::find($id);
        return view('pages.bendesa.detail_sk_proposal', compact('data'));
    }
    public function delete($id)
    {
        $data = SuratKeluarProposal::find($id);
        $data->delete();
        return redirect('sk_proposal_bendesa')->with('message', 'Data Berhasil Di Hapus');
    }
}
