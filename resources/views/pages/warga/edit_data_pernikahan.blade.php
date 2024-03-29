<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout_warga.header')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout_warga.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layout_warga.sidebar')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Edit Data Pernikahan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Data Pernikahan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="div ml-3">
                <a class="btn btn-warning" href="{{ url('pernikahan_warga') }}" role="button"><i
                        class="fa fa-chevron-left"></i>
                    Kembali</a>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="card mt-3">
                        <div class="card-body">
                            <form class="row g-3" action="{{ url('pernikahan_warga/update/' . $data->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6 mb-3">
                                    <label for="input_tgl_pernikahan" class="form-label">Tanggal
                                        Pernikahan</label>
                                    <input type="date" name="tgl_pernikahan" class="form-control"
                                    value="{{$data->tgl_pernikahan}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_banjar" class="form-label">Banjar</label>
                                    <input class="form-control" value="{{ $pernikahan->banjar }}" readonly>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="input_nama_pria" class="form-label">Nama Pria</label>
                                    <input type="text" name="nama_pria"
                                        class="form-control
                                    @error('nama_pria')
                                    is-invalid
                                    @enderror
                                    "
                                        value="{{ $data->nama_pria }} ">
                                    @error('nama_pria')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_status_pria" class="form-label">Status Pria</label>
                                    <select name="status_pria" class="form-control">
                                        @foreach ($status_pria as $sp)
                                            @if ($sp == $data->status_pria)
                                                <option value="{{ $sp }}" selected>{{ $sp }}
                                                </option>
                                            @else
                                                <option value="{{ $sp }}">{{ $sp }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_tmpt_lahir_pria" class="form-label">Tempat
                                        Lahir Pria</label>
                                    <input type="text" name="tmpt_lahir_pria" class="form-control
                                    @error('tmpt_lahir_pria')
                                    is-invalid
                                    @enderror
                                    "
                                        value="{{ $data->tmpt_lahir_pria }} ">
                                    @error('tmpt_lahir_pria')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_tgl_lahir_pria" class="form-label">Tanggal
                                        Lahir Pria</label>
                                    <input type="date" name="tgl_lahir_pria" class="form-control" value="{{$data->tgl_lahir_pria}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_pekerjaan_pria" class="form-label">Pekerjaan
                                        Pria</label>
                                    <input type="text" name="pekerjaan_pria" class="form-control
                                    @error('pekerjaan_pria')
                                    is-invalid
                                    @enderror
                                    "
                                        value="{{ $data->pekerjaan_pria }} ">
                                    @error('pekerjaan_pria')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="input_alamat_pria" class="form-label">Alamat Pria</label>
                                    <input type="text"
                                        name="alamat_pria"class="form-control
                                    @error('alamat_pria')
                                    is-invalid
                                    @enderror
                                    "
                                        value="{{ $data->alamat_pria }} ">
                                    @error('alamat_pria')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="input_nama_wanita" class="form-label">Nama Wanita</label>
                                    <input type="text" name="nama_wanita"
                                        class="form-control
                                    @error('nama_wanita')
                                    is-invalid
                                    @enderror
                                    "
                                        value="{{ $data->nama_wanita }} ">
                                    @error('nama_wanita')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_status_wanita" class="form-label">Status
                                        Wanita</label>
                                    <select name="status_wanita" class="form-control">
                                        @foreach ($status_wanita as $sw)
                                            @if ($sw == $data->status_wanita)
                                                <option value="{{ $sw }}" selected>{{ $sw }}
                                                </option>
                                            @else
                                                <option value="{{ $sw }}">{{ $sw }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_tmpt_lahir_wanita" class="form-label">Tempat
                                        Lahir Wanita</label>
                                    <input type="text" name="tmpt_lahir_wanita" class="form-control
                                    @error('tmpt_lahir_wanita')
                                    is-invalid
                                    @enderror
                                    "
                                        value="{{ $data->tmpt_lahir_wanita }} ">
                                    @error('tmpt_lahir_wanita')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_tgl_lahir_wanita" class="form-label">Tanggal
                                        Lahir Wanita</label>
                                    <input type="date" name="tgl_lahir_wanita" class="form-control" value="{{$data->tgl_lahir_wanita}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_pekerjaan_wanita" class="form-label">Pekerjaan
                                        Wanita</label>
                                    <input type="text" name="pekerjaan_wanita" class="form-control
                                    @error('pekerjaan_wanita')
                                    is-invalid
                                    @enderror
                                    "
                                        value="{{ $data->pekerjaan_wanita }} ">
                                    @error('pekerjaan_wanita')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="input_alamat_wanita" class="form-label">Alamat
                                        Wanita</label>
                                    <input type="text" name="alamat_wanita"
                                        class="form-control
                                    @error('alamat_wanita')
                                    is-invalid
                                    @enderror
                                    "
                                        value="{{ $data->alamat_wanita }} ">
                                    @error('alamat_wanita')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="input_rohaniawan" class="form-label">Dipuput Oleh
                                        Rohaniawan</label>
                                    <input type="text" name="rohaniawan" class="form-control
                                    @error('rohaniawan')
                                    is-invalid
                                    @enderror
                                    "
                                        value="{{ $data->rohaniawan }} ">
                                    @error('rohaniawan')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_saksi1" class="form-label">Saksi 1</label>
                                    <input type="text" name="saksi1" class="form-control
                                    @error('saksi1')
                                    is-invalid
                                    @enderror
                                    "
                                        value="{{ $data->saksi1 }} ">
                                    @error('saksi1')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_saksi2" class="form-label">Saksi 2</label>
                                    <input type="text" name="saksi2" class="form-control
                                    @error('saksi2')
                                    is-invalid
                                    @enderror
                                    "
                                        value="{{ $data->saksi2 }} ">
                                    @error('saksi2')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Update</button>
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
        @include('layout_warga.footer')
    </div>
    <!-- ./wrapper -->
    @include('layout_warga.script')
</body>

</html>
