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
                <p class="login-box-msg">Silahkan Masukkan Email Anda</p>
                <form action="{{ url('lupa_password/proses') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input autofocus type="text"
                            class="form-control
                                @error('email')
                                is-invalid
                                @enderror
                            "placeholder="Email"
                            name="email" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Kirim ke Email</button>
                        </div>
                        <!-- /.col -->
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
