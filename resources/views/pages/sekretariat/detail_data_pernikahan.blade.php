<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout_sekretariat.header')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout_sekretariat.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layout_sekretariat.sidebar')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Detail Data Pernikahan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Detail Data Pernikahan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="div ml-3">
                <a class="btn btn-warning" href="{{ url('pernikahan_sekretariat') }}" role="button"><i
                        class="fa fa-chevron-left"></i>
                    Kembali</a>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="row mt-4 justify-content-center">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Nomor Surat Keterangan</label>
                                                <p>{{ $pernikahan->no_suket }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Status Surat</label>
                                                <p>{{ $pernikahan->status_surat }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Tanggal Pernikahan</label>
                                                <p>{{ date('d-M-Y', strtotime($pernikahan->tgl_pernikahan)) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Banjar</label>
                                                <p>{{ $pernikahan->banjar }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Nama Pria</label>
                                                <p>{{ $pernikahan->nama_pria }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Status Pria</label>
                                                <p>{{ $pernikahan->status_pria }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Tempat Lahir Pria</label>
                                                <p>{{ $pernikahan->tmpt_lahir_pria }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Tanggal Lahir Pria</label>
                                                <p>{{ date('d-M-Y', strtotime($pernikahan->tgl_lahir_pria)) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Pekerjaan Pria</label>
                                                <p>{{ $pernikahan->pekerjaan_pria }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Alamat Pria</label>
                                                <p>{{ $pernikahan->alamat_pria }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Nama Wanita</label>
                                                <p>{{ $pernikahan->nama_wanita }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Status Wanita</label>
                                                <p>{{ $pernikahan->status_wanita }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Tempat Lahir Wanita</label>
                                                <p>{{ $pernikahan->tmpt_lahir_wanita }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Tanggal Lahir Wanita</label>
                                                <p>{{ date('d-M-Y', strtotime($pernikahan->tgl_lahir_wanita)) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Pekerjaan Wanita</label>
                                                <p>{{ $pernikahan->pekerjaan_wanita }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Alamat Wanita</label>
                                                <p>{{ $pernikahan->alamat_wanita }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Dipuput Oleh Rohaniawan</label>
                                                <p>{{ $pernikahan->rohaniawan }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Saksi 1</label>
                                                <p>{{ $pernikahan->saksi1 }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Saksi 2</label>
                                                <p>{{ $pernikahan->saksi2 }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->


    <!-- Main Footer -->
    @include('layout_sekretariat.footer')
    </div>
    <!-- ./wrapper -->
    @include('layout_sekretariat.script')
</body>

</html>
