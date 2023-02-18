<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluarUndangan;
use Illuminate\Http\Request;

class SuratKeluarUndanganBendesaController extends Controller
{
    public function index()
    {
        $data['sk_undangan'] = SuratKeluarUndangan::orderBy('no_sk_undangan', 'desc')->get();
        return view('pages.bendesa.data_sk_undangan', $data);
    }
}
