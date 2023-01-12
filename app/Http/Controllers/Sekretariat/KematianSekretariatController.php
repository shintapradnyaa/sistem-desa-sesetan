<?php

namespace App\Http\Controllers\Sekretariat;

use App\Models\Kematian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KematianSekretariatController extends Controller
{
    public function index(Request $request)
    {
        $data = Kematian::orderBy('tgl_kematian', 'desc')->get();
        return view('pages.sekretariat.datakematian', compact('data'));
    }

    public function show($id)
    {
        $data = Kematian::find($id);
        return view('pages.sekretariat.detail_data_kematian', compact('data'));
    }

    public function delete($id)
    {
        $data = Kematian::find($id);
        $data->delete();
        return redirect('kematian_sekretariat')->with('message', 'Data Berhasil Di Hapus');
    }
}
