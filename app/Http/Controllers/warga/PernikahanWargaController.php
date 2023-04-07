<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\Pernikahan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class PernikahanWargaController extends Controller
{
    public function index()
    {
        $data['pernikahan'] = Pernikahan::join('users', 'users.id', '=', 'pernikahan.user_id')
        ->where('banjar', Auth::user()->banjar)
        ->select('users.banjar', 'pernikahan.*')
        ->orderBy('created_at', 'Desc')
        ->get();
        return view('pages.warga.datapernikahan', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
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
            'umur_pria'         => 'required|max:19',
            'umur_wanita'       => 'required|max:19'
        ], [
            'tgl_pernikahan.required'       => 'Tanggal Pernikahan Tidak Boleh Kosong',
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
            'saksi2.required'               => 'Saksi Tidak Boleh Kosong',
            'umur_pria.min'                 => 'Maaf pria belum cukup umur, minimal 19 tahun',
            'umur_wanita.min'               => 'Maaf wanita belum cukup umur, minimal 19 tahun',
            'umur_wanita.required'          => 'Umur wanita tidak boleh kosong!',
            'umur_pria.required'            => 'Umur pria tidak boleh kosong!',
        ]);

        $data = [
            'user_id'           => Auth::user()->id,
            'tgl_pernikahan'    => $request->tgl_pernikahan,
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

        $banjar = User::where('id', Auth::user()->id)->first();
        $kelianBanjar = User::where('level', 3)->where('banjar', $banjar->banjar)
            ->first();
        // dd($kelianBanjar);

        $ttd_kelian = '';

        if (Auth::user()->banjar == "Banjar Tengah" && $pernikahan->status_surat == 'Selesai') {
            $ttd_kelian = storage_path('app\public\kelian-tengah.png');
        }
        if (Auth::user()->banjar == "Banjar Kaja" && $pernikahan->status_surat == 'Selesai') {
            $ttd_kelian = storage_path('app\public\kelian-kaja.png');
        }
        if (Auth::user()->banjar == "Banjar Pembungan" && $pernikahan->status_surat == 'Selesai') {
            $ttd_kelian = storage_path('app\public\kelian-pembungan.png');
        }
        if (Auth::user()->banjar == "Banjar Gaduh" && $pernikahan->status_surat == 'Selesai') {
            $ttd_kelian = storage_path('app\public\kelian-gaduh.png');
        }
        if (Auth::user()->banjar == "Banjar Tengah" && $pernikahan->status_surat == 'Selesai') {
            $ttd_kelian = storage_path('app\public\kelian-tengah.png');
        }
        if (Auth::user()->banjar == "Banjar Lantang Bejuh" && $pernikahan->status_surat == 'Selesai') {
            $ttd_kelian = storage_path('app\public\kelian-lb.png');
        }
        if (Auth::user()->banjar == "Banjar Puri Agung" && $pernikahan->status_surat == 'Selesai') {
            $ttd_kelian = storage_path('app\public\kelian-pa.png');
        }
        if (Auth::user()->banjar == "Banjar Dukuh Sari" && $pernikahan->status_surat == 'Selesai') {
            $ttd_kelian = storage_path('app\public\kelian-ds.png');
        }
        if (Auth::user()->banjar == "Banjar Pegok" && $pernikahan->status_surat == 'Selesai') {
            $ttd_kelian = storage_path('app\public\kelian-pegok.png');
        }
        if (Auth::user()->banjar == "Banjar Suwung Batan Kendal" && $pernikahan->status_surat == 'Selesai') {
            $ttd_kelian = storage_path('app\public\kelian-sbk.png');
        }
        // dd($ttd_kelian);
        $data['hari_pernikahan']    = $hari;
        $data['tanggal_pernikahan'] = $tanggal_pernikahan;
        $data['bulan_pernikahan']   = $bulan;
        $data['tahun_pernikahan']   = $tahun_pernikahan;
        $data['row_pernikahan']     = $pernikahan;
        $data['kelianBanjar']       = $kelianBanjar->name;
        $data['ttd_kelian']         = $ttd_kelian;

        $pdf = PDF::loadview('pages.warga.download', $data)->setPaper('f4', 'portrait');
        // return $pdf->download('surat_pernikahan.pdf');
        return $pdf->stream('surat_pernikahan.pdf');
    }

    public function edit($id)
    {
        $data['data']           = Pernikahan::find($id);
        $data['status_pria']    = ['Purusa', 'Pradana'];
        $data['status_wanita']  = ['Purusa', 'Pradana'];
        $data['status_surat']   = ['Proses', 'Selesai'];
        $data['pernikahan']     = DB::table('pernikahan')->where('users.id', Auth::user()->id)
            ->join('users', 'users.id', '=', 'pernikahan.user_id')
            ->select('pernikahan.*', 'users.banjar')
            ->first();
        // dd($data['pernikahan']);
        return view('pages.warga.edit_data_pernikahan', $data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
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
            'saksi2'            => 'required'
        ], [
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
            'saksi2.required'           => 'Saksi Tidak Boleh Kosong'
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
