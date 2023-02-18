<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\Kematian;
use App\Models\Pernikahan;
use App\Models\SuratKeluarKeputusan;

class DashboardWargaController extends Controller
{
    public function index()
    {

        $data['pernikahan'] = Pernikahan::orderBy('no_suket', 'desc')
            ->join('users', 'users.id', '=', 'pernikahan.user_id')
            ->select('pernikahan.*', 'users.banjar')
            ->get();
        $data['kematian'] = Kematian::join('users', 'users.id', '=', 'kematian.user_id')
            ->select('users.banjar', 'kematian.*')
            ->get();
        $data['sk_keputusan'] = SuratKeluarKeputusan::orderBy('tgl_sk_keluar', 'desc')->get();

        return view('pages.warga.dashboard_warga', $data);
    }
}
