<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem Desa Sesetan</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('') }}assets/landing_page/css/styles.css" rel="stylesheet" />
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('') }}template/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('') }}template/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Desa Adat Sesetan</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">Data Pernikahan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Data Kematian</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Surat Keputusan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Desa Adat Sesetan</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Sistem ini menampilkan data-data yang menyangkut tentang data
                        pernikahan, data kematian, data udangan, dan surat keputusan untuk warga desa adat sesetan</p>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-12 text-center">
                    <h2 class="text-white mt-0">Data Pernikahan</h2>
                    <hr class="divider divider-light" />
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
                                        <th scope="col">Status Pria</th>
                                        <th scope="col">Nama Wanita</th>
                                        <th scope="col">Status Surat</th>
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
                                            <td>{{ $row_pernikahan->status_pria }}</td>
                                            <td>{{ $row_pernikahan->nama_wanita }}</td>
                                            <td><label
                                                    class="btn btn-sm {{ $row_pernikahan->status_surat == 'Proses' ? 'btn-primary' : 'btn-success' }}">
                                                    {{ $row_pernikahan->status_surat == 'Proses' ? 'Proses' : 'Selesai' }}</label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Data Kematian</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="card">
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr align="center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Banjar</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Tanggal Kematian</th>
                                    <th scope="col">Tanggal Ngaben</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($kematian as $row_kematian)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $row_kematian->nama }}</td>
                                        <td>{{ $row_kematian->banjar }}</td>
                                        <td>{{ $row_kematian->jenis_kelamin }}</td>
                                        <td>{{ date('d-M-Y', strtotime($row_kematian->tgl_lahir)) }}</td>
                                        <td>{{ date('d-M-Y', strtotime($row_kematian->tgl_kematian)) }}</td>
                                        <td>{{ date('d-M-Y', strtotime($row_kematian->tgl_ngaben)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section bg-dark text-white" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-12 col-xl-12 text-center">
                    <h2>Surat Keputusan</h2>
                    <hr class="divider" />
                    <div class="row gx-4 gx-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr align="center">
                                            <th scope="col">No</th>
                                            <th scope="col">Nomor Surat Keluar</th>
                                            <th scope="col">Tanggal Surat Keputusan Keluar</th>
                                            <th scope="col">Perihal Surat Keputusan Keluar</th>
                                            <th scope="col">Ditujukan Kepada</th>
                                            <th scope="col">Foto Surat Keluar Keputusan</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($sk_keputusan as $row)
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td>{{ $row->no_sk_keputusan }}</td>
                                                <td>{{ $row->tgl_sk_keluar }}</td>
                                                <td>{{ $row->perihal_sk }}</td>
                                                <td>{{ $row->ditujukan_sk }}</td>
                                                <td>
                                                    <a href="{{ url('foto_sk_keputusan/' . $row->foto_sk_keputusan) }}"
                                                        download="{{ $row->foto_sk_keputusan }}"
                                                        class="btn btn-sm btn-primary">
                                                        Download Surat
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2022 - Desa Adat Sesetan</div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('') }}assets/landing_page/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="{{ asset('') }}template/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('') }}template/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('') }}template/adminlte/dist/js/adminlte.min.js"></script>
    <script src="{{ asset('') }}template/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}template/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}template/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js">
    </script>
    <script src="{{ asset('') }}template/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
    </script>
    <script>
        $(function() {
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false
                });
                $("#example2").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false
                });
                $("#example3").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false
                });
            });
        });
    </script>
</body>

</html>
