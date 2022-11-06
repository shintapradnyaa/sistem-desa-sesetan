<!DOCTYPE html>
<html>

<head>
    @include('layout_sekretariat.header')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout_sekretariat.navbar')
        <!-- Sidebar -->
        @include('layout_sekretariat.sidebar')

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
                    <i class="fa fa-plus"> Data Kematian</i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kematian</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="row g-3" action="{{ url('/store_data_kematian_sekretariat') }}" method="POST"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_nama" class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="nama"
                                                    id="input_nama">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_banjar" class="form-label">Banjar</label>
                                                <select id="input_banjar" class="form-select form-control"
                                                    name="banjar">
                                                    <option selected>Pilih Banjar</option>
                                                    <option value="Banjar Kaja">Banjar Kaja</option>
                                                    <option value="Banjar Pembungan">Banjar Pembungan</option>
                                                    <option value="Banjar Tengah">Banjar Tengah</option>
                                                    <option value="Banjar Gaduh">Banjar Gaduh</option>
                                                    <option value="Banjar Puri Agung">Banjar Puri Agung</option>
                                                    <option value="Banjar Lantang Bejuh">Banjar Lantang Bejuh</option>
                                                    <option value="Banjar Dukuh Sari">Banjar Dukuh Sari</option>
                                                    <option value="Banjar Pegok">Banjar Pegok</option>
                                                    <option value="Banjar Suwung Batan Kendal">Banjar Suwung Batan
                                                        Kendal</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="input_jenis_kelamin" class="form-label">Jenis
                                                    Kelamin</label>
                                                <select id="input_jenis_kelamin" class="form-select form-control"
                                                    name="jenis_kelamin">
                                                    <option selected>Pilih Jenis Kelamin</option>
                                                    <option value="pria">Pria</option>
                                                    <option value="wanita">Wanita</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_tgl_lahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control form-control" name="tgl_lahir"
                                                    id="input_tgl_lahir">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="div">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="input_agama" class="form-label">Agama</label>
                                                <select id="input_agama" class="form-select form-control"
                                                    name="agama">
                                                    <option selected>Pilih Agama</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="input_alamat" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" name="alamat"
                                                id="input_alamat">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="input_tgl_kematian" class="form-label">Tanggal
                                                Kematian</label>
                                            <input type="date" class="form-control" name="tgl_kematian"
                                                id="input_tgl_kematian">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="input_tgl_ngaben" class="form-label">Tanggal
                                                Ngaben</label>
                                            <input type="date" class="form-control" name="tgl_ngaben"
                                                id="input_tgl_ngaben">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="input_sebab_kematian" class="form-label">Sebab
                                            Kematian</label>
                                        <input type="text" class="form-control" name="sebab_kematian"
                                            id="input_sebab_kematian">
                                    </div>
                                    <div class="col-12">
                                        <label for="input_ahli_waris" class="form-label">Nama Ahli
                                            Waris</label>
                                        <input type="text" class="form-control" name="ahli_waris"
                                            id="input_ahli_waris">
                                    </div>
                                    <div class="mb-12">
                                        <label for="formFile" class="form-label">Foto KTP</label>
                                        <input class="form-control" name="foto_ktp" type="file" id="formFile">
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
                                            <a href="{{ url('show_data_kematian_sekretariat', $row_kematian->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="{{ url('edit_data_kematian_sekretariat', $row_kematian->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url('/delete_data_kematian_sekretariat', $row_kematian->id) }}"
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

        @include('layout_sekretariat.footer')
    </div>
    <!-- ./wrapper -->

    @include('layout_sekretariat.script')
</body>

</html>
