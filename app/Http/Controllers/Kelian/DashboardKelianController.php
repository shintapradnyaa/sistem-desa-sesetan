<?php

namespace App\Http\Controllers\Kelian;

use App\Http\Controllers\Controller;
use App\Models\Kematian;
use App\Models\Pernikahan;
use App\Models\SuratKeluarKeputusan;
use App\Models\SuratKeluarUndangan;
use Illuminate\Http\Request;

class DashboardKelianController extends Controller
{
    public function index()
    {
        $totalKematian = Kematian::count();
        $totalPernikahan = Pernikahan::count();

        $total_sk_undangan = SuratKeluarUndangan::count();
        $total_sk_keputusan = SuratKeluarKeputusan::count();
        return view('pages.kelian.dashboard_kelian', compact('totalKematian', 'totalPernikahan', 'total_sk_undangan', 'total_sk_keputusan'));
    }
}
