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
                <a class="btn btn-warning" href="{{ url('pernikahan_bendesa') }}" role="button"><i
                        class="fa fa-chevron-left"></i>
                    Kembali</a>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="card mt-3">
                        <div class="card-body">
                            <form class="row g-3" action="{{ url('pernikahan_bendesa/update/' . $data->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6 mb-3">
                                    <label for="input_no_suket" class="form-label">Nomor Surat Keterangan
                                        Pernikahan</label>
                                    <input type="text" class="form-control" name="no_suket"
                                        value="{{ $no_suket }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_status_surat" class="form-label">Status Surat
                                        Pernikahan</label>
                                    <select name="status_surat" class="form-control">
                                        @foreach ($status_surat as $status_surat)
                                            @if ($status_surat == $data->status_surat)
                                                <option value="{{ $status_surat }}" selected>{{ $status_surat }}
                                                </option>
                                            @else
                                                <option value="{{ $status_surat }}">{{ $status_surat }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_tgl_pernikahan" class="form-label">Tanggal
                                        Pernikahan</label>
                                    <input type="date" class="form-control" name="tgl_pernikahan"
                                        value="{{ $data->tgl_pernikahan }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_banjar" class="form-label">
                                        Banjar</label>
                                    <input class="form-control" name="banjar" value="{{ $pernikahan->banjar }}"
                                        readonly>
                                </div>
                                <div class="col-md-12
                                        mb-3">
                                    <label for="input_nama_pria" class="form-label">
                                        Nama Pria</label>
                                    <input type="text" class="form-control" name="nama_pria"
                                        value="{{ $data->nama_pria }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_status_pria" class="form-label">
                                        Status Pria</label>
                                    <input type="text" class="form-control" name="status_pria"
                                        value="{{ $data->status_pria }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_tmpt_lahir_pria" class="form-label">Tempat
                                        Lahir Pria</label>
                                    <input type="text" class="form-control" name="tmpt_lahir_pria"
                                        value="{{ $data->tmpt_lahir_pria }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_tgl_lahir_pria" class="form-label">Tanggal
                                        Lahir Pria</label>
                                    <input type="date" class="form-control" name="tgl_lahir_pria"
                                        value="{{ $data->tgl_lahir_pria }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_pekerjaan_pria" class="form-label">Pekerjaan
                                        Pria</label>
                                    <input type="text" class="form-control" name="pekerjaan_pria"
                                        value="{{ $data->pekerjaan_pria }}" readonly>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="input_alamat_pria" class="form-label">
                                        Alamat Pria</label>
                                    <input type="text" class="form-control" name="alamat_pria"
                                        value="{{ $data->alamat_pria }}" readonly>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="input_nama_wanita" class="form-label">
                                        Nama Wanita</label>
                                    <input type="text" class="form-control" name="nama_wanita"
                                        value="{{ $data->nama_wanita }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_status_wanita" class="form-label">
                                        Status Wanita</label>
                                    <input type="text" class="form-control" name="status_wanita"
                                        value="{{ $data->status_wanita }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_tmpt_lahir_wanita" class="form-label">Tempat
                                        Lahir Wanita</label>
                                    <input type="text" name="tmpt_lahir_wanita" class="form-control"
                                        value="{{ $data->tmpt_lahir_wanita }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_tgl_lahir_wanita" class="form-label">Tanggal
                                        Lahir Wanita</label>
                                    <input type="date" name="tgl_lahir_wanita" class="form-control"
                                        value="{{ $data->tgl_lahir_wanita }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_pekerjaan_wanita" class="form-label">Pekerjaan
                                        Wanita</label>
                                    <input type="text" name="pekerjaan_wanita" class="form-control"
                                        value="{{ $data->pekerjaan_wanita }}" readonly>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="input_alamat_wanita" class="form-label">
                                        Alamat Wanita</label>
                                    <input type="text" class="form-control" name="alamat_wanita"
                                        value="{{ $data->alamat_wanita }}" readonly>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="input_rohaniawan" class="form-label">Dipuput Oleh
                                        Rohaniawan</label>
                                    <input type="text" name="rohaniawan" class="form-control"
                                        value="{{ $data->rohaniawan }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_saksi1" class="form-label">Saksi 1</label>
                                    <input type="text" name="saksi1" class="form-control"
                                        value="{{ $data->saksi1 }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input_saksi2" class="form-label">Saksi 2</label>
                                    <input type="text" name="saksi2" class="form-control"
                                        value="{{ $data->saksi2 }}" readonly>
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
        @include('layout_bendesa.footer')
    </div>
    <!-- ./wrapper -->
    @include('layout_bendesa.script')
</body>

</html>
