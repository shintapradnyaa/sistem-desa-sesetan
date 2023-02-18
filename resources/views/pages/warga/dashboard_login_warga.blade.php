<!DOCTYPE html>
<html>

<head>
    @include('layout_warga.header')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout_warga.navbar')
        <!-- /.navbar -->

        <!-- Sidebar -->
        @include('layout_warga.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-user mr-2"></i>
                                    Hallo, {{ $data = Auth::user()->name }}
                                </h3>
                            </div>
                            <div class="card-body">
                                <blockquote>
                                    <p>Perhatikan beberapa ketentuan dalam menggunakan website Sistem
                                        Pendataan
                                        dan Administrasi Warga Adat Sesetan seperti dibawah ini:</p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="info-box mb-3 bg-warning">
                            <span class="info-box-icon"><i class="far fa-clock"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Pelayanan administrasi secara daring seperti pengurusan akta
                                    perkawinan dibuka 24 jam.</span>
                            </div>
                        </div>
                        <div class="info-box mb-3 bg-success">
                            <span class="info-box-icon"><i class="fas fa-list"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Permohonan administrasi akta perkawinan secara daring
                                    yang masuk, akan diverifikasi sesuai jadwal kerja yaitu hari Senin - Jumat.</span>
                            </div>
                        </div>
                        <div class="info-box mb-3 bg-danger">
                            <span class="info-box-icon"><i class="fas fa-user"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Pelapor yang melakukan pendaftaran administrasi secara
                                    daring adalah kepala keluarga dalam satu KK.</span>
                            </div>
                        </div>
                        <div class="info-box mb-3 bg-info">
                            <span class="info-box-icon"><i class="fas fa-file-download"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Terdapat 2 status yang akan diberikan ketika mengurus
                                    administrasi akta perkawinan yaitu status "Proses" dan "Selesai".</span>
                                <ul class="text mt-2">
                                    <li>Status <b>Proses</b> memiliki arti bahwa
                                        akta perkawinan sedang diproses oleh bendesa. Dan perlu di cek secara berkala
                                        untuk
                                        mengetahui status terkini.</li>
                                    <li>
                                        Status <b>Selesai</b> memiliki arti bahwa akta perkawinan telah
                                        selesai diproses. Dan Akta perkawinan dapat di download.
                                    </li>
                                </ul>
                            </div>
                        </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('layout_warga.footer')
    </div>
    <!-- ./wrapper -->

    @include('layout_warga.script')
</body>

</html>
