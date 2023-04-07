<?php

namespace App\Http\Controllers\Bendesa;


// use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Pernikahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PernikahanBendesaController extends Controller
{
    public function index()
    {
        $data['pernikahan'] = Pernikahan::join('users', 'users.id', '=', 'pernikahan.user_id')
            ->select('users.banjar', 'pernikahan.*')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.bendesa.datapernikahan', $data);
    }
    public function show($id)
    {
        $data['pernikahan'] = Pernikahan::find($id);
        $data['pernikahan'] = DB::table('pernikahan')->where('pernikahan.id', $id)
            ->join('users', 'users.id', '=', 'pernikahan.user_id')
            ->select('pernikahan.*', 'users.banjar')
            ->first();
        // dd($data);
        return view('pages.bendesa.detail_data_pernikahan', $data);
    }
    public function edit($id)
    {
        $data['data'] = Pernikahan::find($id);
        $data['status_pria'] = ['Purusa', 'Pradana'];
        $data['status_wanita'] = ['Purusa', 'Pradana'];
        $data['status_surat'] = ['Proses', 'Selesai'];
        $data['pernikahan'] = DB::table('pernikahan')->where('pernikahan.id', $id)
            ->join('users', 'users.id', '=', 'pernikahan.user_id')
            ->select('pernikahan.*', 'users.banjar')
            ->first();

        $pernikahan = Pernikahan::max('no_suket');
        $bulan = date('m');

        if ($bulan == '01') {
            $bulan = "I";
        } elseif ($bulan == '02') {
            $bulan = "II";
        } elseif ($bulan == '03') {
            $bulan = "III";
        } elseif ($bulan == '04') {
            $bulan = "IV";
        } elseif ($bulan == '05') {
            $bulan = "V";
        } elseif ($bulan == '06') {
            $bulan = "VI";
        } elseif ($bulan == '07') {
            $bulan = "VII";
        } elseif ($bulan == '08') {
            $bulan = "VIII";
        } elseif ($bulan == '09') {
            $bulan = "IX";
        } elseif ($bulan == '10') {
            $bulan = "X";
        } elseif ($bulan == '11') {
            $bulan = "XI";
        } elseif ($bulan == '12') {
            $bulan = "XII";
        }

        // dd($pernikahan);
        $nomer =  substr($pernikahan, 0, 3);
        // dd($nomer + 1);

        $data['no_suket']   = ((int)$nomer + 1 . '/BDS-SST/SKK/' . $bulan . '/' . date("Y"));
        // dd($data['no_suket']);
        return view('pages.bendesa.edit_data_pernikahan', $data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'no_suket'          => 'required',
            'tgl_pernikahan'    => 'required',
            'nama_pria'         => 'required',
            'status_pria'       => 'required',
            'tmpt_lahir_pria'   => 'required',
            'tgl_lahir_pria'    => 'required',
            'pekerjaan_pria'    => 'required',
            'alamat_pria'       => 'required',
            'nama_wanita'       => 'required',
            'status_wanita'     => 'required',
            'tmpt_lahir_wanita' => 'required',
            'tgl_lahir_wanita'  => 'required',
            'pekerjaan_wanita'  => 'required',
            'alamat_wanita'     => 'required',
            'rohaniawan'        => 'required',
            'saksi1'            => 'required',
            'saksi2'            => 'required',
            'status_surat'      => 'required'
        ], [
            'no_suket.required'         => 'Nomor Surat Keterangan Tidak Boleh Kosong',
            'tgl_pernikahan.required'   => 'Tanggal Pernikahan Tidak Boleh Kosong',
            'nama_pria.required'        => 'Nama Pria Tidak Boleh Kosong',
            'status_pria.required'      => 'Status Pria Tidak Boleh Kosong',
            'tmpt_lahir_pria.required'  => 'Tempat Lahir Tidak Boleh Kosong',
            'tgl_lahir_pria.required'   => 'Tanggal Lahir Tidak Boleh Kosong',
            'pekerjaan_pria.required'   => 'Pekerjaan Tidak Boleh Kosong',
            'alamat_pria.required'      => 'Alamat Tidak Boleh Kosong',
            'nama_wanita.required'      => 'Nama Wanita Tidak Boleh Kosong',
            'status_wanita.required'    => 'Status Wanita Tidak Boleh Kosong',
            'tmpt_lahir_wanita.required' => 'Tempat Lahir Tidak Boleh Kosong',
            'tgl_lahir_wanita.required' => 'Tanggal Lahir Tidak Boleh Kosong',
            'pekerjaan_wanita.required' => 'Pekerjaan Tidak Boleh Kosong',
            'alamat_wanita.required'    => 'Alamat Tidak Boleh Kosong',
            'rohaniawan.required'       => 'Rohaniawan Tidak Boleh Kosong',
            'saksi1.required'           => 'Saksi Tidak Boleh Kosong',
            'saksi2.required'           => 'Saksi Tidak Boleh Kosong',
            'status_surat'              => 'Status Surat Tidak Boleh Kosong'
        ]);

        $data = [
            'no_suket'              => $request->no_suket,
            'tgl_pernikahan'        => $request->tgl_pernikahan,
            'nama_pria'             => $request->nama_pria,
            'status_pria'           => $request->status_pria,
            'tmpt_lahir_pria'       => $request->tmpt_lahir_pria,
            'tgl_lahir_pria'        => $request->tgl_lahir_pria,
            'pekerjaan_pria'        => $request->pekerjaan_pria,
            'alamat_pria'           => $request->alamat_pria,
            'nama_wanita'           => $request->nama_wanita,
            'status_wanita'         => $request->status_wanita,
            'tmpt_lahir_wanita'     => $request->tmpt_lahir_wanita,
            'tgl_lahir_wanita'      => $request->tgl_lahir_wanita,
            'pekerjaan_wanita'      => $request->pekerjaan_wanita,
            'alamat_wanita'         => $request->alamat_wanita,
            'rohaniawan'            => $request->rohaniawan,
            'saksi1'                => $request->saksi1,
            'saksi2'                => $request->saksi2,
            'status_surat'          => $request->status_surat
        ];
        $update = Pernikahan::find($id);
        $update->update($data);
        return redirect('pernikahan_bendesa')->with('message', 'Data Berhasil Di Update');
    }
}
