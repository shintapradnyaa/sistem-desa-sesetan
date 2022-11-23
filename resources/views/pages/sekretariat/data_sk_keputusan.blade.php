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
                            <h1>Surat Keluar Keputusan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Surat Keluar Keputusan</li>
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
                    <i class="fa fa-plus"> Data Surat Keluar Keputusan</i>
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Surat Keluar Keputusan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="row g-3" action="{{ url('sk_keputusan_sekretariat/store') }}" method="POST"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="input_no_sk_keputusan" class="form-label">Nomor Surat
                                                Keluar</label>
                                            <input type="text" name="no_sk_keputusan" id="input_no_sk_keputusan"
                                                class="form-control
                                                        @error('no_sk_keputusan')
                                                        is-invalid
                                                        @enderror"
                                                value="{{ old('no_sk_keputusan') }}">
                                            @error('no_sk_keputusan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="input_tgl_sk_keluar" class="form-label">Tanggal Surat
                                                Keputusan Keluar</label>
                                            <input type="date" name="tgl_sk_keluar"
                                                id="input_tgl_sk_keluar"class="form-control
                                                        @error('tgl_sk_keluar')
                                                        is-invalid
                                                    @enderror"
                                                value="{{ old('tgl_sk_keluar') }}">
                                            @error('tgl_sk_keluar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="input_perihal_sk" class="form-label">Perihal Surat Keluar
                                                Keputusan</label>
                                            <input type="text" name="perihal_sk" id="input_perihal_sk"
                                                class="form-control  
                                                        @error('perihal_sk')
                                                        is-invalid
                                                        @enderror"
                                                value="{{ old('perihal_sk') }}">
                                            @error('perihal_sk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="input_ditujukan_sk" class="form-label">Ditujukan
                                                Kepada</label>
                                            <input type="text" name="ditujukan_sk" id="input_ditujukan_sk"
                                                class="form-control  
                                                        @error('ditujukan_sk')
                                                        is-invalid
                                                        @enderror"
                                                value="{{ old('ditujukan_sk') }}">
                                            @error('ditujukan_sk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="formFile" class="form-label">Foto Surat Keluar</label>
                                            <input name="foto_sk_keputusan" type="file"
                                                id="formFile"class="form-control
                                                @error('foto_sk_keputusan')
                                                is-invalid
                                                @enderror"
                                                value="{{ old('foto_sk_keputusan') }}">
                                            @error('foto_sk_keputusan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
                                    <th scope="col">Nomor Surat Keluar</th>
                                    <th scope="col">Tanggal Surat Keputusan Keluar</th>
                                    <th scope="col">Perihal Surat Keputusan Keluar</th>
                                    <th scope="col">Ditujukan Kepada</th>
                                    <th scope="col">Foto Surat Keluar Keputusan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($data as $index => $row)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $row->no_sk_keputusan }}</td>
                                        <td>{{ date('d-M-Y', strtotime($row->tgl_sk_keluar)) }}</td>
                                        <td>{{ $row->perihal_sk }}</td>
                                        <td>{{ $row->ditujukan_sk }}</td>
                                        <td>
                                            <img src="{{ asset('foto_sk_keputusan/' . $row->foto_sk_keputusan) }}"
                                                alt="" style="width:100px;">
                                        </td>
                                        <td>
                                            <a href="{{ url('sk_keputusan_sekretariat/detail/' . $row->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="{{ url('sk_keputusan_sekretariat/edit/' . $row->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url('foto_sk_keputusan/' . $row->foto_sk_keputusan) }}"
                                                download="{{ $row->foto_sk_keputusan }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="{{ url('sk_keputusan_sekretariat/delete/' . $row->id) }}"
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
