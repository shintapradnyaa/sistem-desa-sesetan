<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluarProposal;
use Illuminate\Http\Request;

class SuratKeluarProposalBendesaController extends Controller
{
    public function index()
    {
        $data['sk_proposal'] = SuratKeluarProposal::orderBy('no_sk_proposal', 'desc')->get();
        return view('pages.bendesa.data_sk_proposal', $data);
    }
}
