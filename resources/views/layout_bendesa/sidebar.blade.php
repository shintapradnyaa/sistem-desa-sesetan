<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('logo_bendesa.png') }}" weight="30px" height="30px" alt="User Image">
        <span class="brand-text font-weight-light">Desa Adat Sesetan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('dashboard_bendesa') }}"
                        class="nav-link {{ request()->is('dashboard_bendesa') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            DASHBOARD
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item has-treeview {{ request()->is('kematian_bendesa') || request()->is('kematian_bendesa/detail/' . request()->segment(3)) || request()->is('kematian_bendesa/edit/' . request()->segment(3)) || request()->is('pernikahan_bendesa') || request()->is('pernikahan_bendesa/detail/' . request()->segment(3)) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            DATA WARGA ADAT
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('kematian_bendesa') }}"
                                class="nav-link {{ request()->is('kematian_bendesa') || request()->is('kematian_bendesa/detail/' . request()->segment(3)) || request()->is('kematian_bendesa/edit/' . request()->segment(3)) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kematian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('pernikahan_bendesa') }}"
                                class="nav-link {{ request()->is('pernikahan_bendesa') || request()->is('pernikahan_bendesa/detail/' . request()->segment(3)) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pernikahan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item has-treeview {{ request()->is('sk_keputusan_bendesa') || request()->is('sk_keputusan_bendesa/detail/' . request()->segment(3)) || request()->is('sk_undangan_bendesa') || request()->is('sk_undangan_bendesa/detail/' . request()->segment(3)) || request()->is('sk_proposal_bendesa') || request()->is('sk_proposal_bendesa/detail/' . request()->segment(3)) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-envelope"></i>
                        <p>
                            SURAT KELUAR
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('sk_keputusan_bendesa') }}"
                                class="nav-link {{ request()->is('sk_keputusan_bendesa') || request()->is('sk_keputusan_bendesa/detail/' . request()->segment(3)) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Keluar Keputusan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('sk_undangan_bendesa') }}"
                                class="nav-link {{ request()->is('sk_undangan_bendesa') || request()->is('sk_undangan_bendesa/detail/' . request()->segment(3)) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Keluar Undangan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('sk_proposal_bendesa') }}"
                                class="nav-link {{ request()->is('sk_proposal_bendesa') || request()->is('sk_proposal_bendesa/detail/' . request()->segment(3)) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Keluar Proposal</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item has-treeview {{ request()->is('sm_keputusan_bendesa') || request()->is('sm_keputusan_bendesa/detail/' . request()->segment(3)) || request()->is('sm_undangan_bendesa') || request()->is('sm_undangan_bendesa/detail/' . request()->segment(3)) || request()->is('sm_proposal_bendesa') || request()->is('sm_proposal_bendesa/detail/' . request()->segment(3)) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            SURAT MASUK
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('sm_keputusan_bendesa') }}"
                                class="nav-link {{ request()->is('sm_keputusan_bendesa') || request()->is('sm_keputusan_bendesa/detail/' . request()->segment(3)) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Masuk Keputusan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('sm_undangan_bendesa') }}"
                                class="nav-link {{ request()->is('sm_undangan_bendesa') || request()->is('sm_undangan_bendesa/detail/' . request()->segment(3)) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Masuk Undangan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('sm_proposal_bendesa') }}"
                                class="nav-link {{ request()->is('sm_proposal_bendesa') || request()->is('sm_proposal_bendesa/detail/' . request()->segment(3)) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Masuk Proposal</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item has-treeview {{ request()->is('kelola_pengguna') || request()->is('kelola_pengguna/detail/' . request()->segment(3)) || request()->is('kelola_warga') || request()->is('kelola_warga/detail/' . request()->segment(3)) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            PENGGUNA
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('kelola_pengguna') }}"
                                class="nav-link {{ request()->is('kelola_pengguna') || request()->is('kelola_pengguna/detail/' . request()->segment(3)) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengurus Desa Adat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('kelola_warga') }}"
                                class="nav-link {{ request()->is('kelola_warga') || request()->is('kelola_warga/detail/' . request()->segment(3)) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Warga Adat</p>
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
