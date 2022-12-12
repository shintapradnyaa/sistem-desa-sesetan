<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\SuratMasukKeputusan;
use Illuminate\Http\Request;

class SuratMasukKeputusanBendesaController extends Controller
{
    public function index()
    {
        $data = SuratMasukKeputusan::orderBy('tgl_sm_masuk', 'desc')->get();
        return view('pages.bendesa.data_sm_keputusan', compact('data'));
    }
    public function show($id)
    {
        $data = SuratMasukKeputusan::find($id);
        return view('pages.bendesa.detail_sm_keputusan', compact('data'));
    }
}
