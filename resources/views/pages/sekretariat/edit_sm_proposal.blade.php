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
                            <h1 class="m-0 text-dark">Edit Surat Masuk Proposal</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Surat Masuk Proposal</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="div ml-3">
                <a class="btn btn-warning" href="{{ url('sm_proposal_sekretariat') }}" role="button"><i
                        class="fa fa-chevron-left"></i>
                    Kembali</a>
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="card mt-3">
                        <div class="card-body">
                            <form class="row g-3" action="{{ url('sm_proposal_sekretariat/update/' . $data->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="input_no_sm_proposal" class="form-label">Nomor Surat
                                            Masuk</label>
                                        <input type="text" name="no_sm_proposal"
                                            class="form-control
                                        @error('no_sm_proposal')
                                        is-invalid
                                        @enderror
                                        "
                                            value="{{ $data->no_sm_proposal }} ">
                                        @error('no_sm_proposal')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="input_tgl_sm_masuk" class="form-label">Tanggal Surat
                                            proposal Masuk</label>
                                        <input type="date" class="form-control" name="tgl_sm_masuk"
                                            value="{{ $data->tgl_sm_masuk }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="input_perihal_sm" class="form-label">Perihal Surat
                                            Masuk proposal</label>
                                        <input type="text" name="perihal_sm"
                                            class="form-control
                                        @error('perihal_sm')
                                        is-invalid
                                        @enderror
                                        "
                                            value="{{ $data->perihal_sm }} ">
                                        @error('perihal_sm')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="input_asal_sm" class="form-label">Asal Surat
                                            Masuk proposal</label>
                                        <input type="text" name="asal_sm"
                                            class="form-control
                                        @error('asal_sm')
                                        is-invalid
                                        @enderror
                                        "
                                            value="{{ $data->asal_sm }} ">
                                        @error('asal_sm')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="input_ditujukan_sm" class="form-label">Ditujukan
                                            Kepada</label>
                                        <input type="text" name="ditujukan_sm"
                                            class="form-control
                                        @error('ditujukan_sm')
                                        is-invalid
                                        @enderror
                                        "
                                            value="{{ $data->ditujukan_sm }} ">
                                        @error('ditujukan_sm')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="formFile" class="form-label">File Surat Masuk</label>
                                        <input class="form-control" name="foto_sm_proposal" type="file"
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
