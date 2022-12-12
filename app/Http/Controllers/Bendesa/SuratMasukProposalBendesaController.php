<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\SuratMasukProposal;
use Illuminate\Http\Request;

class SuratMasukProposalBendesaController extends Controller
{
    public function index()
    {
        $data = SuratMasukProposal::orderBy('tgl_sm_masuk', 'desc')->get();
        return view('pages.bendesa.data_sm_proposal', compact('data'));
    }

    public function show($id)
    {
        $data = SuratMasukProposal::find($id);
        return view('pages.bendesa.detail_sm_proposal', compact('data'));
    }
}
