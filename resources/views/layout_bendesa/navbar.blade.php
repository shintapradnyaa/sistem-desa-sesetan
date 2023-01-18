<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <div class="user-panel pb-3 mb-3 d-flex">
                    @if (Auth::user()->foto_pengguna == null)
                        <img src="{{ asset('foto_user_login/user.png') }}" class="img-circle elevation-2"
                            alt="User Image">
                    @else
                        <img src="{{ asset('foto_user_login/' . Auth::user()->foto_pengguna) }}"
                            class="img-circle elevation-2" alt="User Image">
                    @endif
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <div class="row mb-3 ml-2 mt-2">
                    <div class="col-3">
                        <div class="user-panel pb-1 d-flex">
                            @if (Auth::user()->foto_pengguna == null)
                                <img src="{{ asset('foto_user_login/user.png') }}" class="img-circle elevation-2"
                                    alt="User Image">
                            @else
                                <img src="{{ asset('foto_user_login/' . Auth::user()->foto_pengguna) }}"
                                    class="img-circle elevation-2" alt="User Image">
                            @endif
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="info">
                            <p class="dropdown-item">{{ Auth::user()->name }}</p>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row mb-3 ml-2 mt-2">
                    <a href="{{ url('edit_profile_bendesa/edit/' . Auth::user()->id) }}"
                        class="btn btn-rounded btn-primary btn-sm mr-2">Profil <i class="fas fa-user-edit"></i></a>
                    <a href="{{ url('change_password_bendesa/edit/' . Auth::user()->id) }}"
                        class="btn btn-rounded btn-primary btn-sm float-left">Change Password <i
                            class="fa fa-unlock-alt" aria-hidden="true"></i></a>
                </div>
                <hr />
                <form action="{{ url('/logout') }}" method="get">
                    @csrf
                    <div class="row mb-3 ml-2">
                        <button type="submit" class="btn btn-rounded btn-danger btn-sm">
                            Logout
                            <i class="fas fa-power-off"></i>
                        </button>
                    </div>
                </form>
                <div class="dropdown-divider"></div>
            </div>
        </li>
    </ul>

</nav>
