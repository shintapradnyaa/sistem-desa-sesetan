<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <div class="user-panel pb-3 mb-3 d-flex">
                    <img src="{{ asset('foto_user_login/' . Auth::user()->foto_pengguna) }}"
                        class="img-circle elevation-2" alt="User Image">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <form action="{{ url('/logout') }}" method="get">
                    @csrf
                    <div class="row mb-3 ml-2 mt-2">
                        <div class="col-3">
                            <div class="u-img">
                                <img src="{{ asset('foto_user_login/' . Auth::user()->foto_pengguna) }}"
                                    class="img-circle elevation-2" alt="User Image" width="70px">
                            </div>
                        </div>
                        <div class="col-">
                            <div class="info">
                                <p class="dropdown-item">{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row mb-3 ml-2">
                        <div class="col-12">
                            <a href="{{ url('edit_profile/edit/' . Auth::user()->id) }}" type="submit"
                                class="btn btn-rounded btn-primary btn-sm">Profil <i class="fas fa-user-edit"></i></a>
                            <button type="submit" class="btn btn-rounded btn-danger btn-sm">
                                Logout
                                <i class="fas fa-power-off"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="dropdown-divider"></div>
            </div>
        </li>
    </ul>
</nav>
