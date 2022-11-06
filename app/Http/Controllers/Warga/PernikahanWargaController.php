<?php

namespace App\Http\Controllers\Warga;

use App\Models\Pernikahan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PernikahanWargaController extends Controller
{
    public function index()
    {
        $data = Pernikahan::all();
        return view('pages.warga.datapernikahan', compact('data'));
    }

    public function show($id)
    {
        $data = Pernikahan::find($id);
        return view('pages.warga.detail_data_pernikahan', compact('data'));
    }
}
