<!DOCTYPE html>
<html>

<head>
    @include('layout_warga.header')
</head>

<body>
    <div class="row justify-content-center">

        <div class="col-9">
            <div class="row justify-content-center">
                <div class="col-12 text-center mt-3">
                    <h4>Surat Keterangan Kawin Agama Hindu</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 text-center mt-3">
                    <h6>No. {{ $row_pernikahan->no_suket }}</h6>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col text-center">
                    <p class="text-justify mt-3 ml-3 mr-3">Yang bertanda tangan dibawah ini Bendasa Adat dan
                        Kelian Adat
                        {{ $row_pernikahan->banjar }} Desa/Kelurahan <u>Sesetan</u> Kecamatan Denpasar Selatan Kab/Kota
                        <u>Denpasar</u> menerangkan dengan sebenarnya bahwa :
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <p class="text-justify mt-3 ml-3 mr-3">
                        1. &nbsp; &nbsp; Nama Pria &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:
                        {{ $row_pernikahan->nama_pria }}
                        <br>
                        &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; Tempat/Tgl Lahir &nbsp;:
                        {{ $row_pernikahan->tmpt_lahir_pria }},
                        {{ date('d-m-Y', strtotime($row_pernikahan->tgl_lahir_pria)) }} <br>
                        &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; Pekerjaan
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        {{ $row_pernikahan->pekerjaan_pria }} <br>
                        &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; Alamat
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        {{ $row_pernikahan->alamat_pria }} <br>
                        &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; Status &nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        {{ $row_pernikahan->status_pria }} <br>
                    </p>
                    <p class="text-justify mt-3 ml-3 mr-3">
                        2. &nbsp; &nbsp; Nama Wanita &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:
                        {{ $row_pernikahan->nama_wanita }}
                        <br>
                        &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; Tempat/Tgl Lahir
                        &nbsp;: {{ $row_pernikahan->tmpt_lahir_wanita }},
                        {{ date('d-m-Y', strtotime($row_pernikahan->tgl_lahir_wanita)) }} <br>
                        &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; Pekerjaan
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        {{ $row_pernikahan->pekerjaan_wanita }} <br>
                        &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; Alamat
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        {{ $row_pernikahan->alamat_wanita }} <br>
                        &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; Status &nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        {{ $row_pernikahan->status_wanita }} <br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                $alamat_nikah = '';

                if ($row_pernikahan->alamat_pria != 'purusa') {
                    $alamat_nikah = $row_pernikahan->alamat_pria;
                } else {
                    $alamat_nikah = $row_pernikahan->alamat_wanita;
                }
                ?>
                <div class="col text-center">
                    <p class="text-justify mt-3 ml-3 mr-3">telah melangsungkan upacara perkawinan/pawiwahan secara Agama
                        Hindu pada hari {{ $hari_pernikahan }} tanggal {{ $tanggal_pernikahan }} bulan
                        {{ $bulan_pernikahan }} tahun {{ $tahun_pernikahan }}
                        bertempat di
                        {{ $alamat_nikah }} Kab/Kota <u>Denpasar</u>. Yang dipuput oleh Rohaniawan
                        {{ $row_pernikahan->rohaniawan }}
                        dari {{ $row_pernikahan->banjar }} Sesetan
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col text-center">
                    <p class="text-justify ml-3 mr-3">
                        Demikianlah Surat Keterangan ini di buat dengan sebenarnya untuk dapat dipergunakan dimana
                        perlu.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col text-center">
                    <p class="text-center ml-3 mr-3">
                        Mengetahui
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <div style="width:70%; text-align: center; float: right;">Rohaniawan yang muput,</div>
                        <br><br><br><br>
                        <div style="width:70%; text-align: center; float: right;">{{ $row_pernikahan->rohaniawan }}
                        </div><br>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <div style="width:50%; text-align: center; float: right;">Bendesa Adat,</div><br>
                        <div style="width:50%; text-align: center; float: right;">Sesetan</div><br><br><br>
                        <div style="width:50%; text-align: center; float: right;">Drs. I Made Widra, M.M. </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <div style="width:70%; text-align: center; float: right;">Mempelai Pria,</div><br><br><br><br>
                        <div style="width:70%; text-align: center; float: right;">1. &nbsp; &nbsp;
                            {{ $row_pernikahan->nama_pria }}
                        </div><br>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <div style="width:50%; text-align: center; float: right;">Kelian Adat,</div><br>
                        <div style="width:50%; text-align: center; float: right; font-size:12px"><span>Br.
                                {{ $row_pernikahan->banjar }}</span></div>
                        <br><br><br>
                        <div style="width:50%; text-align: center; float: right;">__________________</div><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <div style="width:70%; text-align: center; float: right;">Mempelai Wanita,</div><br><br><br>
                        <div style="width:70%; text-align: center; float: right;">2. &nbsp;
                            &nbsp;{{ $row_pernikahan->nama_wanita }}
                        </div><br>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <div style="width:50%; text-align: center; float: right;">Saksi 1 :</div><br><br><br>
                        <div style="width:50%; text-align: center; float: right;">{{ $row_pernikahan->saksi1 }}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <div style="width:55%; text-align: center; float: right;">Saksi 2 :</div><br><br><br>
                        <div style="width:55%; text-align: center; float: right;">{{ $row_pernikahan->saksi2 }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
