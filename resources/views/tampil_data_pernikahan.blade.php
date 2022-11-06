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
                            <h1 class="m-0 text-dark">Tambah Data Kematian</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v2</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="row mt-4 justify-content-center">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <form class="row g-3" action="#" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-6">
                                            <label for="input_no_suket" class="form-label">Nomor Surat
                                                Keterangan</label>
                                            <input type="text" class="form-control" name="no_suket"
                                                id="input_no_suket" value="{{ $data_pernikahan->no_suket }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="input_tgl_pernikahan" class="form-label">Tanggal
                                                Pernikahan</label>
                                            <input type="date" class="form-control" name="tgl_pernikahan"
                                                id="input_tgl_pernikahan"
                                                value="{{ $data_pernikahan->tgl_pernikahan }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="input_nama_pria" class="form-label">Nama Pria</label>
                                            <input type="text" class="form-control" name="nama_pria"
                                                id="input_nama_pria" value="{{ $data_pernikahan->nama_pria }}">
                                        </div>
                                        <div class="col-12">
                                            <label for="input_status_pria" class="form-label">Status Pria</label>
                                            <select id="input_status_pria" class="form-select" name="status_pria">
                                                <option selected>{{ $data_pernikahan->status_pria }}</option>
                                                <option value="Purusa">Purusa</option>
                                                <option value="Pradana">Pradana</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="input_tgl_lahir_pria" class="form-label">Tanggal
                                                Lahir Pria</label>
                                            <input type="date" class="form-control" name="tgl_lahir_pria"
                                                id="input_tgl_lahir_pria"
                                                value="{{ $data_pernikahan->tgl_lahir_pria }}">
                                        </div>
                                        <div class="col-12">
                                            <label for="input_alamat_pria" class="form-label">Alamat Pria</label>
                                            <input type="text" class="form-control" name="alamat_pria"
                                                id="input_alamat_pria" value="{{ $data_pernikahan->alamat_pria }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="input_nama_wanita" class="form-label">Nama Wanita</label>
                                            <input type="text" class="form-control" name="nama_wanita"
                                                id="input_nama_wanita" value="{{ $data_pernikahan->nama_wanita }}">
                                        </div>
                                        <div class="col-12">
                                            <label for="input_status_wanita" class="form-label">Status
                                                Wanita</label>
                                            <select id="input_status_wanita" class="form-select" name="status_wanita">
                                                <option selected>{{ $data_pernikahan->status_wanita }}</option>
                                                <option value="Purusa">Purusa</option>
                                                <option value="Pradana">Pradana</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="input_tgl_lahir_wanita" class="form-label">Tanggal
                                                Lahir Wanita</label>
                                            <input type="date" class="form-control" name="tgl_lahir_wanita"
                                                id="input_tgl_lahir_wanita"
                                                value="{{ $data_pernikahan->tgl_lahir_wanita }}">
                                        </div>
                                        <div class="col-12">
                                            <label for="input_alamat_wanita" class="form-label">Alamat
                                                Wanita</label>
                                            <input type="text" class="form-control" name="alamat_wanita"
                                                id="input_alamat_wanita"
                                                value="{{ $data_pernikahan->alamat_wanita }}">
                                        </div>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
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
