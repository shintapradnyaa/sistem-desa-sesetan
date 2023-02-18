<?php

namespace App\Http\Controllers\Sekretariat;

use Illuminate\Http\Request;
use App\Models\SuratKeluarProposal;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SuratKeluarProposalSekretariatController extends Controller
{
    public function index()
    {
        $data['sk_proposal'] = SuratKeluarProposal::orderBy('tgl_sk_keluar', 'desc')->get();
        $sk_proposal = SuratKeluarProposal::max('no_sk_proposal');
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
        $nomer =  substr($sk_proposal, 0, 3);
        // dd($nomer + 1);

        $data['no_sk_proposal']   = ((int)$nomer + 1 . '/BDS-SST/' . $bulan . '/' . date("Y"));
        return view('pages.sekretariat.data_sk_proposal', $data);
    }

    public function create()
    {
        return view('create_sk_proposal_sekretariat');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'no_sk_proposal' => 'required',
                'tgl_sk_keluar'   => 'required',
                'perihal_sk'      => 'required',
                'ditujukan_sk'    => 'required',
                'foto_sk_proposal' => 'required|mimes:doc,docx,pdf'
            ],
            [
                'no_sk_proposal.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sk_keluar.required'   => 'Tanggal Surat Keluar Tidak Boleh Kosong',
                'perihal_sk.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'ditujukan_sk.required'    => 'Tidak Boleh Kosong',
                'foto_sk_proposal.required' => 'Surat Proposal Tidak Boleh Kosong'
            ]
        );
        $data = [
            'user_id'           => Auth::user()->id,
            'no_sk_proposal'    => $request->no_sk_proposal,
            'tgl_sk_keluar'     => $request->tgl_sk_keluar,
            'perihal_sk'        => $request->perihal_sk,
            'ditujukan_sk'      => $request->ditujukan_sk,
            'foto_sk_proposal'  => $request->foto_sk_proposal
        ];
        $sk_proposal = SuratKeluarProposal::create($data);
        if ($request->hasFile('foto_sk_proposal')) {
            $request->file('foto_sk_proposal')->move('foto_sk_proposal/', $request->file('foto_sk_proposal')->getClientOriginalName());
            $sk_proposal->foto_sk_proposal = $request->file('foto_sk_proposal')->getClientOriginalName();
            $sk_proposal->save();
        }
        return redirect('sk_proposal_sekretariat')->with('message', 'Data Berhasil Di Tambahkan');
    }
    public function show($id)
    {
        $data = SuratKeluarProposal::find($id);
        return view('pages.sekretariat.detail_sk_proposal', compact('data'));
    }
    public function edit($id)
    {
        $data = SuratKeluarProposal::find($id);
        return view('pages.sekretariat.edit_sk_proposal', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'no_sk_proposal' => 'required',
                'tgl_sk_keluar'   => 'required',
                'perihal_sk'      => 'required',
                'ditujukan_sk'    => 'required',
                'foto_sk_proposal' => 'mimes:doc,docx,pdf'
            ],
            [
                'no_sk_proposal.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tgl_sk_keluar.required'   => 'Tanggal Surat Keluar Tidak Boleh Kosong',
                'perihal_sk.required'      => 'Perihal Surat Tidak Boleh Kosong',
                'ditujukan_sk.required'    => 'Tidak Boleh Kosong',
                'foto_sk_proposal.required' => 'Surat Proposal Tidak Boleh Kosong'
            ]
        );
        $data = $request->all();
        if ($image = $request->file('foto_sk_proposal')) {
            $destination    = 'foto_sk_proposal/';
            $profileImage   = $image->getClientOriginalName();
            $image->move($destination, $profileImage);
            $data['foto_sk_proposal']   = "$profileImage";
        } else {
            unset($data['foto_sk_proposal']);
        }
        $update = SuratKeluarProposal::findOrFail($id);
        $update->update($data);
        return redirect('sk_proposal_sekretariat')->with('message', 'Data Berhasil Diperbaharui');
    }

    public function delete($id)
    {
        $data = SuratKeluarProposal::find($id);
        $data->delete();
        return redirect('sk_proposal_sekretariat')->with('message', 'Data Berhasil Di Hapus');
    }
}
