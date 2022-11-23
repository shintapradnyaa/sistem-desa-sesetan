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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pernikahan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="row g-3" action="{{ url('pernikahan_sekretariat/store') }}" method="POST"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="input_no_suket" class="form-label">Nomor Surat
                                                Keterangan</label>
                                            <input type="text" name="no_suket" id="input_no_suket"
                                                class="form-control
                                            @error('no_suket')
                                            is-invalid
                                            @enderror"
                                                value="{{ old('no_suket') }}">
                                            @error('no_suket')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_tgl_pernikahan" class="form-label">Tanggal
                                                    Pernikahan</label>
                                                <input type="date" name="tgl_pernikahan" id="input_tgl_pernikahan"
                                                    class="form-control    
                                                @error('tgl_pernikahan')
                                                    is-invalid
                                                @enderror"
                                                    value="{{ old('tgl_pernikahan') }}">
                                                @error('tgl_pernikahan')
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
                                                    class="form-select form-control @error('banjar')
                                                    is-invalid
                                                @enderror"
                                                    value="{{ old('banjar') }}">
                                                    @error('banjar')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <option selected>Pilih Banjar</option>
                                                    <option value="Banjar Kaja">Banjar Kaja</option>
                                                    <option value="Banjar Pembungan">Banjar Pembungan</option>
                                                    <option value="Banjar Tengah">Banjar Tengah</option>
                                                    <option value="Banjar Gaduh">Banjar Gaduh</option>
                                                    <option value="Banjar Puri Agung">Banjar Puri Agung</option>
                                                    <option value="Banjar Lantang Bejuh">Banjar Lantang Bejuh
                                                    </option>
                                                    <option value="Banjar Dukuh Sari">Banjar Dukuh Sari</option>
                                                    <option value="Banjar Pegok">Banjar Pegok</option>
                                                    <option value="Banjar Suwung Batan Kendal">Banjar Suwung Batan
                                                        Kendal</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="input_nama_pria" class="form-label">Nama Pria</label>
                                            <input type="text" name="nama_pria" id="input_nama_pria"
                                                class="form-control    
                                            @error('nama_pria')
                                            is-invalid
                                            @enderror"
                                                value="{{ old('nama_pria') }}">
                                            @error('nama_pria')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_status_pria" class="form-label">Status Pria</label>
                                                <select id="input_status_pria" name="status_pria"
                                                    class="form-select form-control 
                                                    @error('status_pria')
                                                    is-invalid
                                                    @enderror"
                                                    value="{{ old('status_pria') }}">
                                                    @error('status_pria')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <option selected>Pilih Status Pria</option>
                                                    <option value="Purusa">Purusa</option>
                                                    <option value="Pradana">Pradana</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_tgl_lahir_pria" class="form-label">Tanggal
                                                    Lahir Pria</label>
                                                <input type="date" name="tgl_lahir_pria" id="input_tgl_lahir_pria"
                                                    class="form-control    
                                                    @error('tgl_lahir_pria')
                                                    is-invalid
                                                    @enderror"
                                                    value="{{ old('tgl_lahir_pria') }}">
                                                @error('tgl_lahir_pria')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="input_alamat_pria" class="form-label">Alamat Pria</label>
                                            <input type="text" name="alamat_pria" id="input_alamat_pria"
                                                class="form-control
                                                @error('alamat_pria')
                                                is-invalid
                                                @enderror"
                                                value="{{ old('alamat_pria') }}">
                                            @error('alamat_pria')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="input_nama_wanita" class="form-label">Nama Wanita</label>
                                            <input type="text" name="nama_wanita" id="input_nama_wanita"
                                                class="form-control
                                                @error('nama_wanita')
                                                is-invalid
                                                @enderror"
                                                value="{{ old('nama_wanita') }}">
                                            @error('nama_wanita')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_status_wanita" class="form-label">Status
                                                    Wanita</label>
                                                <select id="input_status_wanita" name="status_wanita"
                                                    class="form-select form-control    
                                                    @error('status_wanita')
                                                    is-invalid
                                                    @enderror"
                                                    value="{{ old('status_wanita') }}">
                                                    @error('status_wanita')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <option selected>Pilih Status Wanita</option>
                                                    <option value="Purusa">Purusa</option>
                                                    <option value="Pradana">Pradana</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_tgl_lahir_wanita" class="form-label">Tanggal
                                                    Lahir Wanita</label>
                                                <input type="date" name="tgl_lahir_wanita"
                                                    id="input_tgl_lahir_wanita"
                                                    class="form-control    
                                                    @error('tgl_lahir_wanita')
                                                    is-invalid
                                                    @enderror"
                                                    value="{{ old('tgl_lahir_wanita') }}">
                                                @error('tgl_lahir_wanita')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="input_alamat_wanita" class="form-label">Alamat
                                                Wanita</label>
                                            <input type="text" name="alamat_wanita" id="input_alamat_wanita"
                                                class="form-control    
                                                @error('alamat_wanita')
                                                is-invalid
                                                @enderror"
                                                value="{{ old('alamat_wanita') }}">
                                            @error('alamat_wanita')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="input_status_surat" class="form-label">Status
                                                Surat</label>
                                            <select id="input_status_surat" name="status_surat"
                                                class="form-select form-control    
                                                @error('status_surat')
                                                is-invalid
                                                @enderror"
                                                value="{{ old('status_surat') }}">
                                                @error('status_surat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <option selected>Pilih Status Surat</option>
                                                <option value="Proses">Proses</option>
                                                <option value="Selesai">Selesai</option>
                                            </select>
                                        </div>
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
                                    <th scope="col">Nomor Surat Keterangan</th>
                                    <th scope="col">Tanggal Pernikahan</th>
                                    <th scope="col">Banjar</th>
                                    <th scope="col">Nama Pria</th>
                                    <th scope="col">Status Pria</th>
                                    <th scope="col">Nama Wanita</th>
                                    <th scope="col">Status Surat</th>
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
                                        <td>{{ date('d-M-Y', strtotime($row_pernikahan->tgl_pernikahan)) }}</td>
                                        <td>{{ $row_pernikahan->banjar }}</td>
                                        <td>{{ $row_pernikahan->nama_pria }}</td>
                                        <td>{{ $row_pernikahan->status_pria }}</td>
                                        <td>{{ $row_pernikahan->nama_wanita }}</td>
                                        <td><label
                                                class="badge {{ $row_pernikahan->status_surat == 'Proses' ? 'badge-primary' : 'badge-success' }}">
                                                {{ $row_pernikahan->status_surat == 'Proses' ? 'Proses' : 'Selesai' }}</label>
                                        </td>
                                        <td>
                                            <a href="{{ url('pernikahan_sekretariat/detail/' . $row_pernikahan->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="{{ url('pernikahan_sekretariat/edit/' . $row_pernikahan->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url('pernikahan_sekretariat/delete/' . $row_pernikahan->id) }}"
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
