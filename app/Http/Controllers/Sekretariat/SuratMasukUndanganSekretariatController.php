<?php

namespace App\Http\Controllers\Sekretariat;

use Illuminate\Http\Request;
use App\Models\SuratMasukUndangan;
use App\Http\Controllers\Controller;

class SuratMasukUndanganSekretariatController extends Controller
{
    public function index()
    {
        $data = SuratMasukUndangan::all();
        return view('pages.sekretariat.data_sm_undangan', compact('data'));
    }

    public function create()
    {
        return view('create_sm_undangan_sekretariat');
    }

    public function store(Request $request)
    {
        $data = SuratMasukUndangan::create($request->all());
        if ($request->hasFile('foto_sm_undangan')) {
            $request->file('foto_sm_undangan')->move('foto_sm_undangan/', $request->file('foto_sm_undangan')->getClientOriginalName());
            $data->foto_sm_undangan = $request->file('foto_sm_undangan')->getClientOriginalName();
            $data->save();
        }
        return redirect('index_sm_undangan_sekretariat');
    }

    public function edit($id)
    {
        $data = SuratMasukUndangan::find($id);
        return view('pages.sekretariat.edit_sm_undangan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SuratMasukUndangan::find($id);
        $data->update($request->all());
        return redirect('index_sm_undangan_sekretariat')->with('success', 'Data Berhasil Di Tambahkan');
    }


    public function delete($id)
    {
        $data = SuratMasukUndangan::find($id);
        $data->delete();
        return redirect('index_sm_undangan_sekretariat');
    }
}
