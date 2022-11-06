<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\SuratMasukKeputusan;
use Illuminate\Http\Request;

class SuratMasukKeputusanBendesaController extends Controller
{
    public function index()
    {
        $data = SuratMasukKeputusan::all();
        return view('pages.bendesa.data_sm_keputusan', compact('data'));
    }

    public function create()
    {
        return view('create_sm_keputusan_bendesa');
    }

    public function store(Request $request)
    {
        $data = SuratMasukKeputusan::create($request->all());
        if ($request->hasFile('foto_sm_keputusan')) {
            $request->file('foto_sm_keputusan')->move('foto_sm_keputusan/', $request->file('foto_sm_keputusan')->getClientOriginalName());
            $data->foto_sm_keputusan = $request->file('foto_sm_keputusan')->getClientOriginalName();
            $data->save();
        }
        return redirect('index_sm_keputusan_bendesa');
    }

    public function edit($id)
    {
        $data = SuratMasukKeputusan::find($id);
        return view('pages.bendesa.edit_sm_keputusan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SuratMasukKeputusan::find($id);
        $data->update($request->all());
        return redirect('index_sm_keputusan_bendesa')->with('success', 'Data Berhasil Di Tambahkan');
    }


    public function delete($id)
    {
        $data = SuratMasukKeputusan::find($id);
        $data->delete();
        return redirect('index_sm_keputusan_bendesa');
    }
}
