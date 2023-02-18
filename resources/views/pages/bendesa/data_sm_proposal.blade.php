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
                            <h1>Surat Masuk Proposal</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Surat Masuk Proposal</li>
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
                                    <th scope="col">Tanggal Surat proposal Keluar</th>
                                    <th scope="col">Perihal Surat proposal Keluar</th>
                                    <th scope="col">Asal Surat Masuk</th>
                                    <th scope="col">Ditujukan Kepada</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($sm_proposal as $row)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $row->no_sm_proposal }}</td>
                                        <td>{{ date('d-M-Y', strtotime($row->tgl_sm_masuk)) }}</td>
                                        <td>{{ $row->perihal_sm }}</td>
                                        <td>{{ $row->asal_sm }}</td>
                                        <td>{{ $row->ditujukan_sm }}</td>
                                        <td>
                                            <a href="{{ url('foto_sm_proposal/' . $row->foto_sm_proposal) }}"
                                                download="{{ $row->foto_sm_proposal }}" class="btn btn-sm btn-primary"
                                                title="Download">
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
