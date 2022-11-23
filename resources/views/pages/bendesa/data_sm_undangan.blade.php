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
                            <h1>Surat Masuk Undangan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Surat Masuk Undangan</li>
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
                                    <th scope="col">Nomor Surat Masuk</th>
                                    <th scope="col">Tanggal Surat Undangan Masuk</th>
                                    <th scope="col">Perihal Surat Undangan Masuk </th>
                                    <th scope="col">Asal Surat Masuk</th>
                                    <th scope="col">Ditujukan Kepada</th>
                                    <th scope="col">Foto Surat Masuk Undangan</th>
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
                                        <td>{{ $row->no_sm_undangan }}</td>
                                        <td>{{ date('d-M-Y', strtotime($row->tgl_sm_masuk)) }}</td>
                                        <td>{{ $row->perihal_sm }}</td>
                                        <td>{{ $row->asal_sm }}</td>
                                        <td>{{ $row->ditujukan_sm }}</td>
                                        <td>
                                            <img src="{{ asset('foto_sm_undangan/' . $row->foto_sm_undangan) }}"
                                                alt="" style="width:100px;">
                                        </td>
                                        <td>
                                            <a href="{{ url('sm_undangan_bendesa/detail/' . $row->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="{{ url('foto_sm_undangan/' . $row->foto_sm_undangan) }}"
                                                download="{{ $row->foto_sm_undangan }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-download"></i>
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
