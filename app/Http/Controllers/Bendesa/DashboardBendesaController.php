<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\Kematian;
use App\Models\Pernikahan;
use App\Models\SuratKeluarKeputusan;
use App\Models\SuratKeluarProposal;
use App\Models\SuratKeluarUndangan;
use App\Models\SuratMasukKeputusan;
use App\Models\SuratMasukProposal;
use App\Models\SuratMasukUndangan;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardBendesaController extends Controller
{
    public function index()
    {
        $total_sm_proposal  = SuratMasukProposal::count();
        $total_sm_undangan  = SuratMasukUndangan::count();
        $total_sm_keputusan = SuratMasukKeputusan::count();

        $total_sm   = $total_sm_keputusan + $total_sm_undangan + $total_sm_proposal;

        $total_sk_proposal  = SuratKeluarProposal::count();
        $total_sk_undangan  = SuratKeluarUndangan::count();
        $total_sk_keputusan = SuratKeluarKeputusan::count();

        $total_sk   = $total_sk_proposal + $total_sk_undangan + $total_sk_keputusan;

        $totalPengguna = User::count();

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

        // dd($data);

        return view('pages.bendesa.dashboard_bendesa', compact('labels', 'data', 'labelsPernikahan', 'dataPernikahan', 'total_sm', 'total_sk', 'totalPengguna'));
    }
}
