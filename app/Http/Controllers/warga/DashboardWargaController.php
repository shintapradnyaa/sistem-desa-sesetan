<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\Kematian;
use App\Models\Pernikahan;
use App\Models\SuratKeluarKeputusan;
use Illuminate\Support\Facades\DB;

class DashboardWargaController extends Controller
{
    public function index()
    {

        $data['pernikahan'] = Pernikahan::orderBy('no_suket', 'desc')
            ->join('users', 'users.id', '=', 'pernikahan.user_id')
            ->select('pernikahan.*', 'users.banjar')
            ->orderBy('created_at', 'Desc')
            ->get();

        $data['kematian'] = Kematian::join('users', 'users.id', '=', 'kematian.user_id')
        ->select('users.level', 4)
        ->select('users.banjar', 'kematian.*')
        ->orderBy('created_at', 'Desc')
        ->get();
        $data['sk_keputusan'] = SuratKeluarKeputusan::orderBy('created_at', 'desc')->get();

        return view('pages.warga.dashboard_warga', $data);
    }
}
