<!DOCTYPE html>
<html>

<head>
    @include('layout_bendesa.header')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="login-logo mt-5 mb-2">
                <h2><strong>Lupa Password</strong></h2>
            </div>
            @if ($message = Session::get('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Masukkan Password Baru Anda</p>
                <form action="{{ url('lupa_password/update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="email" value="{{ $reset->email }}">
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
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary col-12">Konfirmasi Password</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    @include('layout_bendesa.script')

</body>

</html>
