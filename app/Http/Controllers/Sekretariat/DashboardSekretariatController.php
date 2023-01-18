<?php

namespace App\Http\Controllers\Sekretariat;

use App\Http\Controllers\Controller;
use App\Models\Kematian;
use App\Models\Pernikahan;
use App\Models\SuratKeluarKeputusan;
use App\Models\SuratKeluarProposal;
use App\Models\SuratKeluarUndangan;
use App\Models\SuratMasukKeputusan;
use App\Models\SuratMasukProposal;
use App\Models\SuratMasukUndangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardSekretariatController extends Controller
{
    public function index()
    {
        $totalKematian = Kematian::count();
        $totalPernikahan = Pernikahan::count();

        $total_sm_proposal = SuratMasukProposal::count();
        $total_sm_undangan = SuratMasukUndangan::count();
        $total_sm_keputusan = SuratMasukKeputusan::count();

        $total_sm = $total_sm_keputusan + $total_sm_undangan + $total_sm_proposal;

        $total_sk_proposal = SuratKeluarProposal::count();
        $total_sk_undangan = SuratKeluarUndangan::count();
        $total_sk_keputusan = SuratKeluarKeputusan::count();

        $total_sk = $total_sk_proposal + $total_sk_undangan + $total_sk_keputusan;

        $dataKematian = Kematian::select(
            DB::raw("COUNT(*) as count"),
            DB::raw("MONTHNAME(created_at) as month_name")
        )
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("month_name"))
            ->orderBy('id', 'ASC')
            ->pluck('count', 'month_name');

        $dataPernikahan = Pernikahan::select(
            DB::raw("COUNT(*) as count"),
            DB::raw("MONTHNAME(created_at) as month_name")
        )
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("month_name"))
            ->orderBy('id', 'ASC')
            ->pluck('count', 'month_name');

        $labels = $dataKematian->keys();
        $data   = $dataKematian->values();
        $labelsPernikahan = $dataPernikahan->keys();
        $dataPernikahan   = $dataPernikahan->values();

        return view('pages.sekretariat.dashboard_sekretariat', compact('labels', 'data', 'labelsPernikahan', 'dataPernikahan', 'totalKematian', 'totalPernikahan', 'total_sm', 'total_sk'));
    }
}
