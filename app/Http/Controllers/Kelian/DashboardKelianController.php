<?php

namespace App\Http\Controllers\Kelian;

use App\Http\Controllers\Controller;
use App\Models\Kematian;
use App\Models\Pernikahan;
use App\Models\SuratKeluarKeputusan;
use App\Models\SuratKeluarUndangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardKelianController extends Controller
{
    public function index()
    {
        $totalKematian = Kematian::count();
        $totalPernikahan = Pernikahan::count();

        $total_sk_undangan = SuratKeluarUndangan::count();
        $total_sk_keputusan = SuratKeluarKeputusan::count();
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

        return view('pages.kelian.dashboard_kelian', compact('labels', 'data', 'labelsPernikahan', 'dataPernikahan', 'totalKematian', 'totalPernikahan', 'total_sk_undangan', 'total_sk_keputusan'));
    }
}
