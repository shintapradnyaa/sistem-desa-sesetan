<!DOCTYPE html>
<html>

<head>
    @include('layout_bendesa.header')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout_bendesa.navbar')
        <!-- Sidebar -->
        @include('layout_bendesa.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Kelola Warga</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Kelola Pengguna</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr align="center">
                                    <th scope="col">No</th>
                                    <th scope="col">Foto Pengguna</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">No Telepon</th>
                                    <th scope="col">Banjar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>
                                            <div class="user-panel pb-3 mb-3 d-flex">
                                                @if ($row->foto_pengguna == null)
                                                    <img src="{{ asset('foto_user_login/user.png') }}"
                                                        class="img-circle elevation-2" alt="User Image">
                                                @else
                                                    <img src="{{ asset('foto_user_login/' . $row->foto_pengguna) }}"
                                                        class="img-circle elevation-2" alt="User Image">
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            {{ $row->status }}
                                        </td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->no_telfon }}</td>
                                        <td>{{ $row->banjar }}</td>
                                        <td>
                                            <a href="{{ url('kelola_warga/detail/' . $row->id) }}"
                                                class="btn btn-sm btn-info" title="Lihat Data">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="{{ url('kelola_warga/update/' . $row->id) }}"
                                                class="btn btn-sm btn-warning" title="Update Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url('kelola_warga/delete/' . $row->id) }}"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Tersebut?')"
                                                title="Hapus Data">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('layout_bendesa.footer')
    </div>
    <!-- ./wrapper -->

    @include('layout_bendesa.script')
</body>

</html>
