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
                            <h1 class="m-0 text-dark">Detail Data Kematian</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Detail Data Kematian</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="div ml-3">
                <a class="btn btn-warning" href="{{ url('kematian_bendesa') }}" role="button"><i
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
                                                <label>Nama</label>
                                                <p>{{ $kematian->nama }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Banjar</label>
                                                <p>{{ $kematian->banjar }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <p>{{ $kematian->jenis_kelamin }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <p>{{ date('d-M-Y', strtotime($kematian->tgl_lahir)) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Umur</label>
                                                <p>{{ $kematian->umur . ' Tahun' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Agama</label>
                                                <p>{{ $kematian->agama }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <p>{{ $kematian->alamat }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Tanggal Kematian</label>
                                                <p>{{ date('d-M-Y', strtotime($kematian->tgl_kematian)) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Tanggal Ngaben</label>
                                                <p>
                                                    @if ($kematian->tgl_ngaben)
                                                        {{ date('d-M-Y', strtotime($kematian->tgl_ngaben)) }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Sebab Kematian</label>
                                                <p>{{ $kematian->sebab_kematian }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Ahli Waris</label>
                                                <p>{{ $kematian->ahli_waris }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Foto KTP</label>
                                            <img src="{{ url('foto_ktp_kematian/' . $kematian->foto_ktp) }}"
                                                class="img-thumbnail">
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
