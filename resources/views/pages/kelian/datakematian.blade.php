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
                            <h1>Data Kematian</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Kematian</li>
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

                @if ($errors->all())
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Gagal menyimpan data</strong> Silahkan lihat dan lengkapi form yang isi.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

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
                            <form class="row g-3" action="{{ url('kematian_kelian/store') }}" method="POST"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_nama" class="form-label">Nama</label>
                                                <input type="text" id="input_nama" name="nama"
                                                    class="form-control
                                                    @error('nama')
                                                    is-invalid
                                                @enderror"
                                                    value="{{ old('nama') }}">
                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_banjar" class="form-label">Banjar</label>
                                                <select id="input_banjar" name="banjar"
                                                    class="form-select form-control
                                                    @error('banjar')
                                                    is-invalid
                                                @enderror"
                                                    value="{{ old('banjar') }}">
                                                    @error('banjar')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <option selected disabled>Pilih Banjar</option>
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
                                                <select id="input_jenis_kelamin"
                                                    name="jenis_kelamin"class="form-select form-control @error('jenis_kelamin')
                                                    is-invalid
                                                @enderror"
                                                    value="{{ old('jenis_kelamin') }}">
                                                    @error('jenis_kelamin')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                                    <option value="pria">Pria</option>
                                                    <option value="wanita">Wanita</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_tgl_lahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" name="tgl_lahir" id="date"
                                                    class="form-control form-control
                                                    @error('tgl_lahir')
                                                    is-invalid
                                                @enderror"
                                                    value="{{ old('tgl_lahir') }}">
                                                @error('tgl_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="umur" class="form-label">Umur</label>
                                                <input type="text" name="umur" id="umur"
                                                    class="form-control form-control
                                                    @error('umur')
                                                    is-invalid
                                                @enderror"
                                                    value="{{ old('umur') }}">
                                                @error('umur')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_agama" class="form-label">Agama</label>
                                                <select id="input_agama"
                                                    name="agama"class="form-select form-control
                                                    @error('agama')
                                                    is-invalid
                                                @enderror"
                                                    value="{{ old('agama') }}">
                                                    @error('agama')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <option selected disabled>Pilih Agama</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="input_alamat" class="form-label">Alamat</label>
                                        <input type="text" name="alamat" id="input_alamat"
                                            class="form-control
                                        @error('alamat')
                                        is-invalid
                                    @enderror"
                                            value="{{ old('alamat') }}">
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="input_tgl_kematian" class="form-label">Tanggal
                                                Kematian</label>
                                            <input type="date" name="tgl_kematian" id="input_tgl_kematian"
                                                class="form-control @error('tgl_kematian')
                                                is-invalid
                                            @enderror"
                                                value="{{ old('tgl_kematian') }}">
                                            @error('tgl_kematian')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="input_tgl_ngaben" class="form-label">Tanggal
                                                Ngaben</label>
                                            <input class="form-control" id="Input_tgl_ngaben" type="date"
                                                name="tgl_ngaben" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="input_sebab_kematian" class="form-label">Sebab
                                            Kematian</label>
                                        <input type="text" name="sebab_kematian" id="input_sebab_kematian"
                                            class="form-control @error('sebab_kematian')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('sebab_kematian') }}">
                                        @error('sebab_kematian')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="input_ahli_waris" class="form-label">Nama Ahli
                                            Waris</label>
                                        <input type="text" name="ahli_waris" id="input_ahli_waris"
                                            class="form-control @error('ahli_waris')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('ahli_waris') }}">
                                        @error('ahli_waris')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-12">
                                        <label for="formFile" class="form-label">Foto KTP</label>
                                        <input name="foto_ktp" type="file" id="formFile"
                                            class="form-control @error('foto_ktp')
                                        is-invalid
                                    @enderror"
                                            value="{{ old('foto_ktp') }}">
                                        @error('foto_ktp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr align="center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Banjar</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Umur</th>
                                    <th scope="col">Tanggal Kematian</th>
                                    <th scope="col">Tanggal Ngaben</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($data as $row_kematian)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $row_kematian->nama }}</td>
                                        <td>{{ $row_kematian->banjar }}</td>
                                        <td>{{ date('d-M-Y', strtotime($row_kematian->tgl_lahir)) }}</td>
                                        <td>{{ $row_kematian->umur . ' Tahun' }}</td>
                                        <td>{{ date('d-M-Y', strtotime($row_kematian->tgl_kematian)) }}</td>
                                        <td>{{ $row_kematian->tgl_ngaben == null ? '' : date('d-M-Y', strtotime($row_kematian->tgl_ngaben)) }}
                                        </td>
                                        <td>
                                            <a href="{{ url('kematian_kelian/detail/' . $row_kematian->id) }}"
                                                class="btn btn-sm btn-info" title="Lihat Data">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="{{ url('kematian_kelian/edit/' . $row_kematian->id) }}"
                                                class="btn btn-sm btn-warning" title="Edit Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url('foto_ktp_kematian/' . $row_kematian->foto_ktp) }}"
                                                download="{{ $row_kematian->foto_ktp }}"
                                                class="btn btn-sm btn-primary" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="{{ url('kematian_kelian/delete/' . $row_kematian->id) }}"
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
