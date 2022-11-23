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
                            <h1 class="m-0 text-dark">Edit Data Kematian</h1>
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
            <a class="btn btn-warning" href="{{ url('kematian_bendesa') }}" role="button"><i
                    class="fa fa-chevron-left"></i>
                Kembali</a>

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="row mt-4 justify-content-center">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <form class="row g-3" action="{{ url('kematian_bendesa/update/' . $data->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-12 mb-3">
                                            <label for="input_nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" name="nama" id="input_nama"
                                                value="{{ $data->nama }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="input_banjar" class="form-label">Banjar</label>
                                            <select id="input_banjar" class="form-select form-control" name="banjar">
                                                <option selected>{{ $data->banjar }}</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="input_jenis_kelamin" class="form-label">Jenis
                                                Kelamin</label>
                                            <select id="input_jenis_kelamin" class="form-select form-control"
                                                name="jenis_kelamin">
                                                <option selected>{{ $data->jenis_kelamin }}</option>
                                                <option value="Pria">Pria</option>
                                                <option value="Wanita">Wanita</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 ">
                                            <label for="input_tgl_lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tgl_lahir"
                                                id="input_tgl_lahir" value="{{ $data->tgl_lahir }}">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="input" class="form-label">Agama</label>
                                            <select id="input_agama" class="form-select form-control" name="agama">
                                                <option selected>{{ $data->agama }}</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="input_alamat" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" id="input_alamat"
                                                value="{{ $data->alamat }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="input_tgl_kematian" class="form-label">Tanggal Kematian</label>
                                            <input type="date" class="form-control" name="tgl_kematian"
                                                id="input_tgl_kematian" value="{{ $data->tgl_kematian }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="input_tgl_ngaben" class="form-label">Tanggal Ngaben</label>
                                            <input type="date" class="form-control" name="tgl_ngaben"
                                                id="input_tgl_ngaben" value="{{ $data->tgl_ngaben }}">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="input_sebab_kematian" class="form-label">Sebab
                                                Kematian</label>
                                            <input type="text" class="form-control" name="sebab_kematian"
                                                id="input_sebab_kematian" value="{{ $data->sebab_kematian }}">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="input_ahli_waris" class="form-label">Nama Ahli Waris</label>
                                            <input type="text" class="form-control" name="ahli_waris"
                                                id="input_ahli_waris" value="{{ $data->ahli_waris }}">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="formFile" class="form-label">Foto KTP</label>
                                            <input class="form-control" name="foto_ktp" type="file"
                                                id="formFile">
                                        </div>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
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
