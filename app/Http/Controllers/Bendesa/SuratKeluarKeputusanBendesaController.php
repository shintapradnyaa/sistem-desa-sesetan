<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SuratKeluarKeputusan;

class SuratKeluarKeputusanBendesaController extends Controller
{
    public function index()
    {
        $data = SuratKeluarKeputusan::orderBy('tgl_sk_keluar', 'desc')->get();
        return view('pages.bendesa.data_sk_keputusan', compact('data'));
    }
    public function show($id)
    {
        $data = SuratKeluarKeputusan::find($id);
        return view('pages.bendesa.detail_sk_keputusan', compact('data'));
    }
}
