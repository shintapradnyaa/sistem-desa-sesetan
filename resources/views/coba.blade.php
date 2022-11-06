<!DOCTYPE html>
<html>

<head>
    @include('layout_kelihan.header')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('layout_kelihan.navbar')

        @include('layout_kelihan.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Blank Page</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
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
                            <form class="row g-3" action="#" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" name="nama_pria" id="input_nama_pria">
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
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto">
                        <a href="export_pdf_kematian" class="btn btn-info">Export PDF </a>
                    </div>
                </div>
                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr align="center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Banjar</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Tanggal Kematian</th>
                                    <th scope="col">Tanggal Ngaben</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($data as $index => $row_kematian)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $row_kematian->nama }}</td>
                                        <td>{{ $row_kematian->banjar }}</td>
                                        <td>{{ $row_kematian->jenis_kelamin }}</td>
                                        <td>{{ $row_kematian->tgl_lahir }}</td>
                                        <td>{{ $row_kematian->tgl_kematian }}</td>
                                        <td>{{ $row_kematian->tgl_ngaben }}</td>
                                        <td>
                                            <a href="/tampil_kematian/{{ $row_kematian->id }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="/tampil_kematian/{{ $row_kematian->id }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-danger hapus"
                                                data-id="{{ $row_kematian->id }}"
                                                data-nama="{{ $row_kematian->nama }}">
                                                <i class="fas fa-trash-alt"></i></a>
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

        @include('layout_kelihan.footer')
    </div>
    <!-- ./wrapper -->

    @include('layout_kelihan.script')
</body>

</html>
