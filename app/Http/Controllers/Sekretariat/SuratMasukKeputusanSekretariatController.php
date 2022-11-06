<?php

namespace App\Http\Controllers\Sekretariat;

use Illuminate\Http\Request;
use App\Models\SuratMasukKeputusan;
use App\Http\Controllers\Controller;

class SuratMasukKeputusanSekretariatController extends Controller
{
    public function index()
    {
        $data = SuratMasukKeputusan::all();
        return view('pages.sekretariat.data_sm_keputusan', compact('data'));
    }

    public function create()
    {
        return view('create_sm_keputusan_sekretariat');
    }

    public function store(Request $request)
    {
        $data = SuratMasukKeputusan::create($request->all());
        if ($request->hasFile('foto_sm_keputusan')) {
            $request->file('foto_sm_keputusan')->move('foto_sm_keputusan/', $request->file('foto_sm_keputusan')->getClientOriginalName());
            $data->foto_sm_keputusan = $request->file('foto_sm_keputusan')->getClientOriginalName();
            $data->save();
        }
        return redirect('index_sm_keputusan_sekretariat');
    }

    public function edit($id)
    {
        $data = SuratMasukKeputusan::find($id);
        return view('pages.sekretariat.edit_sm_keputusan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SuratMasukKeputusan::find($id);
        $data->update($request->all());
        return redirect('index_sm_keputusan_sekretariat')->with('success', 'Data Berhasil Di Tambahkan');
    }


    public function delete($id)
    {
        $data = SuratMasukKeputusan::find($id);
        $data->delete();
        return redirect('index_sm_keputusan_sekretariat');
    }
}
