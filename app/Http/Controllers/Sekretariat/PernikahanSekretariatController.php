<?php

namespace App\Http\Controllers\Sekretariat;

use App\Models\Pernikahan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PernikahanSekretariatController extends Controller
{
    public function index()
    {
        $data = Pernikahan::orderBy('created_at', 'desc')
            ->join('users', 'users.id', '=', 'pernikahan.user_id')
            ->select('pernikahan.*', 'users.banjar')
            ->get();
        return view('pages.sekretariat.datapernikahan', compact('data'));
    }

    public function show($id)
    {
        $data = Pernikahan::find($id);
        $data['pernikahan'] = DB::table('pernikahan')->where('pernikahan.id', $id)
            ->join('users', 'users.id', '=', 'pernikahan.user_id')
            ->select('pernikahan.*', 'users.banjar')
            ->first();
        // dd($data);
        return view('pages.sekretariat.detail_data_pernikahan', $data);
    }
}
