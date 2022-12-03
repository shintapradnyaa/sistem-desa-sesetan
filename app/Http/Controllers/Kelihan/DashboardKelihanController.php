<?php

namespace App\Http\Controllers\Kelihan;

use App\Http\Controllers\Controller;
use App\Models\Kematian;
use App\Models\Pernikahan;
use App\Models\SuratKeluarKeputusan;
use App\Models\SuratKeluarUndangan;
use Illuminate\Http\Request;

class DashboardKelihanController extends Controller
{
    public function index()
    {
        $totalKematian = Kematian::count();
        $totalPernikahan = Pernikahan::count();

        $total_sk_undangan = SuratKeluarUndangan::count();
        $total_sk_keputusan = SuratKeluarKeputusan::count();
        return view('pages.kelihan.dashboard_kelihan', compact('totalKematian', 'totalPernikahan', 'total_sk_undangan', 'total_sk_keputusan'));
    }
}
