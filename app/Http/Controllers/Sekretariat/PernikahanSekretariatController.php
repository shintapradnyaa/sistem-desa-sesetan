<?php

namespace App\Http\Controllers\Sekretariat;

use App\Models\Pernikahan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PernikahanSekretariatController extends Controller
{
    public function index()
    {
        $data = Pernikahan::orderBy('no_suket', 'desc')->get();
        return view('pages.sekretariat.datapernikahan', compact('data'));
    }

    public function show($id)
    {
        $data = Pernikahan::find($id);
        return view('pages.sekretariat.detail_data_pernikahan', compact('data'));
    }
}
