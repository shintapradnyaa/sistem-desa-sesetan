<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use App\Models\Pernikahan;
use App\Models\SuratKeluarKeputusan;

class DashboardWargaController extends Controller
{
    public function index()
    {

        $data['pernikahan'] = Pernikahan::orderBy('no_suket', 'desc')->get();
        $data['kematian'] = Kematian::orderBy('tgl_kematian', 'desc')->get();
        $data['sk_keputusan'] = SuratKeluarKeputusan::orderBy('tgl_sk_keluar', 'desc')->get();

        return view('pages.warga.dashboard_warga', $data);
    }
}
