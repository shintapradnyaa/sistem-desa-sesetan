<?php

namespace App\Http\Controllers\Warga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuratKeluarKeputusan;

class SuratKeluarKeputusanWargaController extends Controller
{
    public function index()
    {
        $data = SuratKeluarKeputusan::all();
        return view('pages.warga.data_sk_keputusan', compact('data'));
    }
    public function show($id)
    {
        $data = SuratKeluarKeputusan::find($id);
        return view('pages.warga.detail_sk_keputusan', compact('data'));
    }
}
