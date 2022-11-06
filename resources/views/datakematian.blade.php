</html>
<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout_bendesa.header')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout_bendesa.header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layout_bendesa.sidebar')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dataasasas Kematian</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <a href="/tambah_kematian" class="btn btn-primary">Tambah Data + </a>
                    <div class="row mt-4">
                        <div class="row g-3 align-items-center mb-3 mt-3">
                            <div class="col-auto">
                                <a href="export_pdf_kematian" class="btn btn-info">Export PDF </a>
                            </div>
                        </div>
                        <table class="table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Banjar</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Agama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Tanggal Kematian</th>
                                    <th scope="col">Tanggal Ngaben</th>
                                    <th scope="col">Sebab Kematian</th>
                                    <th scope="col">Ahli Waris</th>
                                    <th scope="col">Foto KTP</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($data as $index => $row_kematian)
                                    <tr>
                                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                                        <td>{{ $row_kematian->nama }}</td>
                                        <td>{{ $row_kematian->banjar }}</td>
                                        <td>{{ $row_kematian->jenis_kelamin }}</td>
                                        <td>{{ $row_kematian->tgl_lahir }}</td>
                                        <td>{{ $row_kematian->agama }}</td>
                                        <td>{{ $row_kematian->alamat }}</td>
                                        <td>{{ $row_kematian->tgl_kematian }}</td>
                                        <td>{{ $row_kematian->tgl_ngaben }}</td>
                                        <td>{{ $row_kematian->sebab_kematian }}</td>
                                        <td>{{ $row_kematian->ahli_waris }}</td>
                                        <td>
                                            <img src="{{ asset('foto_ktp_kematian/' . $row_kematian->foto_ktp) }}"
                                                alt="" style="width: 80px">

                                        </td>
                                        <td>
                                            <a href="/tampil_kematian/{{ $row_kematian->id }}" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger hapus"
                                                data-id="{{ $row_kematian->id }}"
                                                data-nama="{{ $row_kematian->nama }}">
                                                <i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
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
</body>
{{-- <script>
    $('.hapus').click(function() {
        //membuat variabel baru yg akan menyimpan data-id 
        var kematianId = $(this).attr('data-id');
        //membuat variabel baru yg akan menyimpan nama
        var nama = $(this).attr('data-nama');
        swal({
                title: "Apakah Anda Yakin Ingin Menghapus Data Ini?",
                text: "Akan Menghapus Data dengan Nama " + nama + " ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    //memanggil function delete yang ada pada route dan memanggil id yg telah dibuat  
                    window.location = "/hapus_kematian/ " + kematianId + " "
                    swal("Selamat Data Telah Terhapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data Tidak Terhapus");
                }
            });
    });
</script>
<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script> --}} --}}

</html>
