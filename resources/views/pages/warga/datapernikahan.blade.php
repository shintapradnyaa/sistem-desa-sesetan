<!DOCTYPE html>
<html>

<head>
    @include('layout_warga.header')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout_warga.navbar')
        <!-- Sidebar -->
        @include('layout_warga.sidebar')

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
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pernikahan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="row g-3" action="{{ url('pernikahan_warga/store') }}" method="POST"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
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
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_nama_pria" class="form-label">Nama Pria</label>
                                                <input type="text" class="form-control"
                                                    @if (Auth::user()->jenis_kelamin == 'Pria') value="{{ Auth::user()->name }}" readonly @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_status_pria" class="form-label">Status
                                                    Pria</label>
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
                                                    <option selected disabled>Pilih Status Pria</option>
                                                    <option value="Purusa">Purusa</option>
                                                    <option value="Pradana">Pradana</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="input_tmpt_lahir_pria" class="form-label">Tempat Lahir
                                                    Pria
                                                </label>
                                                <input type="text" name="tmpt_lahir_pria" id="input_tmpt_lahir_pria"
                                                    class="form-control
                                                    @error('tmpt_lahir_pria')
                                                    is-invalid
                                                    @enderror"
                                                    value="{{ old('tmpt_lahir_pria') }}">
                                                @error('tmpt_lahir_pria')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_tgl_lahir_pria" class="form-label">Tanggal
                                                    Lahir Pria</label>
                                                <input type="date" name="tgl_lahir_pria" id="date_pria"
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
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Umur
                                                    Pria</label>
                                                <input type="text" name="umur_pria" id="umur_pria"
                                                    class="form-control
                                                    @error('umur_pria')
                                                    is-invalid
                                                    @enderror"
                                                    value="{{ old('umur_pria') }}" readonly>
                                                @error('umur_pria')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="input_pekerjaan_pria" class="form-label">Pekerjaan
                                                    Pria</label>
                                                <input type="text" name="pekerjaan_pria" id="input_pekerjaan_pria"
                                                    class="form-control
                                                    @error('pekerjaan_pria')
                                                    is-invalid
                                                    @enderror"
                                                    value="{{ old('pekerjaan_pria') }}">
                                                @error('pekerjaan_pria')
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_nama_wanita" class="form-label">Nama
                                                    Wanita</label>
                                                <input type="text" name="nama_wanita" id="input_nama_wanita"
                                                    class="form-control"
                                                    @if (Auth::user()->jenis_kelamin == 'Wanita') value="{{ Auth::user()->name }}" readonly @endif>
                                            </div>
                                        </div>
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
                                                    <option selected disabled>Pilih Status Wanita</option>
                                                    <option value="Purusa">Purusa</option>
                                                    <option value="Pradana">Pradana</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="input_tmpt_lahir_wanita" class="form-label">Tempat
                                                    Lahir
                                                    Wanita
                                                </label>
                                                <input type="text" name="tmpt_lahir_wanita"
                                                    id="input_tmpt_lahir_wanita"
                                                    class="form-control
                                                    @error('tmpt_lahir_wanita')
                                                    is-invalid
                                                    @enderror"
                                                    value="{{ old('tmpt_lahir_wanita') }}">
                                                @error('tmpt_lahir_wanita')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_tgl_lahir_wanita" class="form-label">Tanggal
                                                    Lahir Wanita</label>
                                                <input type="date" name="tgl_lahir_wanita" id="date_wanita"
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
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="input_pekerjaan_wanita" class="form-label">Umur
                                                    Wanita</label>
                                                <input type="text" name="umur_wanita" id="umur_wanita"
                                                    class="form-control
                                                    @error('umur_wanita')
                                                    is-invalid
                                                    @enderror"
                                                    value="{{ old('umur_wanita') }}" readonly>
                                                @error('umur_wanita')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="input_pekerjaan_wanita" class="form-label">Pekerjaan
                                                    Wanita</label>
                                                <input type="text" name="pekerjaan_wanita"
                                                    id="input_pekerjaan_wanita"
                                                    class="form-control
                                                    @error('pekerjaan_wanita')
                                                    is-invalid
                                                    @enderror"
                                                    value="{{ old('pekerjaan_wanita') }}">
                                                @error('pekerjaan_wanita')
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
                                            <label for="input_rohaniawan" class="form-label">Dipuput Oleh
                                                Rohaniawan
                                            </label>
                                            <input type="text" name="rohaniawan" id="input_rohaniawan"
                                                class="form-control
                                                @error('rohaniawan')
                                                is-invalid
                                                @enderror"
                                                value="{{ old('rohaniawan') }}">
                                            @error('rohaniawan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="input_saksi1" class="form-label">
                                                    Saksi 1</label>
                                                <input type="text" name="saksi1" id="input_saksi1"
                                                    class="form-control
                                                    @error('saksi1')
                                                    is-invalid
                                                    @enderror"
                                                    value="{{ old('saksi1') }}">
                                                @error('saksi1')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="input_saksi2" class="form-label">
                                                    Saksi 2</label>
                                                <input type="text" name="saksi2" id="input_saksi2"
                                                    class="form-control
                                                    @error('saksi2')
                                                    is-invalid
                                                    @enderror"
                                                    value="{{ old('saksi2') }}">
                                                @error('saksi2')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
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
                                    <th scope="col">Nama Wanita</th>
                                    <th scope="col">Status Surat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($pernikahan as $row_pernikahan)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $row_pernikahan->no_suket }}</td>
                                        <td>{{ date('d-M-Y', strtotime($row_pernikahan->tgl_pernikahan)) }}</td>
                                        <td>{{ $row_pernikahan->banjar }}</td>
                                        <td>{{ $row_pernikahan->nama_pria }}</td>
                                        <td>{{ $row_pernikahan->nama_wanita }}</td>
                                        <td><label
                                                class="badge {{ $row_pernikahan->status_surat == 'Proses' ? 'badge-primary' : 'badge-success' }}">
                                                {{ $row_pernikahan->status_surat == 'Proses' ? 'Proses' : 'Selesai' }}</label>
                                        </td>
                                        <td>
                                            <a href="{{ url('pernikahan_warga/edit/' . $row_pernikahan->id) }}"
                                                class="btn btn-sm btn-warning" title="Edit Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if ($row_pernikahan->status_surat == 'Selesai')
                                                <a href="{{ url('pernikahan_warga/download/' . $row_pernikahan->id) }}"
                                                    class="btn btn-sm btn-primary" title="Download">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                            @endif
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

        @include('layout_warga.footer')
    </div>
    <!-- ./wrapper -->

    @include('layout_warga.script')
</body>

</html>
