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
                            <h1>Surat Keluar Undangan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Surat Keluar Undangan</li>
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
                                    <th scope="col">Nomor Surat Keluar</th>
                                    <th scope="col">Tanggal Surat Undangan Keluar</th>
                                    <th scope="col">Perihal Surat Undangan Keluar</th>
                                    <th scope="col">Ditujukan Kepada</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($sk_undangan as $row)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $row->no_sk_undangan }}</td>
                                        <td>{{ date('d-M-Y', strtotime($row->tgl_sk_keluar)) }}</td>
                                        <td>{{ $row->perihal_sk }}</td>
                                        <td>{{ $row->ditujukan_sk }}</td>
                                        <td>
                                            <a href="{{ url('sk_undangan_bendesa/' . $row->sk_undangan_bendesa) }}"
                                                download="{{ $row->sk_undangan_bendesa }}"
                                                class="btn btn-sm btn-primary" title="Download">
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
