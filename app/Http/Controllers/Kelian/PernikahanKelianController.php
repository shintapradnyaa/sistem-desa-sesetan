<?php

namespace App\Http\Controllers\Kelian;

use App\Models\Pernikahan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PernikahanKelianController extends Controller
{
    public function index()
    {
        $data = Pernikahan::orderBy('no_suket', 'desc')->get();
        return view('pages.kelian.datapernikahan', compact('data'));
    }

    public function show($id)
    {
        $data = Pernikahan::find($id);
        return view('pages.kelian.detail_data_pernikahan', compact('data'));
    }

    public function delete($id)
    {
        $data = Pernikahan::find($id);
        $data->delete();
        return redirect('index_data_pernikahan_kelian')->with('message', 'Data Berhasil Di Hapus');
    }
}
