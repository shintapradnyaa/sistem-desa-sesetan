<?php

namespace App\Http\Controllers\Kelian;

use App\Models\Pernikahan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PernikahanKelianController extends Controller
{
    public function index()
    {
        $data['pernikahan'] = Pernikahan::join('users', 'users.id', '=', 'pernikahan.user_id')
            ->select('users.banjar', 'pernikahan.*')
            ->orderBy('no_suket', 'desc')
            ->get();
        // dd($data);
        return view('pages.kelian.datapernikahan', $data);
    }

    public function show($id)
    {
        $data = Pernikahan::find($id);
        $data['pernikahan'] = DB::table('pernikahan')->where('pernikahan.id', $id)
            ->join('users', 'users.id', '=', 'pernikahan.user_id')
            ->select('pernikahan.*', 'users.banjar')
            ->first();
        // dd($data);
        return view('pages.kelian.detail_data_pernikahan', $data);
    }

    public function delete($id)
    {
        $data = Pernikahan::find($id);
        $data->delete();
        return redirect('index_data_pernikahan_kelian')->with('message', 'Data Berhasil Di Hapus');
    }
}
