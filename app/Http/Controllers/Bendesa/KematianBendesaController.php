<?php

namespace App\Http\Controllers\Bendesa;

use App\Http\Controllers\Controller;
use App\Models\Kematian;
use Illuminate\Http\Request;
use PDF;


class KematianBendesaController extends Controller
{
    public function index(Request $request)
    {
        $data = Kematian::all();
        return view('pages.bendesa.datakematian', compact('data'));
    }

    public function create()
    {

        return view('create_data_kematian');
    }

    public function store(Request $request)
    {
        $data = Kematian::create($request->all());
        if ($request->hasFile('foto_ktp')) {
            $request->file('foto_ktp')->move('foto_ktp_kematian/', $request->file('foto_ktp')->getClientOriginalName());
            $data->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
            $data->save();
        }
        return redirect('index_data_kematian_bendesa')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function show($id)
    {
        $data = Kematian::find($id);
        return view('pages.bendesa.detail_data_kematian', compact('data'));
    }

    public function edit($id)
    {
        $data = Kematian::find($id);

        return view('pages.bendesa.edit_data_kematian', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Kematian::find($id);
        $data->update($request->all());

        return redirect('index_data_kematian_bendesa')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $data = Kematian::find($id);
        $data->delete();
        return redirect('index_data_kematian_bendesa')->with('success', 'Data Berhasil Di Hapus');
    }

    // public function export_pdf_kematian()
    // {
    //     $data = Kematian::all();
    //     view()->share('data', $data);
    //     $pdf = PDF::loadview('data_kematian-pdf');
    //     return $pdf->download('Data_Kematian.pdf');
    // }
}
