<?php

namespace App\Http\Controllers\Kelihan;

use App\Models\Pernikahan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PernikahanKelihanController extends Controller
{
    public function index()
    {
        $data = Pernikahan::all();
        return view('pages.kelihan.datapernikahan', compact('data'));
    }

    public function show($id)
    {
        $data = Pernikahan::find($id);
        return view('pages.kelihan.detail_data_pernikahan', compact('data'));
    }
    public function edit($id)
    {
        $data = Pernikahan::find($id);
        return view('pages.kelihan.edit_data_pernikahan', compact('data'));
    }

    public function delete($id)
    {
        $data = Pernikahan::find($id);
        $data->delete();
        return redirect('index_data_pernikahan_kelihan')->with('success', 'Data Berhasil Di Hapus');
    }
}
