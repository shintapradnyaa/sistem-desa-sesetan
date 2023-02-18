<?php

namespace App\Http\Controllers\Kelian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuratKeluarKeputusan;

class SuratKeluarKeputusanKelianController extends Controller
{
    public function index()
    {
        $data['sk_keputusan'] = SuratKeluarKeputusan::orderBy('no_sk_keputusan', 'desc')->get();
        return view('pages.kelian.data_sk_keputusan', $data);
    }

    public function show($id)
    {
        $data = SuratKeluarKeputusan::find($id);
        return view('pages.kelian.detail_sk_keputusan', compact('data'));
    }
}
