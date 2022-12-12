<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluarUndangan;
use Illuminate\Http\Request;

class SuratKeluarUndanganBendesaController extends Controller
{
    public function index()
    {
        $data = SuratKeluarUndangan::orderBy('tgl_sk_keluar', 'desc')->get();
        return view('pages.bendesa.data_sk_undangan', compact('data'));
    }


    public function show($id)
    {
        $data = SuratKeluarUndangan::find($id);
        return view('pages.bendesa.detail_sk_undangan', compact('data'));
    }
}
