<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Desa Adat Sesetan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('') }}template/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('') }}template/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('') }}template/adminlte/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ asset('') }}template/adminlte/index2.html"><b>Ubah </b>Password</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="{{ url('change_password_sekretariat/update/' . Auth::user()->id, []) }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="password" name="current_password" class="form-control" placeholder="Password lama">
                    </div>
                    @error('current_password')
                        <div class="text-danger text-sm">{{ $message }}</div>
                    @enderror
                    <div class="form-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password baru">
                    </div>
                    @error('password')
                        <div class="text-danger text-sm">{{ $message }}</div>
                    @enderror
                    <div class="form-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Ulangi Password">
                    </div>
                    @error('password_confirmation')
                        <div class="text-danger text-sm">{{ $message }}</div>
                    @enderror
                    <div class="row justify-content-center">
                        <div class="col-6 text-right">
                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                        </div>
                        <div class="col-6 text-left">
                            <a href="{{ url('dashboard_sekretariat', []) }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('') }}template/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('') }}template/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('') }}template/adminlte/dist/js/adminlte.min.js"></script>

</body>

</html>
