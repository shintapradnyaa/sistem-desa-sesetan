<!DOCTYPE html>
<html>

<head>
    @include('layout_kelihan.header')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout_kelihan.navbar')
        <!-- Sidebar -->
        @include('layout_kelihan.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Pernikahan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Pernikahan</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto">
                        <a href="#" class="btn btn-info">Export PDF </a>
                    </div>
                </div>
                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr align="center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nomor Surat Keterangan</th>
                                    <th scope="col">Tanggal Pernikahan</th>
                                    <th scope="col">Nama Pria</th>
                                    <th scope="col">Status Pria</th>
                                    <th scope="col">Nama Wanita</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($data as $row_pernikahan)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $row_pernikahan->no_suket }}</td>
                                        <td>{{ $row_pernikahan->tgl_pernikahan }}</td>
                                        <td>{{ $row_pernikahan->nama_pria }}</td>
                                        <td>{{ $row_pernikahan->status_pria }}</td>
                                        <td>{{ $row_pernikahan->nama_wanita }}</td>
                                        <td>
                                            <a href="{{ url('show_data_pernikahan_kelihan', $row_pernikahan->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-info-circle"></i>
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
