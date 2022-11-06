<?php

namespace App\Http\Controllers\Sekretariat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuratKeluarKeputusan;

class SuratKeluarKeputusanSekretariatController extends Controller
{
    public function index()
    {
        $data = SuratKeluarKeputusan::all();
        return view('pages.sekretariat.data_sk_keputusan', compact('data'));
    }

    public function create()
    {
        return view('create_sk_keputusan_sekretariat');
    }

    public function store(Request $request)
    {
        $data = SuratKeluarKeputusan::create($request->all());
        if ($request->hasFile('foto_sk_keputusan')) {
            $request->file('foto_sk_keputusan')->move('foto_sk_keputusan/', $request->file('foto_sk_keputusan')->getClientOriginalName());
            $data->foto_sk_keputusan = $request->file('foto_sk_keputusan')->getClientOriginalName();
            $data->save();
        }
        return redirect('index_sk_keputusan_sekretariat');
    }
    public function edit($id)
    {
        $data = SuratKeluarKeputusan::find($id);
        return view('pages.sekretariat.edit_sk_keputusan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SuratKeluarKeputusan::find($id);
        $data->update($request->all());
        return redirect('index_sk_keputusan_sekretariat')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function delete($id)
    {
        $data = SuratKeluarKeputusan::find($id);
        $data->delete();
        return redirect('index_sk_keputusan_sekretariat');
    }
}
