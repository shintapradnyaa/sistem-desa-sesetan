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
                            <h1 class="m-0 text-dark">Edit Surat Keluar Proposal</h1>
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
            <a class="btn btn-warning" href="{{ url('sk_proposal_sekretariat') }}" role="button"><i
                    class="fa fa-chevron-left"></i>
                Kembali</a>
            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="row mt-4 justify-content-center">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <form class="row g-3"
                                        action="{{ url('sk_proposal_sekretariat/update/' . $data->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="input_no_sk_proposal" class="form-label">Nomor Surat
                                                    Keluar</label>
                                                <input type="text" class="form-control" name="no_sk_proposal"
                                                    id="input_no_sk_proposal" value="{{ $data->no_sk_proposal }}">
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="input_tgl_sk_keluar" class="form-label">Tanggal Surat
                                                        proposal Keluar</label>
                                                    <input type="date" class="form-control form-control"
                                                        name="tgl_sk_keluar" id="input_tgl_sk_keluar"
                                                        value="{{ $data->tgl_sk_keluar }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="input_perihal_sk" class="form-label">Perihal Surat
                                                    Keluar proposal</label>
                                                <input type="text" class="form-control" name="perihal_sk"
                                                    id="input_perihal_sk" value="{{ $data->perihal_sk }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="input_ditujukan_sk" class="form-label">Ditujukan
                                                    Kepada</label>
                                                <input type="text" class="form-control" name="ditujukan_sk"
                                                    id="input_ditujukan_sk" value="{{ $data->ditujukan_sk }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="formFile" class="form-label">Foto Surat Keluar</label>
                                                <input class="form-control" name="foto_sk_proposal" type="file"
                                                    id="formFile">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
