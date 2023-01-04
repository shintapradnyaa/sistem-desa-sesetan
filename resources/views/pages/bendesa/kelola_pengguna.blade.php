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
                            <h1>Kelola Pengguna</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Kelola Pengguna</li>
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
                    <i class="fa fa-plus"> Data Pengguna</i>
                </button>

                <!-- Modal -->
                @if ($errors->all())
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Gagal menyimpan data!</strong> Silahkan lihat dan lengkapi form yang isi.
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
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="row g-3" action="{{ url('kelola_pengguna/store') }}" method="POST"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="input_level" class="form-label">Hak Akses Pengguna</label>
                                            <select id="input_level" name="level"
                                                class="form-select form-control @error('level')
                                                    is-invalid
                                                @enderror"
                                                value="{{ old('level') }}">
                                                @error('level')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <option selected disabled>Pilih Hak Akses</option>
                                                <option value="1">1. Bendesa</option>
                                                <option value="2">2. Sekretariat</option>
                                                <option value="3">3. Kelihan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_name" class="form-label">Nama Lengkap</label>
                                                <input type="text" name="name" id="input_name"
                                                    class="form-control
                                                        @error('name')
                                                        is-invalid
                                                        @enderror"
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_password" class="form-label">Password</label>
                                                <input type="password" name="password" id="input_password"
                                                    class="form-control
                                                        @error('password')
                                                        is-invalid
                                                        @enderror"
                                                    value="{{ old('password') }}">
                                                @error('password')
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
                                                <label for="input_email" class="form-label">Email</label>
                                                <input type="email" name="email" id="input_email"
                                                    class="form-control
                                                        @error('email')
                                                        is-invalid
                                                        @enderror"
                                                    value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_no_telfon" class="form-label">Nomor
                                                    Telepon</label>
                                                <input type="text" name="no_telfon" id="input_no_telfon"
                                                    class="form-control
                                                        @error('no_telfon')
                                                        is-invalid
                                                        @enderror"
                                                    value="{{ old('no_telfon') }}">
                                                @error('no_telfon')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
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
                                                    <option selected disabled>Pilih Banjar</option>
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
                                    <div class="col-mb-12">
                                        <label for="formFile" class="form-label">Foto Pengguna</label>
                                        <input name="foto_pengguna" type="file"
                                            id="formFile"class="form-control
                                            @error('foto_pengguna')
                                            is-invalid
                                            @enderror"
                                            value="{{ old('foto_pengguna') }}">
                                        @error('foto_pengguna')
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
                                    <th scope="col">Foto Pengguna</th>
                                    <th scope="col">Hak Akses Pengguna</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">No Telepon</th>
                                    <th scope="col">Banjar</th>
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
                                        <td>
                                            <img src="{{ asset('foto_user_login/' . $row->foto_pengguna) }}"
                                                alt="" style="width:100px;">
                                        </td>
                                        <td>
                                            @if ($row->level == 1)
                                                Bendesa
                                            @elseif ($row->level == 2)
                                                Sekretariat
                                            @elseif ($row->level == 3)
                                                Kelihan
                                            @else
                                                Warga
                                            @endif
                                        </td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->no_telfon }}</td>
                                        <td>{{ $row->banjar }}</td>
                                        <td>
                                            <a href="{{ url('kelola_pengguna/detail/' . $row->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="{{ url('kelola_pengguna/delete/' . $row->id) }}"
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
