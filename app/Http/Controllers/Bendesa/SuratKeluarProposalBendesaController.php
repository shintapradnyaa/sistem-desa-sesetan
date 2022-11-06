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
        $data = SuratKeluarProposal::create($request->all());
        if ($request->hasFile('foto_sk_proposal')) {
            $request->file('foto_sk_proposal')->move('foto_sk_proposal/', $request->file('foto_sk_proposal')->getClientOriginalName());
            $data->foto_sk_proposal = $request->file('foto_sk_proposal')->getClientOriginalName();
            $data->save();
        }
        return redirect('index_sk_proposal_bendesa');
    }

    public function edit($id)
    {
        $data = SuratKeluarProposal::find($id);
        return view('pages.bendesa.edit_sk_proposal', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SuratKeluarProposal::find($id);
        $data->update($request->all());
        return redirect('index_sk_proposal_bendesa')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function delete($id)
    {
        $data = SuratKeluarProposal::find($id);
        $data->delete();
        return redirect('index_sk_proposal_bendesa');
    }
}
