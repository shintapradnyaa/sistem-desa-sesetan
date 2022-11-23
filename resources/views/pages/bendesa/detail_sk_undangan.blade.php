<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout_bendesa.header')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout_bendesa.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layout_bendesa.sidebar')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Detail Surat Undangan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Detail Surat Undangan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <a class="btn btn-warning" href="{{ url('sk_undangan_bendesa') }}" role="button"><i
                    class="fa fa-chevron-left"></i>
                Kembali</a>
            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="row mt-4 justify-content-center">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Nomor Surat Keluar</label></label>
                                            <p>{{ $data->no_sk_undangan }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tanggal Surat Undangan Keluar</label>
                                            <p>{{ date('d-M-Y', strtotime($data->tgl_sk_keluar)) }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Perihal Surat Undangan Keluar</label>
                                            <p>{{ $data->perihal_sk }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Foto Surat Keluar Undangan</label>
                                            <img src="{{ url('foto_sk_undangan/' . $data->foto_sk_undangan) }}"
                                                class="img-thumbnail">
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
    @include('layout_bendesa.footer')
    </div>
    <!-- ./wrapper -->
    @include('layout_bendesa.script')
</body>

</html>
