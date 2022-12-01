<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout_kelihan.header')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout_kelihan.navbar')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('layout_kelihan.sidebar')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Edit Profil Pengguna</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Profil Pengguna</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <a class="btn btn-warning" href="{{ url('dashboard_kelihan') }}" role="button"><i
                    class="fa fa-chevron-left"></i>
                Kembali</a>
            <!-- Main content -->
            <section class="content">
                <form class="row g-3" action="{{ url('edit_profile/update/' . Auth::user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img src="{{ asset('') }}template/adminlte/dist/img/user2-160x160.jpg"
                                                class="img-circle elevation-2" alt="User Image">
                                        </div>
                                        <h3 class="profile-username text-center">
                                            {{ $data->username }}</h3>
                                        <p class="text text-center">
                                            {{ date('d-M-Y', strtotime($data->created_at)) }}
                                        </p>
                                        <hr>
                                        <strong>
                                            <i class="fas fa-user mr-2"></i>
                                            Nama Lengkap
                                        </strong> <input type="text" class="form-control" name="name"
                                            id="input_name" value="{{ $data->name }}">
                                        <hr>
                                        <strong>
                                            <i class="fas fa-user mr-2"></i>
                                            Password
                                        </strong>
                                        <input type="text" class="form-control" name="password" id="input_name"
                                            value="{{ $data->password }}">
                                        <hr>
                                        <strong>
                                            <i class="fas fa-phone mr-2"></i>
                                            Nomor Telepon
                                        </strong>
                                        <input type="text" class="form-control" name="no_telfon" id="input_no_telfon"
                                            value="{{ $data->no_telfon }}">
                                        <hr>
                                        <strong>
                                            <i class="fas fa-university mr-2"></i>
                                            Banjar
                                        </strong>
                                        <select id="input_banjar" class="form-select form-control" name="banjar">
                                            <option selected disabled>{{ $data->banjar }}</option>
                                            <option value="Banjar Kaja">Banjar Kaja</option>
                                            <option value="Banjar Pembungan">Banjar Pembungan</option>
                                            <option value="Banjar Tengah">Banjar Tengah</option>
                                            <option value="Banjar Gaduh">Banjar Gaduh</option>
                                            <option value="Banjar Puri Agung">Banjar Puri Agung</option>
                                            <option value="Banjar Lantang Bejuh">Banjar Lantang Bejuh</option>
                                            <option value="Banjar Dukuh Sari">Banjar Dukuh Sari</option>
                                            <option value="Banjar Pegok">Banjar Pegok</option>
                                            <option value="Banjar Suwung Batan Kendal">Banjar Suwung Batan
                                                Kendal</option>
                                        </select>
                                        <hr>
                                        <strong>
                                            <i class="fas fa-envelope mr-2"></i>
                                            Email
                                        </strong>
                                        <input type="text" class="form-control" name="email" id="input_email"
                                            value="{{ $data->email }}">
                                        <hr>
                                        <strong>
                                            <i class="fas fa-image mr-2"></i>
                                            Foto Pengguna
                                        </strong>
                                        <input type="file" class="form-control" name="foto_pengguna">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
        @include('layout_kelihan.footer')
    </div>
    <!-- ./wrapper -->
    @include('layout_kelihan.script')


</body>

</html>
