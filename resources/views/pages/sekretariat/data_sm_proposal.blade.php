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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"> Data Surat Masuk Proposal</i>
                </button>

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
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Surat Masuk Proposal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="row g-3" action="{{ url('sm_proposal_sekretariat/store/') }}" method="POST"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="input_no_sm_proposal" class="form-label">Nomor Surat
                                                    Masuk</label>
                                                <input type="text" name="no_sm_proposal" id="input_no_sm_proposal"
                                                    class="form-control
                                                    @error('no_sm_proposal')
                                                    is-invalid
                                                    @enderror"
                                                    value="{{ old('no_sm_proposal') }}">
                                                @error('no_sm_proposal')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="input_tgl_sm_masuk" class="form-label">Tanggal Surat
                                                    proposal Masuk</label>
                                                <input type="date" name="tgl_sm_masuk" id="input_tgl_sm_masuk"
                                                    class="form-control
                                                    @error('tgl_sm_masuk')
                                                    is-invalid
                                                    @enderror"
                                                    value="{{ old('tgl_sm_masuk') }}">
                                                @error('tgl_sm_masuk')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-12">
                                                <label for="input_perihal_sm" class="form-label">Perihal Surat Masuk
                                                    proposal</label>
                                                <input type="text" name="perihal_sm" id="input_perihal_sm"
                                                    class="form-control
                                                    @error('perihal_sm')
                                                    is-invalid
                                                    @enderror"
                                                    value="{{ old('perihal_sm') }}">
                                                @error('perihal_sm')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label for="input_asal_sm" class="form-label">Asal Surat Masuk
                                                    proposal</label>
                                                <input type="text" name="asal_sm" id="input_asal_sm"
                                                    class="form-control
                                                    @error('asal_sm')
                                                    is-invalid
                                                    @enderror"
                                                    value="{{ old('asal_sm') }}">
                                                @error('asal_sm')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label for="input_ditujukan_sm" class="form-label">Ditujukan
                                                    Kepada</label>
                                                <input type="text" name="ditujukan_sm" id="input_ditujukan_sm"
                                                    class="form-control
                                                    @error('ditujukan_sm')
                                                    is-invalid
                                                    @enderror"
                                                    value="{{ old('ditujukan_sm') }}">
                                                @error('ditujukan_sm')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-12">
                                        <label for="formFile" class="form-label">File Surat Masuk</label>
                                        <input name="foto_sm_proposal" type="file" id="formFile"
                                            class="form-control
                                            @error('foto_sm_proposal')
                                                    is-invalid
                                                    @enderror"
                                            value="{{ old('foto_sm_proposal') }}">
                                        @error('foto_sm_proposal')
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
                                            <a href="{{ url('sm_proposal_sekretariat/edit/' . $row->id) }}"
                                                class="btn btn-sm btn-warning" title="Edit Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url('foto_sm_proposal/' . $row->foto_sm_proposal) }}"
                                                download="{{ $row->foto_sm_proposal }}"
                                                class="btn btn-sm btn-primary" title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="{{ url('sm_proposal_sekretariat/delete/' . $row->id) }}"
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
