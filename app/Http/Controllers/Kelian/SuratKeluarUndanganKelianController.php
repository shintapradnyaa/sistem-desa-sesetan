<?php

namespace App\Http\Controllers\Kelian;

use Illuminate\Http\Request;
use App\Models\SuratKeluarUndangan;
use App\Http\Controllers\Controller;

class SuratKeluarUndanganKelianController extends Controller
{
    public function index()
    {
        $data = SuratKeluarUndangan::orderBy('tgl_sk_keluar', 'desc')->get();
        return view('pages.kelian.data_sk_undangan', compact('data'));
    }

    public function show($id)
    {
        $data = SuratKeluarUndangan::find($id);
        return view('pages.kelian.detail_sk_undangan', compact('data'));
    }
}
