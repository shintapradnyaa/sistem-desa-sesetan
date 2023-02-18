<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\SuratMasukProposal;
use Illuminate\Http\Request;

class SuratMasukProposalBendesaController extends Controller
{
    public function index()
    {
        $data['sm_proposal'] = SuratMasukProposal::orderBy('no_sm_proposal', 'desc')->get();
        return view('pages.bendesa.data_sm_proposal', $data);
    }
}
