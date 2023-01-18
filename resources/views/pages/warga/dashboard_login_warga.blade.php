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
                <div class="card bg-gradient-lightblue">
                    <h3 class="card-header">Hallo, {{ $data = Auth::user()->name }}</h3>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">Perhatikan beberapa ketentuan dalam menggunakan website Sistem Pendataan
                            dan Administrasi Warga Adat Sesetan seperti dibawah ini:</p>
                    </div>
                </div>
                {{-- <h3 class="mt-3 text-center">Ketentuan</h3>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card bg-gradient-yellow">
                            <div class="card-body">
                                <i class="far fa-clock"></i>
                                <p class="card-text">Pelayanan administrasi secara daring seperti pengurusan akta
                                    perkawinan dibuka 24 jam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-gradient-green">
                            <div class="card-body">
                                <i class="far fa-file-alt"></i>
                                <p class="card-text">Permohonan administrasi akta perkawinan secara daring yang masuk,
                                    akan diverifikasi sesuai jadwal kerja yaitu hari senin sampai jumat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-gradient-olive">
                            <div class="card-body"><i class="fas fa-user-circle"></i>
                                <p class="card-text"> Pelapor yang melakukan pendaftaran administrasi secara daring
                                    adalah kepala keluarga dalam satu KK.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-gradient-olive">
                            <div class="card-body"><i class="fas fa-user-circle"></i>
                                <p class="card-text">Terdapat 2 status yang akan diberikan ketika mengurus administrasi
                                    akta perkawinan yaitu status proses dan selesai.</p>
                                <p>- Status proses memiliki arti bahwa
                                    akta perkawinan sedang diproses oleh bendesa. Dan perlu di cek secara berkala untuk
                                    mengetahui status terkini.</p>
                                <p>
                                    - Status Selesai memiliki arti bahwa akta perkawinan telah selesai diproses. Dan
                                    Akta perkawinan dapat di download.
                                </p>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
