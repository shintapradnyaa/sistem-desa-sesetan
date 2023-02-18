<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout_bendesa.header')
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="{{ asset('logo_bendesa.png') }}" weight="80px" height="80px" alt="User Image">
                <h5><strong>Daftar Akun</strong></h5>
                <h6><strong>Sistem Pendataan Warga Adat Desa Sesetan</strong></h6>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan Daftarkan Akun Baru Anda</p>
                <form action="{{ url('proses_register') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text"
                            class="form-control
                        @error('name')
                        is-invalid
                        @enderror
                        "
                            placeholder="Nama Lengkap" name="name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="email"
                            class="form-control
                        @error('email')
                        is-invalid
                        @enderror
                        "
                            placeholder="Email" name="email">
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
                    <div class="input-group mb-3">
                        <input type="text"
                            class="form-control
                        @error('no_telfon')
                        is-invalid
                        @enderror
                        "
                            placeholder="Nomor Telepon" name="no_telfon">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('no_telfon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <select id="input_banjar" name="banjar"
                            class="form-select form-control
                        @error('banjar')
                        is-invalid
                        @enderror
                        ">
                            <option selected disabled>Pilih Banjar</option>
                            <option value="Banjar Kaja">Banjar Kaja</option>
                            <option value="Banjar Pembungan">Banjar Pembungan</option>
                            <option value="Banjar Tengah">Banjar Tengah</option>
                            <option value="Banjar Gaduh">Banjar Gaduh</option>
                            <option value="Banjar Puri Agung">Banjar Puri Agung</option>
                            <option value="Banjar Lantang Bejuh">Banjar Lantang Bejuh
                            </option>
                            <option value="Banjar Dukuh Sari">Banjar Dukuh Sari</option>
                            <option value="Banjar Pegok">Banjar Pegok</option>
                            <option value="Banjar Suwung Batan Kendal">Banjar Suwung Batan
                                Kendal</option>
                        </select>
                        @error('banjar')
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
                        "
                            placeholder="Password" name="password">
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
                    <div class="col-12 mb-3">
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </div>
                </form>

                <a href="{{ url('login') }}" class="text-center">Saya Sudah Mempunyai Akun</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    @include('layout_bendesa.script')
</body>

</html>
