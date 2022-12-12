<?php

namespace App\Http\Controllers\Kelihan;

use App\Models\Pernikahan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PernikahanKelihanController extends Controller
{
    public function index()
    {
        $data = Pernikahan::orderBy('no_suket', 'desc')->get();
        return view('pages.kelihan.datapernikahan', compact('data'));
    }

    public function show($id)
    {
        $data = Pernikahan::find($id);
        return view('pages.kelihan.detail_data_pernikahan', compact('data'));
    }

    public function delete($id)
    {
        $data = Pernikahan::find($id);
        $data->delete();
        return redirect('index_data_pernikahan_kelihan')->with('message', 'Data Berhasil Di Hapus');
    }
}
