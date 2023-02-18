<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout_bendesa.header')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout_bendesa.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layout_bendesa.sidebar')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Edit Data Kematian</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v2</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="div ml-3">
                <a class="btn btn-warning" href="{{ url('kematian_bendesa') }}" role="button"><i
                        class="fa fa-chevron-left"></i>
                    Kembali</a>
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="card mt-3">
                        <div class="card-body">
                            <form action="{{ url('kematian_bendesa/update/' . $data->id, []) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <Label>Nama</Label>
                                            <input type="text" name="nama" readonly
                                                class="form-control
                                                @error('nama')
                                                    is-invalid
                                                @enderror
                                                "
                                                value="{{ $data->nama }} ">
                                            @error('nama')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Banjar</label>
                                            <input type="text" class="form-control" value="{{ $kematian->banjar }}"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <input type="text" class="form-control" name="jenis_kelamin"
                                                value="{{ $data->jenis_kelamin }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <Label>Tanggal Lahir</Label>
                                            <input type="date" class="form-control" name="tgl_lahir" id="date"
                                                value="{{ $data->tgl_lahir }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <Label>Umur</Label>
                                            <input type="text" id="umur" name="umur" readonly
                                                class="form-control
                                                @error('umur')
                                                    is-invalid
                                                @enderror
                                                "
                                                value="{{ $data->umur }} ">
                                            @error('umur')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <input type="text" class="form-control" name="agama"
                                                value="{{ $data->agama }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <Label>Alamat</Label>
                                            <input type="text" name="alamat" readonly
                                                class="form-control
                                                @error('alamat')
                                                    is-invalid
                                                @enderror
                                                "
                                                value="{{ $data->alamat }} ">
                                            @error('alamat')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Tanggal Kematian</label>
                                            <input type="date" class="form-control" name="tgl_kematian"
                                                id="input_tgl_kematian" value="{{ $data->tgl_kematian }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Tanggal Ngaben</label>
                                            <input class="form-control" name="tgl_ngaben" id="disabledInput"
                                                type="date" value="{{ $data->tgl_ngaben }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <Label>Sebab Kematian</Label>
                                            <input type="text" name="sebab_kematian" readonly
                                                class="form-control
                                                @error('sebab_kematian')
                                                    is-invalid
                                                @enderror
                                                "
                                                value="{{ $data->sebab_kematian }} ">
                                            @error('sebab_kematian')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <Label>Ahli Waris</Label>
                                            <input type="text" name="ahli_waris" readonly
                                                class="form-control
                                                @error('ahli_waris')
                                                    is-invalid
                                                @enderror
                                                "
                                                value="{{ $data->ahli_waris }} ">
                                            @error('ahli_waris')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <img src="{{ asset('foto_ktp_kematian/' . $data->foto_ktp) }}"
                                                class="img-thumbnail">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary col-12">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->


        <!-- Main Footer -->
        @include('layout_bendesa.footer')
    </div>
    <!-- ./wrapper -->
    @include('layout_bendesa.script')
</body>

</html>
