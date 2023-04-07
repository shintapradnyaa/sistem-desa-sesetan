<?php

namespace App\Http\Controllers\Sekretariat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuratKeluarKeputusan;
use Illuminate\Support\Facades\Auth;

class SuratKeluarKeputusanSekretariatController extends Controller
{
    public function index()
    {
        $data['sk_keputusan'] = SuratKeluarKeputusan::orderBy('no_sk_keputusan', 'desc')->get();
        $sk_keputusan = SuratKeluarKeputusan::max('no_sk_keputusan');
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
        $nomer =  substr($sk_keputusan, 0, 3);
        // dd($nomer + 1);

        $data['no_sk_keputusan']   = ((int)$nomer + 1 . '/BDS-SST/' . $bulan . '/' . date("Y"));
        // dd($data['no_sk_keputusan']);

        return view('pages.sekretariat.data_sk_keputusan', $data);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'no_sk_keputusan' => 'required',
                'tgl_sk_keluar'   => 'required',
                'perihal_sk'      => 'required',
                'ditujukan_sk'    => 'required',
                'foto_sk_keputusan' => 'required|mimes:doc,docx,pdf'
            ],
            [
                'no_sk_keputusan.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sk_keluar.required'   => 'Tanggal Surat Keluar Tidak Boleh Kosong',
                'perihal_sk.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'ditujukan_sk.required'    => 'Tidak Boleh Kosong',
                'foto_sk_keputusan.required' => 'Foto Surat Keputusan Tidak Boleh Kosong'
            ]
        );
        $data = [
            'user_id'           => Auth::user()->id,
            'no_sk_keputusan' => $request->no_sk_keputusan,
            'tgl_sk_keluar'   => $request->tgl_sk_keluar,
            'perihal_sk'      => $request->perihal_sk,
            'ditujukan_sk'    => $request->ditujukan_sk,
            'foto_sk_keputusan' => $request->foto_sk_keputusan
        ];

        $sk_keputusan = SuratKeluarKeputusan::create($data);
        if ($request->hasFile('foto_sk_keputusan')) {
            $request->file('foto_sk_keputusan')->move('foto_sk_keputusan/', $request->file('foto_sk_keputusan')->getClientOriginalName());
            $sk_keputusan->foto_sk_keputusan = $request->file('foto_sk_keputusan')->getClientOriginalName();
            $sk_keputusan->save();
        }

        return redirect('sk_keputusan_sekretariat')->with('message', 'Data Berhasil Di Tambahkan');
    }
    public function edit($id)
    {
        $data = SuratKeluarKeputusan::find($id);
        return view('pages.sekretariat.edit_sk_keputusan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'no_sk_keputusan' => 'required',
                'tgl_sk_keluar'   => 'required',
                'perihal_sk'      => 'required',
                'ditujukan_sk'    => 'required',
                'foto_sk_keputusan' => 'mimes:mimes:doc,docx,pdf'
            ],
            [
                'no_sk_keputusan.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sk_keluar.required'   => 'Tanggal Surat Keluar Tidak Boleh Kosong',
                'perihal_sk.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'ditujukan_sk.required'    => 'Tidak Boleh Kosong',
                'foto_sk_keputusan.required' => 'Foto Surat Keputusan Tidak Boleh Kosong'
            ]
        );
        $data = $request->all();
        if ($image = $request->file('foto_sk_keputusan')) {
            $destination    = 'foto_sk_keputusan/';
            $profileImage   = $image->getClientOriginalName();
            $image->move($destination, $profileImage);
            $data['foto_sk_keputusan']   = "$profileImage";
        } else {
            unset($data['foto_sk_keputusan']);
        }
        $update = SuratKeluarKeputusan::findOrFail($id);
        $update->update($data);
        return redirect('sk_keputusan_sekretariat')->with('message', 'Data Berhasil Diperbaharui');
    }
    public function delete($id)
    {
        $data = SuratKeluarKeputusan::find($id);
        $data->delete();
        return redirect('sk_keputusan_sekretariat')->with('message', 'Data Berhasil Di Hapus');
    }
}
