<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\SuratMasukUndangan;
use Illuminate\Http\Request;

class SuratMasukUndanganBendesaController extends Controller
{
    public function index()
    {
        $data = SuratMasukUndangan::all();
        return view('pages.bendesa.data_sm_undangan', compact('data'));
    }

    public function create()
    {
        return view('create_sm_undangan_bendesa');
    }

    public function store(Request $request)
    {
        $data = SuratMasukUndangan::create($request->all());
        if ($request->hasFile('foto_sm_undangan')) {
            $request->file('foto_sm_undangan')->move('foto_sm_undangan/', $request->file('foto_sm_undangan')->getClientOriginalName());
            $data->foto_sm_undangan = $request->file('foto_sm_undangan')->getClientOriginalName();
            $data->save();
        }
        return redirect('index_sm_undangan_bendesa');
    }

    public function edit($id)
    {
        $data = SuratMasukUndangan::find($id);
        return view('pages.bendesa.edit_sm_undangan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SuratMasukUndangan::find($id);
        $data->update($request->all());
        return redirect('index_sm_undangan_bendesa')->with('success', 'Data Berhasil Di Tambahkan');
    }


    public function delete($id)
    {
        $data = SuratMasukUndangan::find($id);
        $data->delete();
        return redirect('index_sm_undangan_bendesa');
    }
}
