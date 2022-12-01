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
                <h2><strong>Login</strong></h2>
                <h4><strong>Sistem Pendataan Warga Adat Desa Sesetan</strong></h4>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Masukkan Username dan Password</p>
                <form action="{{ url('login/proses') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input autofocus type="text"
                            class="form-control
                                @error('username')
                                is-invalid
                                @enderror
                            "placeholder="Username"
                            name="username" value="{{ old('username') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('username')
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
                        {{-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div> --}}
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Log In</button>
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
