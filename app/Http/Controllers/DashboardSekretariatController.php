<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use App\Models\Pernikahan;
use App\Models\SuratKeluarKeputusan;
use App\Models\SuratKeluarProposal;
use App\Models\SuratKeluarUndangan;
use App\Models\SuratMasukKeputusan;
use App\Models\SuratMasukProposal;
use App\Models\SuratMasukUndangan;
use Illuminate\Http\Request;

class DashboardSekretariatController extends Controller
{
    public function index()
    {
        $totalKematian = Kematian::count();
        $totalPernikahan = Pernikahan::count();

        $total_sm_proposal = SuratMasukProposal::count();
        $total_sm_undangan = SuratMasukUndangan::count();
        $total_sm_keputusan = SuratMasukKeputusan::count();

        $total_sm = $total_sm_keputusan + $total_sm_proposal + $total_sm_proposal;

        $total_sk_proposal = SuratKeluarProposal::count();
        $total_sk_undangan = SuratKeluarUndangan::count();
        $total_sk_keputusan = SuratKeluarKeputusan::count();

        $total_sk = $total_sk_proposal + $total_sk_undangan + $total_sk_keputusan;

        return view('pages.sekretariat.dashboard_sekretariat', compact('totalKematian', 'totalPernikahan', 'total_sm', 'total_sk'));
    }
}
