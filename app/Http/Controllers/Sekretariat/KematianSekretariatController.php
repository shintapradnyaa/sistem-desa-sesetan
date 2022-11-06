<?php

namespace App\Http\Controllers\Sekretariat;

use App\Models\Kematian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KematianSekretariatController extends Controller
{
    public function index(Request $request)
    {
        $data = Kematian::all();
        return view('pages.sekretariat.datakematian', compact('data'));
    }

    public function create()
    {

        return view('create_data_kematian_kelihan');
    }

    public function store(Request $request)
    {
        $data = Kematian::create($request->all());
        if ($request->hasFile('foto_ktp')) {
            $request->file('foto_ktp')->move('foto_ktp_kematian/', $request->file('foto_ktp')->getClientOriginalName());
            $data->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
            $data->save();
        }
        return redirect('index_data_kematian_sekretariat')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function show($id)
    {
        $data = Kematian::find($id);
        return view('pages.sekretariat.detail_data_kematian', compact('data'));
    }

    public function edit($id)
    {
        $data = Kematian::find($id);

        return view('pages.sekretariat.edit_data_kematian', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Kematian::find($id);
        $data->update($request->all());

        return redirect('index_data_kematian_sekretariat')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $data = Kematian::find($id);
        $data->delete();
        return redirect('index_data_kematian_sekretariat')->with('success', 'Data Berhasil Di Hapus');
    }
}
