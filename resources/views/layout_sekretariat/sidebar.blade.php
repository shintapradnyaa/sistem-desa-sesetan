<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('template/adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Desa Adat Sesetan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('dashboard_sekretariat') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            DASHBOARD
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            DATA WARGA ADAT
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('kematian_sekretariat') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kematian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('pernikahan_sekretariat') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pernikahan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-envelope"></i>
                        <p>
                            SURAT KELUAR
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('sk_keputusan_sekretariat') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Keluar Keputusan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('sk_undangan_sekretariat') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Keluar Undangan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('sk_proposal_sekretariat') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Keluar Proposal</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            SURAT MASUK
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('sm_keputusan_sekretariat') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Masuk Keputusan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('sm_undangan_sekretariat') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Masuk Undangan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('sm_proposal_sekretariat') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Masuk Proposal</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
