<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use App\Models\Pernikahan;
use App\Models\SuratKeluarKeputusan;


class DashboardWargaController extends Controller
{
    public function index()
    {
        $data['pernikahan'] = Pernikahan::orderBy('id', 'desc')->get();
        $data['kematian'] = Kematian::orderBy('id', 'desc')->get();
        $data['sk_keputusan'] = SuratKeluarKeputusan::orderBy('id', 'desc')->get();

        return view('pages.warga.dashboard_warga', $data);
    }
}
