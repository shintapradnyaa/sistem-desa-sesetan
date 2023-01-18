<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\Pernikahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;

class PernikahanWargaController extends Controller
{
    public function index()
    {
        $pernikahan['pernikahan'] = Pernikahan::orderBy('no_suket', 'desc')
            ->where('user_id', Auth::user()->id)
            ->get();
        return view('pages.warga.datapernikahan', $pernikahan);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl_pernikahan'    => 'required',
            'banjar'            => 'required',
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
            'saksi2'            => 'required'
        ], [
            'tgl_pernikahan.required'       => 'Tanggal Pernikahan Tidak Boleh Kosong',
            'banjar.required'               => 'Banjar Tidak Boleh Kosong',
            'nama_pria.required'            => 'Nama Pria Tidak Boleh Kosong',
            'status_pria.required'          => 'Status Pria Tidak Boleh Kosong',
            'tmpt_lahir_pria.required'      => 'Tempat Lahir Tidak Boleh Kosong',
            'tgl_lahir_pria.required'       => 'Tanggal Lahir Tidak Boleh Kosong',
            'pekerjaan_pria.required'       => 'Pekerjaan Tidak Boleh Kosong',
            'alamat_pria.required'          => 'Alamat Tidak Boleh Kosong',
            'nama_wanita.required'          => 'Nama Wanita Tidak Boleh Kosong',
            'status_wanita.required'        => 'Status Wanita Tidak Boleh Kosong',
            'tmpt_lahir_wanita.required'    => 'Tempat Lahir Tidak Boleh Kosong',
            'tgl_lahir_wanita.required'     => 'Tanggal Lahir Tidak Boleh Kosong',
            'pekerjaan_wanita.required'     => 'Pekerjaan Tidak Boleh Kosong',
            'alamat_wanita.required'        => 'Alamat Tidak Boleh Kosong',
            'rohaniawan.required'           => 'Rohaniawan Tidak Boleh Kosong',
            'saksi1.required'               => 'Saksi Tidak Boleh Kosong',
            'saksi2.required'               => 'Saksi Tidak Boleh Kosong'
        ]);

        $data = [
            'user_id'           => Auth::user()->id,
            'tgl_pernikahan'    => $request->tgl_pernikahan,
            'banjar'            => $request->banjar,
            'nama_pria'         => $request->nama_pria,
            'status_pria'       => $request->status_pria,
            'tmpt_lahir_pria'   => $request->tmpt_lahir_pria,
            'tgl_lahir_pria'    => $request->tgl_lahir_pria,
            'pekerjaan_pria'    => $request->pekerjaan_pria,
            'alamat_pria'       => $request->alamat_pria,
            'nama_wanita'       => $request->nama_wanita,
            'status_wanita'     => $request->status_wanita,
            'tmpt_lahir_wanita' => $request->tmpt_lahir_wanita,
            'tgl_lahir_wanita'  => $request->tgl_lahir_wanita,
            'pekerjaan_wanita'  => $request->pekerjaan_wanita,
            'alamat_wanita'     => $request->alamat_wanita,
            'rohaniawan'        => $request->rohaniawan,
            'saksi1'            => $request->saksi1,
            'saksi2'            => $request->saksi2
        ];

        Pernikahan::create($data);
        return redirect('pernikahan_warga')->with('message', 'Data Berhasil Di Tambahkan');
    }

    public function show($id)
    {
        $pernikahan = Pernikahan::find($id);

        $hari_pernikahan = date('D', strtotime($pernikahan->tgl_pernikahan));
        $tanggal_pernikahan = date('d', strtotime($pernikahan->tgl_pernikahan));
        $bulan_pernikahan = date('M', strtotime($pernikahan->tgl_pernikahan));
        $tahun_pernikahan = date('Y', strtotime($pernikahan->tgl_pernikahan));

        $days = [
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'The' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => "Sabtu"
        ];

        $month = [
            'Jan' => 'Januari',
            'Feb' => 'Februari',
            'Mar' => 'Maret',
            'Apr' => 'April',
            'May' => 'Mei',
            'Jun' => 'Juni',
            'Jul' => 'Juli',
            'Aug' => 'Agustus',
            'Sep' => 'September',
            'Oct' => 'Oktober',
            'Nov' => 'November',
            'Dec' => 'Desember'
        ];

        $hari = null;
        foreach ($days as $key => $value) {
            if ($key == $hari_pernikahan) {
                $hari = $value;
            }
        }
        $bulan = null;
        foreach ($month as $key => $value) {
            if ($key == $bulan_pernikahan) {
                $bulan = $value;
            }
        }

        $data['hari_pernikahan'] = $hari;
        $data['tanggal_pernikahan'] = $tanggal_pernikahan;
        $data['bulan_pernikahan'] = $bulan;
        $data['tahun_pernikahan'] = $tahun_pernikahan;
        $data['row_pernikahan'] = $pernikahan;
        return view('pages.warga.detail_data_pernikahan', $data);
    }

    public function download($id)
    {
        $pernikahan = Pernikahan::find($id);

        $hari_pernikahan = date('D', strtotime($pernikahan->tgl_pernikahan));
        $tanggal_pernikahan = date('d', strtotime($pernikahan->tgl_pernikahan));
        $bulan_pernikahan = date('M', strtotime($pernikahan->tgl_pernikahan));
        $tahun_pernikahan = date('Y', strtotime($pernikahan->tgl_pernikahan));

        $days = [
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'The' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => "Sabtu"
        ];

        $month = [
            'Jan' => 'Januari',
            'Feb' => 'Februari',
            'Mar' => 'Maret',
            'Apr' => 'April',
            'May' => 'Mei',
            'Jun' => 'Juni',
            'Jul' => 'Juli',
            'Aug' => 'Agustus',
            'Sep' => 'September',
            'Oct' => 'Oktober',
            'Nov' => 'November',
            'Dec' => 'Desember'
        ];

        $hari = null;
        foreach ($days as $key => $value) {
            if ($key == $hari_pernikahan) {
                $hari = $value;
            }
        }
        $bulan = null;
        foreach ($month as $key => $value) {
            if ($key == $bulan_pernikahan) {
                $bulan = $value;
            }
        }

        $data['hari_pernikahan'] = $hari;
        $data['tanggal_pernikahan'] = $tanggal_pernikahan;
        $data['bulan_pernikahan'] = $bulan;
        $data['tahun_pernikahan'] = $tahun_pernikahan;
        $data['row_pernikahan'] = $pernikahan;

        $pdf = PDF::loadview('pages.warga.download', $data)->setPaper('f4', 'portrait');
        // return $pdf->download('surat_pernikahan.pdf');
        return $pdf->stream('surat_pernikahan.pdf');
    }

    public function edit($id)
    {
        $data['data'] = Pernikahan::find($id);
        $data['banjar'] = [
            'Banjar Tengah',
            'Banjar Pembungan',
            'Banjar Gaduh',
            'Banjar Kaja',
            'Banjar Puri Agung',
            'Banjar Lantang Bejuh',
            'Banjar Dukuh Sari',
            'Banjar Pegok',
            'Banjar Suwung Batan Kendal'
        ];
        $data['status_pria'] = ['Purusa', 'Pradana'];
        $data['status_wanita'] = ['Purusa', 'Pradana'];
        $data['status_surat'] = ['Proses', 'Selesai'];
        return view('pages.warga.edit_data_pernikahan', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tgl_pernikahan'    => 'required',
            'banjar'            => 'required',
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
            'saksi2'            => 'required'
        ], [
            'tgl_pernikahan.required'   => 'Tanggal Pernikahan Tidak Boleh Kosong',
            'banjar.required'           => 'Banjar Tidak Boleh Kosong',
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
            'saksi2.required'           => 'Saksi Tidak Boleh Kosong'
        ]);

        $data = Pernikahan::find($id);
        $data->update($request->all());
        return redirect('pernikahan_warga')->with('message', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $data = Pernikahan::find($id);
        $data->delete();
        return redirect('pernikahan_warga')->with('message', 'Data Berhasil Di Hapus');
    }
}
