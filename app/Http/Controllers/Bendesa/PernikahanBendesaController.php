<?php

namespace App\Http\Controllers\Bendesa;


// use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Pernikahan;
use Illuminate\Http\Request;

class PernikahanBendesaController extends Controller
{
    public function index()
    {
        $data = Pernikahan::all();
        return view('pages.bendesa.datapernikahan', compact('data'));
    }
    public function show($id)
    {
        $data = Pernikahan::find($id);
        return view('pages.bendesa.detail_data_pernikahan', compact('data'));
    }
}
