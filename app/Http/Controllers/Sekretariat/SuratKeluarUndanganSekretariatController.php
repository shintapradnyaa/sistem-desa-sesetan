<?php

namespace App\Http\Controllers\Sekretariat;

use Illuminate\Http\Request;
use App\Models\SuratKeluarUndangan;
use App\Http\Controllers\Controller;

class SuratKeluarUndanganSekretariatController extends Controller
{
    public function index()
    {
        $data = SuratKeluarUndangan::all();
        return view('pages.sekretariat.data_sk_undangan', compact('data'));
    }

    public function create()
    {
        return view('create_sk_undangan_sekretariat');
    }

    public function store(Request $request)
    {
        $data = SuratKeluarUndangan::create($request->all());
        if ($request->hasFile('foto_sk_undangan')) {
            $request->file('foto_sk_undangan')->move('foto_sk_undangan/', $request->file('foto_sk_undangan')->getClientOriginalName());
            $data->foto_sk_undangan = $request->file('foto_sk_undangan')->getClientOriginalName();
            $data->save();
        }
        return redirect('index_sk_undangan_sekretariat')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $data = SuratKeluarUndangan::find($id);
        return view('pages.sekretariat.edit_sk_undangan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SuratKeluarUndangan::find($id);
        $data->update($request->all());
        return redirect('index_sk_undangan_sekretariat')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function delete($id)
    {
        $data = SuratKeluarUndangan::find($id);
        $data->delete();

        return redirect('index_sk_undangan_sekretariat');
    }
}
