<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <div class="user-panel pb-3 mb-3 d-flex">
                    <img src="{{ asset('') }}template/adminlte/dist/img/user2-160x160.jpg"
                        class="img-circle elevation-2" alt="User Image">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <form action="{{ url('/logout') }}" method="get">
                    @csrf
                    <div class="u-img">
                        <img src="{{ asset('') }}template/adminlte/dist/img/user2-160x160.jpg"
                            class="img-circle elevation-2" alt="User Image" width="70px">
                    </div>
                    <div class="info">
                        <p class="dropdown-item">{{ Auth::user()->name }}</p>
                    </div>
                    {{-- <hr/> --}}
                    <button type="submit" class="btn btn-rounded btn-danger btn-sm">
                        Logout
                        <i class="fas fa-power-off" ::before></i>
                    </button>
                </form>
                <div class="dropdown-divider"></div>
            </div>
        </li>
    </ul>
</nav>