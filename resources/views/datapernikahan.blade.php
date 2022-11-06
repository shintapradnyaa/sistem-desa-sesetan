</html>
<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout_master.header')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout_master.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layout_master.sidebar')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Data Pernikahan</h1>
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
                    <a href="/tambah_pernikahan" class="btn btn-primary">Tambah Data + </a>
                    <div class="row mt-4">
                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-auto">
                                <a href="#" class="btn btn-info">Export PDF </a>
                            </div>
                        </div>
                        <table class="table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nomor Surat Keterangan</th>
                                    <th scope="col">Tanggal Pernikahan</th>
                                    <th scope="col">Nama Pria</th>
                                    <th scope="col">Status Pria</th>
                                    <th scope="col">Tanggal Lahir Pria</th>
                                    <th scope="col">Alamat Pria</th>
                                    <th scope="col">Nama Wanita</th>
                                    <th scope="col">Status Wanita</th>
                                    <th scope="col">Tanggal Lahir Wanita</th>
                                    <th scope="col">Alamat Wanita</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($data_pernikahan as $row_pernikahan)
                                    <tr>
                                        <th scope="row">{{ $row_pernikahan->id }}</th>
                                        <td>{{ $row_pernikahan->no_suket }}</td>
                                        <td>{{ $row_pernikahan->tgl_pernikahan }}</td>
                                        <td>{{ $row_pernikahan->nama_pria }}</td>
                                        <td>{{ $row_pernikahan->status_pria }}</td>
                                        <td>{{ $row_pernikahan->tgl_lahir_pria }}</td>
                                        <td>{{ $row_pernikahan->alamat_pria }}</td>
                                        <td>{{ $row_pernikahan->nama_wanita }}</td>
                                        <td>{{ $row_pernikahan->status_wanita }}</td>
                                        <td>{{ $row_pernikahan->tgl_lahir_wanita }}</td>
                                        <td>{{ $row_pernikahan->alamat_wanita }}</td>
                                        <td>
                                            <a href="/tampil_pernikahan/{id} {{ $row_pernikahan->id }}" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            ?
                        </table>
                        {{-- {{ $data_pernikahan->links() }} --}}
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
        @include('layout_master.footer')
    </div>
    <!-- ./wrapper -->
    @include('layout_master.script')
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
