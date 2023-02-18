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
                            <h1 class="m-0 text-dark">Edit Profil Pengguna</h1>
                            <a class="btn btn-warning mt-3" href="{{ url('/dashboard_bendesa') }}" role="button"><i
                                    class="fa fa-chevron-left"></i>
                                Kembali</a>
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
            <!-- Main content -->
            <section class="content">
                <form class="row g-3" action="{{ url('edit_profile_bendesa/update/' . Auth::user()->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container-fluid">
                        @if ($message = Session::get('message'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="row justify-content-center mt-3">
                            <div class="col-5">
                                <div class="text-center">
                                    @if (Auth::user()->foto_pengguna == null)
                                        <img src="{{ asset('foto_user_login/user.png') }}"
                                            class="img-circle elevation-2" alt="User Image" width="150px"
                                            height="150px">
                                    @else
                                        <img src="{{ asset('foto_user_login/' . Auth::user()->foto_pengguna) }}"
                                            class="img-circle elevation-2" alt="User Image" width="150px"
                                            height="150px">
                                    @endif
                                </div>
                                <hr>
                            </div>
                            <div class="col-7">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <strong>
                                            <i class="fas fa-id-card mr-2"></i>
                                            Nama Lengkap
                                        </strong>
                                        <input type="text" name="name"
                                            class="form-control
                                        @error('name')
                                        is-invalid
                                        @enderror
                                        "
                                            value="{{ $data->name }} ">
                                        @error('name')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <hr>
                                        <strong>
                                            <i class="fas fa-phone mr-2"></i>
                                            Nomor Telepon
                                        </strong>
                                        <input type="text" name="no_telfon"
                                            class="form-control
                                        @error('no_telfon')
                                        is-invalid
                                        @enderror
                                        "
                                            value="{{ $data->no_telfon }} ">
                                        @error('no_telfon')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <hr>
                                        <strong>
                                            <i class="fas fa-university mr-2"></i>
                                            Banjar
                                        </strong>
                                        <select id="input_banjar" name="banjar" class="form-control">
                                            @foreach ($banjar as $item)
                                                @if ($item == $data->banjar)
                                                    <option value="{{ $item }}" selected>{{ $item }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item }}">{{ $item }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <hr>
                                        <strong>
                                            <i class="fas fa-envelope mr-2"></i>
                                            Email
                                        </strong>
                                        <input type="text" name="email"
                                            class="form-control
                                        @error('email')
                                        is-invalid
                                        @enderror
                                        "
                                            value="{{ $data->email }} ">
                                        @error('email')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <hr>
                                        <strong>
                                            <i class="fas fa-image mr-2"></i>
                                            Foto Pengguna
                                        </strong>
                                        <input type="file" class="form-control" name="foto_pengguna">
                                        <button type="submit"
                                            class="btn btn-primary mt-3 float-right col-12">Update</button>
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
        @include('layout_bendesa.footer')
    </div>
    <!-- ./wrapper -->
    @include('layout_bendesa.script')


</body>

</html>
