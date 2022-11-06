<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SuratKeluarKeputusan;

use function GuzzleHttp\Promise\all;

class SuratKeluarKeputusanBendesaController extends Controller
{
    public function index()
    {
        $data = SuratKeluarKeputusan::all();
        return view('pages.bendesa.data_sk_keputusan', compact('data'));
    }

    public function create()
    {
        return view('create_sk_keputusan_bendesa');
    }

    public function store(Request $request)
    {
        $data = SuratKeluarKeputusan::create($request->all());
        if ($request->hasFile('foto_sk_keputusan')) {
            $request->file('foto_sk_keputusan')->move('foto_sk_keputusan/', $request->file('foto_sk_keputusan')->getClientOriginalName());
            $data->foto_sk_keputusan = $request->file('foto_sk_keputusan')->getClientOriginalName();
            $data->save();
        }
        return redirect('index_sk_keputusan_bendesa');
    }
    public function edit($id)
    {
        $data = SuratKeluarKeputusan::find($id);
        return view('pages.bendesa.edit_sk_keputusan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SuratKeluarKeputusan::find($id);
        $data->update($request->all());
        return redirect('index_sk_keputusan_bendesa')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function delete($id)
    {
        $data = SuratKeluarKeputusan::find($id);
        $data->delete();
        return redirect('index_sk_keputusan_bendesa');
    }
}
