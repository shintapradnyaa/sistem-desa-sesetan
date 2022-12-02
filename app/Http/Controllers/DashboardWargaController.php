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
        $data['pernikahan'] = Pernikahan::all();
        return view('pages.warga.dashboard_warga', $data);
    }
}
