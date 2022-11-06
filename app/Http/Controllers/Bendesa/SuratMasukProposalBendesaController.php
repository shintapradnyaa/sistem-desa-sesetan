<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\SuratMasukProposal;
use Illuminate\Http\Request;

class SuratMasukProposalBendesaController extends Controller
{
    public function index()
    {
        $data = SuratMasukProposal::all();
        return view('pages.bendesa.data_sm_proposal', compact('data'));
    }

    public function create()
    {
        return view('create_sm_proposal_bendesa');
    }

    public function store(Request $request)
    {
        $data = SuratMasukProposal::create($request->all());
        if ($request->hasFile('foto_sm_proposal')) {
            $request->file('foto_sm_proposal')->move('foto_sm_proposal/', $request->file('foto_sm_proposal')->getClientOriginalName());
            $data->foto_sm_proposal = $request->file('foto_sm_proposal')->getClientOriginalName();
            $data->save();
        }
        return redirect('index_sm_proposal_bendesa');
    }

    public function edit($id)
    {
        $data = SuratMasukProposal::find($id);
        return view('pages.bendesa.edit_sm_proposal', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SuratMasukProposal::find($id);
        $data->update($request->all());
        return redirect('index_sm_proposal_bendesa')->with('success', 'Data Berhasil Di Tambahkan');
    }


    public function delete($id)
    {
        $data = SuratMasukProposal::find($id);
        $data->delete();
        return redirect('index_sm_proposal_bendesa');
    }
}
