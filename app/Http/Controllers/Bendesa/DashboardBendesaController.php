<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluarKeputusan;
use App\Models\SuratKeluarProposal;
use App\Models\SuratKeluarUndangan;
use App\Models\SuratMasukKeputusan;
use App\Models\SuratMasukProposal;
use App\Models\SuratMasukUndangan;
use App\Models\User;

class DashboardBendesaController extends Controller
{
    public function index()
    {
        $total_sm_proposal = SuratMasukProposal::count();
        $total_sm_undangan = SuratMasukUndangan::count();
        $total_sm_keputusan = SuratMasukKeputusan::count();

        $total_sm = $total_sm_keputusan + $total_sm_undangan + $total_sm_proposal;

        $total_sk_proposal = SuratKeluarProposal::count();
        $total_sk_undangan = SuratKeluarUndangan::count();
        $total_sk_keputusan = SuratKeluarKeputusan::count();

        $total_sk = $total_sk_proposal + $total_sk_undangan + $total_sk_keputusan;

        $totalPengguna = User::count();

        return view('pages.bendesa.dashboard_bendesa', compact('total_sm', 'total_sk', 'totalPengguna'));
    }
}
