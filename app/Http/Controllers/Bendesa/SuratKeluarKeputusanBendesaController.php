<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SuratKeluarKeputusan;

class SuratKeluarKeputusanBendesaController extends Controller
{
    public function index()
    {
        $data['sk_keputusan'] = SuratKeluarKeputusan::orderBy('no_sk_keputusan', 'desc')->get();
        return view('pages.bendesa.data_sk_keputusan', $data);
    }
}
