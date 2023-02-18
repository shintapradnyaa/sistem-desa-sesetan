<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\SuratMasukUndangan;
use Illuminate\Http\Request;

class SuratMasukUndanganBendesaController extends Controller
{
    public function index()
    {
        $data['sm_undangan'] = SuratMasukUndangan::orderBy('no_sm_undangan', 'desc')->get();
        return view('pages.bendesa.data_sm_undangan', $data);
    }
}
