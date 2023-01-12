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
                            <h1 class="m-0 text-dark">Detail Pengguna</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Detail Pengguna</li>
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
                <form class="row g-3" action="{{ url('edit_profile/update/' . $data->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img src="{{ url('foto_user_login/' . $data->foto_pengguna) }}"
                                                class="img-circle elevation-2" alt="User Image" width="150px">
                                        </div>
                                        <h3 class="profile-username text-center">
                                            {{ $data->username }}</h3>
                                        <p class="text-muted text-center">
                                            {{ date('d-M-Y', strtotime($data->created_at)) }}
                                        </p>
                                        <hr>
                                        <strong>
                                            <i class="fas fa-user-cog mr-2"></i>
                                            Hak Akses
                                        </strong>
                                        <p class="text-muted">
                                            @if ($data->level == 1)
                                                Bendesa
                                            @elseif ($data->level == 2)
                                                Sekretariat
                                            @elseif ($data->level == 3)
                                                Kelian
                                            @else
                                                Warga
                                            @endif
                                        </p>
                                        <hr>
                                        <strong>
                                            <i class="fas fa-user mr-2"></i>
                                            Nama Lengkap
                                        </strong>
                                        <p class="text-muted">
                                            {{ $data->name }}
                                        </p>
                                        <hr>
                                        <strong>
                                            <i class="fas fa-phone mr-2"></i>
                                            Nomor Telepon
                                        </strong>
                                        <p class="text-muted">
                                            {{ $data->no_telfon }}
                                        </p>
                                        <hr>
                                        <strong>
                                            <i class="fas fa-university mr-2"></i>
                                            Banjar
                                        </strong>
                                        <p class="text-muted">
                                            {{ $data->banjar }}
                                        </p>
                                        <hr>
                                        <strong>
                                            <i class="fas fa-envelope mr-2"></i>
                                            Email
                                        </strong>
                                        <p class="text-muted">
                                            {{ $data->email }}
                                        </p>
                                        <hr>
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
