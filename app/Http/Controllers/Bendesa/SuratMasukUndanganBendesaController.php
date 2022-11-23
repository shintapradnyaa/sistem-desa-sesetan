<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\SuratMasukUndangan;
use Illuminate\Http\Request;

class SuratMasukUndanganBendesaController extends Controller
{
    public function index()
    {
        $data = SuratMasukUndangan::all();
        return view('pages.bendesa.data_sm_undangan', compact('data'));
    }

    public function show($id)
    {
        $data = SuratMasukUndangan::find($id);
        return view('pages.bendesa.detail_sm_undangan', compact('data'));
    }
}
