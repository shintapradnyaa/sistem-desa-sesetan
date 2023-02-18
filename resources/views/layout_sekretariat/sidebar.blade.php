<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('logo_bendesa.png') }}" weight="30px" height="30px" alt="User Image">
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
                    <a href="{{ url('dashboard_sekretariat') }}"
                        class="nav-link {{ request()->is('dashboard_sekretariat') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            DASHBOARD
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item has-treeview {{ request()->is('kematian_sekretariat') || request()->is('kematian_sekretariat/detail/' . request()->segment(3)) || request()->is('kematian_sekretariat/edit/' . request()->segment(3)) || request()->is('pernikahan_sekretariat') || request()->is('pernikahan_sekretariat/detail/' . request()->segment(3)) || request()->is('pernikahan_sekretariat/edit/' . request()->segment(3)) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            DATA WARGA ADAT
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('kematian_sekretariat') }}"
                                class="nav-link {{ request()->is('kematian_sekretariat') || request()->is('kematian_sekretariat/detail/' . request()->segment(3)) || request()->is('kematian_sekretariat/edit/' . request()->segment(3)) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kematian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('pernikahan_sekretariat') }}"
                                class="nav-link {{ request()->is('pernikahan_sekretariat') || request()->is('pernikahan_sekretariat/detail/' . request()->segment(3)) || request()->is('pernikahan_sekretariat/edit/' . request()->segment(3)) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pernikahan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item has-treeview {{ request()->is('sk_keputusan_sekretariat') || request()->is('sk_keputusan_sekretariat/detail/' . request()->segment(3)) || request()->is('sk_keputusan_sekretariat/edit/' . request()->segment(3)) || request()->is('sk_undangan_sekretariat') || request()->is('sk_undangan_sekretariat/detail/' . request()->segment(3)) || request()->is('sk_undangan_sekretariat/edit/' . request()->segment(3)) || request()->is('sk_proposal_sekretariat') || request()->is('sk_proposal_sekretariat/detail/' . request()->segment(3)) || request()->is('sk_proposal_sekretariat/edit/' . request()->segment(3)) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-envelope"></i>
                        <p>
                            SURAT KELUAR
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('sk_keputusan_sekretariat') }}"
                                class="nav-link {{ request()->is('sk_keputusan_sekretariat') || request()->is('sk_keputusan_sekretariat/detail/' . request()->segment(3)) || request()->is('sk_keputusan_sekretariat/edit/' . request()->segment(3)) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Keluar Keputusan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('sk_undangan_sekretariat') }}"
                                class="nav-link {{ request()->is('sk_undangan_sekretariat') || request()->is('sk_undangan_sekretariat/detail/' . request()->segment(3)) || request()->is('sk_undangan_sekretariat/edit/' . request()->segment(3)) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Keluar Undangan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('sk_proposal_sekretariat') }}"
                                class="nav-link {{ request()->is('sk_proposal_sekretariat') || request()->is('sk_proposal_sekretariat/detail/' . request()->segment(3)) || request()->is('sk_proposal_sekretariat/edit/' . request()->segment(3)) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Keluar Proposal</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item has-treeview {{ request()->is('sm_keputusan_sekretariat') || request()->is('sm_keputusan_sekretariat/detail/' . request()->segment(3)) || request()->is('sm_keputusan_sekretariat/edit/' . request()->segment(3)) || request()->is('sm_undangan_sekretariat') || request()->is('sm_undangan_sekretariat/detail/' . request()->segment(3)) || request()->is('sm_undangan_sekretariat/edit/' . request()->segment(3)) || request()->is('sm_proposal_sekretariat') || request()->is('sm_proposal_sekretariat/detail/' . request()->segment(3)) || request()->is('sm_proposal_sekretariat/edit/' . request()->segment(3)) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            SURAT MASUK
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('sm_keputusan_sekretariat') }}"
                                class="nav-link {{ request()->is('sm_keputusan_sekretariat') || request()->is('sm_keputusan_sekretariat/detail/' . request()->segment(3)) || request()->is('sm_keputusan_sekretariat/edit/' . request()->segment(3)) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Masuk Keputusan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('sm_undangan_sekretariat') }}"
                                class="nav-link {{ request()->is('sm_undangan_sekretariat') || request()->is('sm_undangan_sekretariat/detail/' . request()->segment(3)) || request()->is('sm_undangan_sekretariat/edit/' . request()->segment(3)) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Masuk Undangan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('sm_proposal_sekretariat') }}"
                                class="nav-link {{ request()->is('sm_proposal_sekretariat') || request()->is('sm_proposal_sekretariat/detail/' . request()->segment(3)) || request()->is('sm_proposal_sekretariat/edit/' . request()->segment(3)) ? 'active' : '' }}">
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
