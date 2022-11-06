<?php

namespace App\Http\Controllers\Kelihan;

use Illuminate\Http\Request;
use App\Models\SuratKeluarUndangan;
use App\Http\Controllers\Controller;

class SuratKeluarUndanganKelihanController extends Controller
{
    public function index()
    {
        $data = SuratKeluarUndangan::all();
        return view('pages.kelihan.data_sk_undangan', compact('data'));
    }

    public function show($id)
    {
        $data = SuratKeluarUndangan::find($id);
        return view('pages.kelihan.detail_sk_undangan', compact('data'));
    }
}
