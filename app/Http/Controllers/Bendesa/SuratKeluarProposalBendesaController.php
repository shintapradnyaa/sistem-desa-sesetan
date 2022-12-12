<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluarProposal;
use Illuminate\Http\Request;

class SuratKeluarProposalBendesaController extends Controller
{
    public function index()
    {
        $data = SuratKeluarProposal::orderBy('tgl_sk_keluar', 'desc')->get();
        return view('pages.bendesa.data_sk_proposal', compact('data'));
    }

    public function show($id)
    {
        $data = SuratKeluarProposal::find($id);
        return view('pages.bendesa.detail_sk_proposal', compact('data'));
    }
}
