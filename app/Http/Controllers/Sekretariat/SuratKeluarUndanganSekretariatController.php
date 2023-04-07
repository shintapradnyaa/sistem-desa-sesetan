<?php

namespace App\Http\Controllers\Sekretariat;

use Illuminate\Http\Request;
use App\Models\SuratKeluarUndangan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SuratKeluarUndanganSekretariatController extends Controller
{
    public function index()
    {
        $data['sk_undangan'] = SuratKeluarUndangan::orderBy('no_sk_undangan', 'desc')->get();
        $sk_undangan = SuratKeluarUndangan::max('no_sk_undangan');
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
        $nomer =  substr($sk_undangan, 0, 3);
        // dd($nomer + 1);

        $data['no_sk_undangan']   = ((int)$nomer + 1 . '/PDA-SST/' . $bulan . '/' . date("Y"));
        return view('pages.sekretariat.data_sk_undangan', $data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'no_sk_undangan' => 'required',
                'tgl_sk_keluar'   => 'required',
                'perihal_sk'      => 'required',
                'ditujukan_sk'    => 'required',
                'foto_sk_undangan' => 'required|mimes:doc,docx,pdf'
            ],
            [
                'no_sk_undangan.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sk_keluar.required'   => 'Tanggal Surat Keluar Tidak Boleh Kosong',
                'perihal_sk.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'ditujukan_sk.required'    => 'Tidak Boleh Kosong',
                'foto_sk_undangan.required' => 'Surat Undangan Tidak Boleh Kosong'
            ]
        );
        $data = [
            'user_id'           => Auth::user()->id,
            'no_sk_undangan'    => $request->no_sk_undangan,
            'tgl_sk_keluar'     => $request->tgl_sk_keluar,
            'perihal_sk'        => $request->perihal_sk,
            'ditujukan_sk'      => $request->ditujukan_sk,
            'foto_sk_undangan'  => $request->foto_sk_undangan
        ];
        $sk_undangan = SuratKeluarUndangan::create($data);
        if ($request->hasFile('foto_sk_undangan')) {
            $request->file('foto_sk_undangan')->move('foto_sk_undangan/', $request->file('foto_sk_undangan')->getClientOriginalName());
            $sk_undangan->foto_sk_undangan = $request->file('foto_sk_undangan')->getClientOriginalName();
            $sk_undangan->save();
        }
        return redirect('sk_undangan_sekretariat')->with('message', 'Data Berhasil Di Tambahkan');
    }

    public function show($id)
    {
        $data = SuratKeluarUndangan::find($id);
        return view('pages.sekretariat.detail_sk_undangan', compact('data'));
    }

    public function edit($id)
    {
        $data = SuratKeluarUndangan::find($id);
        return view('pages.sekretariat.edit_sk_undangan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'no_sk_undangan' => 'required',
                'tgl_sk_keluar'   => 'required',
                'perihal_sk'      => 'required',
                'ditujukan_sk'    => 'required',
                'foto_sk_undangan' => 'mimes:mimes:doc,docx,pdf'
            ],
            [
                'no_sk_undangan.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sk_keluar.required'   => 'Tanggal Surat Keluar Tidak Boleh Kosong',
                'perihal_sk.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'ditujukan_sk.required'    => 'Tidak Boleh Kosong',
                'foto_sk_undangan.required' => 'Surat Undangan Tidak Boleh Kosong'
            ]
        );
        $data = $request->all();
        if ($image = $request->file('foto_sk_undangan')) {
            $destination    = 'foto_sk_undangan/';
            $profileImage   = $image->getClientOriginalName();
            $image->move($destination, $profileImage);
            $data['foto_sk_undangan']   = "$profileImage";
        } else {
            unset($data['foto_sk_undangan']);
        }
        $update = SuratKeluarUndangan::findOrFail($id);
        $update->update($data);
        return redirect('sk_undangan_sekretariat')->with('message', 'Data Berhasil Diperbaharui');
    }

    public function delete($id)
    {
        $data = SuratKeluarUndangan::find($id);
        $data->delete();

        return redirect('sk_undangan_sekretariat')->with('message', 'Data Berhasil Di Hapus');
    }
}
