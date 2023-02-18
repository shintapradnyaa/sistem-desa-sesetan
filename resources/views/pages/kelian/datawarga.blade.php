<!DOCTYPE html>
<html>

<head>
    @include('layout_kelian.header')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout_kelian.navbar')
        <!-- Sidebar -->
        @include('layout_kelian.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Warga</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Warga</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr align="center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($warga as $row_kematian)
                                    <tr>
                                        <th scope="row" width="60px">{{ $no++ }}</th>
                                        <td>{{ $row_kematian->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="d-flex justify-content-center">
                            {!! $data->links() !!}
                        </div> --}}
                    </div>
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('layout_kelian.footer')
    </div>
    <!-- ./wrapper -->

    @include('layout_kelian.script')

</body>

</html>
