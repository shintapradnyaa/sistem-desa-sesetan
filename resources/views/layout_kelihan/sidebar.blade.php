  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('template/adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Sistem Desa Sesetan</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                      <a href="{{ url('dashboard_kelihan', []) }}"
                          class="nav-link {{ request()->is('dashboard_kelihan') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <li class="nav-header"> <i class="fas fa-users"></i> DATA WARGA ADAT</li>
                  <li class="nav-item">
                      <a href="{{ url('kematian_kelihan', []) }}"
                          class="nav-link {{ request()->is('kematian_kelihan') ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>
                              Data Kematian
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('pernikahan_kelihan', []) }}"
                          class="nav-link {{ request()->is('pernikahan_kelihan') ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>
                              Data Pernikahan
                          </p>
                      </a>
                  </li>
                  <li class="nav-header"><i class="nav-icon fa fa-envelope"></i> SURAT KELUAR</li>
                  <li class="nav-item">
                      <a href="{{ url('sk_undangan_kelihan', []) }}"
                          class="nav-link {{ request()->is('sk_undangan_kelihan') ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>
                              Surat Undangan
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('sk_keputusan_kelihan', []) }}"
                          class="nav-link {{ request()->is('sk_keputusan_kelihan') ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>
                              Surat Keputusan
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
