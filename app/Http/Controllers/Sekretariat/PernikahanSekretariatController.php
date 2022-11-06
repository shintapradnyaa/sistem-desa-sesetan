<?php

namespace App\Http\Controllers\Sekretariat;

use App\Models\Pernikahan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PernikahanSekretariatController extends Controller
{
    public function index()
    {
        $data = Pernikahan::all();
        return view('pages.sekretariat.datapernikahan', compact('data'));
    }

    public function create()
    {
        return view('create_data_pernikahan_sekretariat');
    }

    public function store(Request $request)
    {
        $data = Pernikahan::create($request->all());
        return redirect('index_data_pernikahan_sekretariat')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function show($id)
    {
        $data = Pernikahan::find($id);
        return view('pages.sekretariat.detail_data_pernikahan', compact('data'));
    }
    public function edit($id)
    {
        $data = Pernikahan::find($id);
        return view('pages.sekretariat.edit_data_pernikahan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Pernikahan::find($id);
        $data->update($request->all());
        return redirect('index_data_pernikahan_sekretariat')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function delete($id)
    {
        $data = Pernikahan::find($id);
        $data->delete();
        return redirect('index_data_pernikahan_sekretariat')->with('success', 'Data Berhasil Di Hapus');
    }
}
