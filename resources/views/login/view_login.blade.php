<!DOCTYPE html>
<html>

<head>
    @include('layout_bendesa.header')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            @if ($message = Session::get('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="login-logo mt-4 mb-2">
                <h2><strong>Login</strong></h2>
                <h4><strong>Sistem Pendataan Warga Adat Desa Sesetan</strong></h4>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Masukkan Email dan Password</p>
                <form action="{{ url('login/proses') }}" method="post">
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
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password"
                            class="form-control
                                @error('password')
                                is-invalid
                                @enderror
                            "placeholder="Password"
                            name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Log In</button>
                        </div>
                        <div class="col-8 mt-3">
                            <a href="{{ url('lupa_password') }}">Lupa Password?</a>
                        </div>
                        <div class="col-8 mt-2">
                            <a href="{{ url('register') }}">Daftar Akun Baru</a>
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
