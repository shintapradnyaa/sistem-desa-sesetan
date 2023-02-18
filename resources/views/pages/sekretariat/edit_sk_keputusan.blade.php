<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout_sekretariat.header')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout_sekretariat.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layout_sekretariat.sidebar')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Edit Surat Keluar Keputusan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</a></li>
                                <li class="breadcrumb-item active">Edit Surat Keluar Keputusan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="div ml-3">
                <a class="btn btn-warning" href="{{ url('sk_keputusan_sekretariat') }}" role="button"><i
                        class="fa fa-chevron-left"></i>
                    Kembali</a>
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="card mt-3">
                        <div class="card-body">
                            <form class="row g-3" action="{{ url('sk_keputusan_sekretariat/update/' . $data->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="input_no_sk_keputusan" class="form-label">Nomor Surat
                                            Keluar</label>
                                        <input type="text" name="no_sk_keputusan"
                                            class="form-control
                                    @error('no_sk_keputusan')
                                        is-invalid
                                    @enderror
                                    "
                                            value="{{ $data->no_sk_keputusan }} " readonly>
                                        @error('no_sk_keputusan')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="input_tgl_sk_keluar" class="form-label">Tanggal Surat
                                            Keputusan Keluar</label>
                                        <input type="date" class="form-control" name="tgl_sk_keluar"
                                            value="{{ $data->tgl_sk_keluar }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="input_perihal_sk" class="form-label">Perihal Surat
                                            Keluar Keputusan</label>
                                        <input type="text" name="perihal_sk"
                                            class="form-control
                                    @error('perihal_sk')
                                        is-invalid
                                    @enderror
                                    "
                                            value="{{ $data->perihal_sk }} ">
                                        @error('perihal_sk')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="input_ditujukan_sk" class="form-label">Ditujukan
                                            Kepada</label>
                                        <input type="text" name="ditujukan_sk"
                                            class="form-control
                                        @error('ditujukan_sk')
                                        is-invalid
                                    @enderror
                                    "
                                            value="{{ $data->ditujukan_sk }} ">
                                        @error('ditujukan_sk')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="formFile" class="form-label">File Surat Keluar</label>
                                        <input class="form-control" name="foto_sk_keputusan" type="file"
                                            id="formFile">
                                    </div>
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
        @include('layout_sekretariat.footer')
    </div>
    <!-- ./wrapper -->
    @include('layout_sekretariat.script')
</body>

</html>
