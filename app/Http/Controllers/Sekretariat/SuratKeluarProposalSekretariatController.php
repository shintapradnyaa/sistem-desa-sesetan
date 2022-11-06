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
        $data = SuratKeluarProposal::create($request->all());
        if ($request->hasFile('foto_sk_proposal')) {
            $request->file('foto_sk_proposal')->move('foto_sk_proposal/', $request->file('foto_sk_proposal')->getClientOriginalName());
            $data->foto_sk_proposal = $request->file('foto_sk_proposal')->getClientOriginalName();
            $data->save();
        }
        return redirect('index_sk_proposal_sekretariat');
    }

    public function edit($id)
    {
        $data = SuratKeluarProposal::find($id);
        return view('pages.sekretariat.edit_sk_proposal', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SuratKeluarProposal::find($id);
        $data->update($request->all());
        return redirect('index_sk_proposal_sekretariat')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function delete($id)
    {
        $data = SuratKeluarProposal::find($id);
        $data->delete();
        return redirect('index_sk_proposal_sekretariat');
    }
}
