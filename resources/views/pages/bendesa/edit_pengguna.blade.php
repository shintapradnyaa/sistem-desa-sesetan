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
                            <h1 class="m-0 text-dark">Edit Data Pengguna</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Data Pengguna</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="div ml-3">
                <a class="btn btn-warning" href="{{ url('kelola_pengguna') }}" role="button"><i
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
                                    <form class="row g-3" action="{{ url('kelola_pengguna/update/' . $data->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_level" class="form-label">Hak Akses
                                                    Pengguna</label>
                                                <select id="input_level" name="level"
                                                    class="form-select form-control">
                                                    <option selected>{{ $data->level }}</option>
                                                    <option value="1">1. Bendesa</option>
                                                    <option value="2">2. Sekretariat</option>
                                                    <option value="3">3. Kelihan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_username" class="form-label">Username</label>
                                                <input type="text" name="username" id="input_username"
                                                    class="form-control" value="{{ $data->username }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_name" class="form-label">Nama
                                                    Lengkap</label>
                                                <input type="text" name="name" id="input_name"
                                                    class="form-control" value="{{ $data->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_no_telfon" class="form-label">Nomor
                                                    Telepon</label>
                                                <input type="text" name="no_telfon" id="input_no_telfon"
                                                    class="form-control" value="{{ $data->no_telfon }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_banjar" class="form-label">Banjar</label>
                                                <select id="input_banjar" name="banjar"
                                                    class="form-select form-control">
                                                    <option selected>{{ $data->banjar }}
                                                    </option>
                                                    <option value="Banjar Kaja">Banjar Kaja
                                                    </option>
                                                    <option value="Banjar Pembungan">Banjar
                                                        Pembungan
                                                    </option>
                                                    <option value="Banjar Tengah">Banjar Tengah
                                                    </option>
                                                    <option value="Banjar Gaduh">Banjar Gaduh
                                                    </option>
                                                    <option value="Banjar Puri Agung">Banjar
                                                        Puri Agung
                                                    </option>
                                                    <option value="Banjar Lantang Bejuh">Banjar
                                                        Lantang
                                                        Bejuh
                                                    </option>
                                                    <option value="Banjar Dukuh Sari">Banjar
                                                        Dukuh Sari
                                                    </option>
                                                    <option value="Banjar Pegok">Banjar Pegok
                                                    </option>
                                                    <option value="Banjar Suwung Batan Kendal">
                                                        Banjar
                                                        Suwung Batan
                                                        Kendal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_email" class="form-label">Email</label>
                                                <input type="email" name="email" id="input_email"
                                                    class="form-control" value="{{ $data->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="formFile" class="form-label">Foto
                                                Pengguna</label>
                                            <input name="foto_pengguna" type="file"
                                                id="formFile"class="form-control">
                                        </div>
                                        <div class="col-12 mt-3">
                                            <button type="submit" class="btn btn-primary btn-block">Update</button>
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

</body>

</html>
