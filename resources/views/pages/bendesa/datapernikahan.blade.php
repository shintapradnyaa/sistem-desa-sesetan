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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"> Data Pernikahan</i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pernikahan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="row g-3" action="{{ url('/store_data_pernikahan_bendesa') }}" method="POST"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="input_no_suket" class="form-label">Nomor Surat
                                            Keterangan</label>
                                        <input type="text" class="form-control" name="no_suket" id="input_no_suket">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input_tgl_pernikahan" class="form-label">Tanggal
                                            Pernikahan</label>
                                        <input type="date" class="form-control" name="tgl_pernikahan"
                                            id="input_tgl_pernikahan">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input_nama_pria" class="form-label">Nama Pria</label>
                                        <input type="text" class="form-control" name="nama_pria"
                                            id="input_nama_pria">
                                    </div>
                                    <div class="col-12">
                                        <label for="input_status_pria" class="form-label">Status Pria</label>
                                        <select id="input_status_pria" class="form-select" name="status_pria">
                                            <option selected>Pilih Status Pria</option>
                                            <option value="Purusa">Purusa</option>
                                            <option value="Pradana">Pradana</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input_tgl_lahir_pria" class="form-label">Tanggal
                                            Lahir Pria</label>
                                        <input type="date" class="form-control" name="tgl_lahir_pria"
                                            id="input_tgl_lahir_pria">
                                    </div>
                                    <div class="col-12">
                                        <label for="input_alamat_pria" class="form-label">Alamat Pria</label>
                                        <input type="text" class="form-control" name="alamat_pria"
                                            id="input_alamat_pria">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input_nama_wanita" class="form-label">Nama Wanita</label>
                                        <input type="text" class="form-control" name="nama_wanita"
                                            id="input_nama_wanita">
                                    </div>
                                    <div class="col-12">
                                        <label for="input_status_wanita" class="form-label">Status
                                            Wanita</label>
                                        <select id="input_status_wanita" class="form-select" name="status_wanita">
                                            <option selected>Pilih Status Wanita</option>
                                            <option value="Purusa">Purusa</option>
                                            <option value="Pradana">Pradana</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input_tgl_lahir_wanita" class="form-label">Tanggal
                                            Lahir Wanita</label>
                                        <input type="date" class="form-control" name="tgl_lahir_wanita"
                                            id="input_tgl_lahir_wanita">
                                    </div>
                                    <div class="col-12">
                                        <label for="input_alamat_wanita" class="form-label">Alamat
                                            Wanita</label>
                                        <input type="text" class="form-control" name="alamat_wanita"
                                            id="input_alamat_wanita">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                                            <a href="{{ url('show_data_pernikahan_bendesa', $row_pernikahan->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="{{ url('edit_data_pernikahan_bendesa', $row_pernikahan->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url('/delete_data_pernikahan_bendesa', $row_pernikahan->id) }}"
                                                class="btn btn-sm btn-danger">
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
