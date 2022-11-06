<?php

namespace App\Http\Controllers\Warga;

use App\Models\Kematian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KematianWargaController extends Controller
{
    public function index(Request $request)
    {
        $data = Kematian::all();
        return view('pages.warga.datakematian', compact('data'));
    }

    public function show($id)
    {
        $data = Kematian::find($id);
        return view('pages.warga.detail_data_kematian', compact('data'));
    }
}
