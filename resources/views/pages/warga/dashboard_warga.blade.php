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
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Welcome</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">Data Pernikahan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Data Kematian</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Surat Undangan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Surat Keputusan</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">I Love You Shinta!</h1>
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
                                <th scope="col">Aksi</th>
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
                                            class="badge {{ $row_pernikahan->status_surat == 'Proses' ? 'badge-primary' : 'badge-success' }}">
                                            {{ $row_pernikahan->status_surat == 'Proses' ? 'Proses' : 'Selesai' }}</label>
                                    </td>
                                    <td>
                                        <a href="{{ url('pernikahan_kelihan/detail/' . $row_pernikahan->id) }}"
                                            class="btn btn-sm btn-info" title="Lihat Data">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-light btn-xl mt-5" href="#services">Data Kematian</a>
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

            </div>
        </div>
    </section>
    <!-- Portfolio-->
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row g-0">

            </div>
        </div>
    </div>
    <!-- Call to action-->
    <section class="page-section bg-dark text-white">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mb-4">Surat Undangan</h2>
            <a class="btn btn-light btn-xl" href="https://startbootstrap.com/theme/creative/">Download Now!</a>
        </div>
    </section>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">Surat Keputusan</h2>
                    <hr class="divider" />
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
    <script src="{{ asset('') }}assets/landing_pagejs/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
