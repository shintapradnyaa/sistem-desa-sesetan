<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use App\Models\Pernikahan;
use App\Models\SuratKeluarKeputusan;
use Illuminate\Http\Request;

class DashboardWargaController extends Controller
{
    public function index()
    {
        $totalKematian = Kematian::count();
        $totalPernikahan = Pernikahan::count();
        $total_sk_Keputusan = SuratKeluarKeputusan::count();

        return view('pages.warga.dashboard_warga', compact('totalKematian', 'totalPernikahan', 'total_sk_Keputusan'));
    }
}
