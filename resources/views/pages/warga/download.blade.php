<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    </script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h4 style="font-size:18px">Surat Keterangan Kawin Agama Hindu</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h6 style="font-size:14px">No. {{ $row_pernikahan->no_suket }}</h6>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <p class="text-justify" style="font-size:11px">Yang bertanda tangan dibawah ini Bendasa Adat dan
                    Kelian Adat
                    {{ $row_pernikahan->banjar }} Desa/Kelurahan <u>Sesetan</u> Kecamatan Denpasar Selatan Kab/Kota
                    <u>Denpasar</u> menerangkan dengan sebenarnya bahwa :
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <p class="text-justify ml-3 mr-3" style="font-size:11px">
                    1. &nbsp; &nbsp;Nama Pria &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:
                    {{ $row_pernikahan->nama_pria }}
                    <br>
                    &nbsp; &nbsp; &nbsp; &nbsp;Tempat/Tgl Lahir &nbsp; &nbsp;:
                    {{ $row_pernikahan->tmpt_lahir_pria }},
                    {{ date('d-m-Y', strtotime($row_pernikahan->tgl_lahir_pria)) }} <br>
                    &nbsp; &nbsp; &nbsp;&nbsp; Pekerjaan
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                    {{ $row_pernikahan->pekerjaan_pria }} <br>
                    &nbsp; &nbsp; &nbsp;&nbsp; Alamat
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                    {{ $row_pernikahan->alamat_pria }} <br>
                    &nbsp; &nbsp; &nbsp;&nbsp; Status &nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                    {{ $row_pernikahan->status_pria }} <br>
                </p>
                <p class="text-justify ml-3 mr-3" style="font-size:11px">
                    2. &nbsp; &nbsp;Nama Wanita &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                    {{ $row_pernikahan->nama_wanita }}
                    <br>
                    &nbsp; &nbsp; &nbsp; &nbsp;Tempat/Tgl Lahir &nbsp; &nbsp;:
                    {{ $row_pernikahan->tmpt_lahir_wanita }},
                    {{ date('d-m-Y', strtotime($row_pernikahan->tgl_lahir_wanita)) }} <br>
                    &nbsp; &nbsp; &nbsp;&nbsp; Pekerjaan
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                    {{ $row_pernikahan->pekerjaan_wanita }} <br>
                    &nbsp; &nbsp; &nbsp;&nbsp; Alamat
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                    {{ $row_pernikahan->alamat_wanita }} <br>
                    &nbsp; &nbsp; &nbsp;&nbsp; Status &nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                    {{ $row_pernikahan->status_wanita }} <br>
                </p>
            </div>
        </div>
        <div class="row justify-content-center" style="font-size:11px">
            <?php
            $alamat_nikah = '';

            if ($row_pernikahan->alamat_pria != 'purusa') {
                $alamat_nikah = $row_pernikahan->alamat_pria;
            } else {
                $alamat_nikah = $row_pernikahan->alamat_wanita;
            }
            ?>
            <div class="col-12 text-center" style="font-size:11px">
                <p class="text-justify">Telah melangsungkan upacara perkawinan/pawiwahan secara Agama
                    Hindu pada hari {{ $hari_pernikahan }} tanggal {{ $tanggal_pernikahan }} bulan
                    {{ $bulan_pernikahan }} tahun {{ $tahun_pernikahan }}
                    bertempat di
                    {{ $alamat_nikah }} Kab/Kota <u>Denpasar</u>. Yang dipuput oleh Rohaniawan
                    {{ $row_pernikahan->rohaniawan }}
                    dari {{ $row_pernikahan->banjar }} Sesetan
                </p>
            </div>
        </div>
        <div class="row justify-content-center" style="font-size:11px">
            <div class="col-12 text-center">
                <p class="text-justify">
                    Demikianlah Surat Keterangan ini di buat dengan sebenarnya untuk dapat dipergunakan dimana
                    perlu.
                </p>
            </div>
        </div>
        <div class="row justify-content-center" style="font-size:11px">
            <div class="col-12 text-center">
                <p class="text-center">
                    Mengetahui
                </p>
            </div>
        </div>
        <div class="row justify-content-center" style="font-size:11px">
            <table>
                <tr align="center">
                    <td width="300px">Rohaniwan yang muput,</td>
                    <td width="300px">Bendesa Adat, <br>
                        <p>Sesetan</p>
                    </td>
                </tr>
                <br>
                <tr align="center">
                    <td>
                        {{-- <img src="{{ asset('foto_user_login/' . Auth::user()->foto_pengguna) }}"
                            class="img-circle elevation-2" alt="User Image" width="70px"> --}}
                        <img src="../../../../public/tanda_tangan/bendesa.png" alt="" width="50px"
                            height="50px">
                    </td>
                    <td width="300px"><img src="../../../../public/tanda_tangan/bendesa.png" alt=""
                            width="50px" height="50px"></td>
                    <td width="300px">ttd</td>
                </tr>
                <br>
                <tr align="center">
                    <td width="300px">{{ $row_pernikahan->rohaniawan }}</td>
                    <td width="300px">Drs. I Made Widra, M.M</td>
                </tr>
            </table>
            <br>
            <table>
                <tr align="center">
                    <td width="300px">Mempelai Pria,</td>
                    <td width="300px">Kelian Adat <br>
                        <p style="font-size:11px">{{ $row_pernikahan->banjar }}</p>
                    </td>
                </tr>
                <br>
                <tr align="center">
                    <td width="300px">ttd</td>
                    <td width="300px">ttd</td>
                </tr>
                <br>
                <tr align="center">
                    <td width="300px">1. {{ $row_pernikahan->nama_pria }}</td>
                    <td width="300px">---------</td>
                </tr>
            </table>
            <br>
            <table>
                <tr align="center">
                    <td width="300px">Mempelai Wanita,</td>
                    <td width="300px">Saksi 1</td>
                </tr>
                <br>
                <tr align="center">
                    <td width="300px">ttd</td>
                    <td width="300px">ttd</td>
                </tr>
                <br>
                <tr align="center">
                    <td width="300px">2. {{ $row_pernikahan->nama_pria }}</td>
                    <td width="300px">{{ $row_pernikahan->saksi1 }}</td>
                </tr>
            </table>
            <br>
            <table>
                <tr align="center">
                    <td width="300x"></td>
                    <td width="300x">Saksi 2</td>
                </tr>
                <br>
                <tr align="center">
                    <td width="300x"></td>
                    <td width="300x">ttd</td>
                </tr>
                <br>
                <tr align="center">
                    <td width="300px"></td>
                    <td width="300px">{{ $row_pernikahan->saksi2 }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>

{{-- <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <div style="width:80%; text-align: center; float: right;">Mempelai Pria,</div><br><br><br><br>
                        <div style="width:80%; text-align: center; float: right;">1. &nbsp; &nbsp;
                            {{ $row_pernikahan->nama_pria }}
                        </div><br>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <div style="width:80%; text-align: center; float: right;">Kelian Adat,</div><br>
                        <div style="width:80%; text-align: center; float: right; font-size:12px"><span>Br.
                                {{ $row_pernikahan->banjar }}</span></div>
                        <br><br><br>
                        <div style="width:80%; text-align: center; float: right;">__________________</div><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <div style="width:80%; text-align: center; float: right;">Mempelai Wanita,</div><br><br><br>
                        <div style="width:80%; text-align: center; float: right;">2. &nbsp;
                            &nbsp;{{ $row_pernikahan->nama_wanita }}
                        </div><br>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <div style="width:80%; text-align: center; float: right;">Saksi 1 :</div><br><br><br>
                        <div style="width:80%; text-align: center; float: right;">{{ $row_pernikahan->saksi1 }}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <div style="width:80%; text-align: center; float: right;">Saksi 2 :</div><br><br><br>
                        <div style="width:80%; text-align: center; float: right;">{{ $row_pernikahan->saksi2 }}</div>
                    </div>
                </div>
            </div> --}}
