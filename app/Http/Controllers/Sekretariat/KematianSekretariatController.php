<?php

namespace App\Http\Controllers\Sekretariat;

use App\Models\Kematian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class KematianSekretariatController extends Controller
{
    public function index()
    {
        $data['kematian'] = Kematian::join('users', 'users.id', '=', 'kematian.user_id')
            ->select('users.banjar', 'kematian.*')
            ->get();
        return view('pages.sekretariat.datakematian', $data);
    }

    public function show($id)
    {
        $data['kematian'] = Kematian::find($id);
        $data['kematian'] = DB::table('kematian')->where('kematian.id', $id)
            ->join('users', 'users.id', '=', 'kematian.user_id')
            ->select('kematian.*', 'users.banjar')
            ->first();
        return view('pages.sekretariat.detail_data_kematian', $data);
    }

    public function delete($id)
    {
        $data = Kematian::find($id);
        $data->delete();
        return redirect('kematian_sekretariat')->with('message', 'Data Berhasil Di Hapus');
    }
}
