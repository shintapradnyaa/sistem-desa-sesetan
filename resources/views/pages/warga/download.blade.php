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
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h4 style="font-size:18px">Surat Keterangan Kawin Agama Hindu</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php
            $no_surat = '';
            
            if ($row_pernikahan->status_surat == 'Selesai') {
                $no_surat = $row_pernikahan->no_suket;
            } else {
                $no_surat = '';
            }
            ?>

            <div class="col-12 text-center">
                <h6 style="font-size:14px">No. {{ $no_surat }}</h6>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <p class="text-justify" style="font-size:11px">Yang bertanda tangan dibawah ini Bendasa Adat dan
                    Kelian Adat
                    {{ Auth::user()->banjar }} Desa/Kelurahan <u>Sesetan</u> Kecamatan Denpasar Selatan Kab/Kota
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

            <?php
            $ttd_bendesa = '';
            
            if ($row_pernikahan->status_surat == 'Selesai') {
                $ttd_bendesa = 'bendesa.png';
            } else {
                $ttd_bendesa = '';
            }
            
            ?>

            <table>
                <tr align="center" style="font-weight: bold;">
                    <td width="300px">Rohaniwan yang muput,</td>
                    <td width="300px">Bendesa Adat, <br>
                        <p>Sesetan</p>
                    </td>
                </tr>
                <tr align="center">
                    <td>
                    </td>
                    <td>
                        <img src="{{ storage_path('app/public/' . $ttd_bendesa) }}" alt=""
                            style="width:100px; height:50px;">
                    </td>
                </tr>
                <tr align="center">
                    <td width="300px">{{ $row_pernikahan->rohaniawan }}</td>
                    <td width="300px" class="ttd">Drs. I Made Widra, M.M</td>
                </tr>
            </table>
            <br>
            <table>
                <tr align="center" style="font-weight: bold;">
                    <td width="300px">Mempelai Pria,</td>
                    <td width="300px">Kelian Adat <br>
                        <p style="font-size:11px">{{ Auth::user()->banjar }}</p>
                    </td>
                </tr>
                <tr align="center">
                    <td width="300px"></td>
                    <td>
                        <img src="{{ $ttd_kelian }}" alt="" style="width:100px; height:50px;">
                    </td>
                </tr>
                <tr align="center">
                    <td width="300px">1. {{ $row_pernikahan->nama_pria }}</td>
                    <td width="300px">{{ $kelianBanjar }}</td>
                </tr>
            </table>
            <br>
            <table>
                <tr align="center" style="font-weight: bold;">
                    <td width="300px">Mempelai Wanita,</td>
                    <td width="300px">Saksi 1</td>
                </tr>
                <br>
                <br>
                <tr align="center">
                    <td width="300px"></td>
                    <td width="300px"></td>
                </tr>
                <br>
                <tr align="center">
                    <td width="300px">2. {{ $row_pernikahan->nama_wanita }}</td>
                    <td width="300px">{{ $row_pernikahan->saksi1 }}</td>
                </tr>
            </table>
            <br>
            <table>
                <tr align="center" style="font-weight: bold;">
                    <td width="300x"></td>
                    <td width="300x">Saksi 2</td>
                </tr>
                <br>
                <br>
                <tr align="center">
                    <td width="300x"></td>
                    <td width="300x"></td>
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
