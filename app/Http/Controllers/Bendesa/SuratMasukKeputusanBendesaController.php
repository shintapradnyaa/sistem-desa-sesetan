<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\SuratMasukKeputusan;
use Illuminate\Http\Request;

class SuratMasukKeputusanBendesaController extends Controller
{
    public function index()
    {
        $data['sm_keputusan'] = SuratMasukKeputusan::orderBy('no_sm_keputusan', 'desc')->get();
        return view('pages.bendesa.data_sm_keputusan', $data);
    }
}
