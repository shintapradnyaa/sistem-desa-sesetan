<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\Kematian;
use App\Models\Pernikahan;
use App\Models\SuratKeluarKeputusan;
use App\Models\SuratKeluarUndangan;
use Illuminate\Http\Request;

class DashboardRegisterWargaController extends Controller
{
    public function index()
    {
        $data['totalKematian'] = Kematian::count();
        $data['totalPernikahan'] = Pernikahan::count();

        $data['total_sk_undangan'] = SuratKeluarUndangan::count();
        $data['total_sk_keputusan'] = SuratKeluarKeputusan::count();

        return view('pages.warga.dashboard_login_warga', $data);
    }
}
