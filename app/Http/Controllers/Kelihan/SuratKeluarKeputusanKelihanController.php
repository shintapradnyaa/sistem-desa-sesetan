<?php

namespace App\Http\Controllers\Kelihan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuratKeluarKeputusan;

class SuratKeluarKeputusanKelihanController extends Controller
{
    public function index()
    {
        $data = SuratKeluarKeputusan::all();
        return view('pages.kelihan.data_sk_keputusan', compact('data'));
    }

    public function show($id)
    {
        $data = SuratKeluarKeputusan::find($id);
        return view('pages.kelihan.detail_sk_keputusan', compact('data'));
    }
}
