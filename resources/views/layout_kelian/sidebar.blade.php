  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('logo_bendesa.png') }}" weight="30px" height="30px" alt="User Image">
          <span class="brand-text font-weight-light">Sistem Desa Sesetan</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                      <a href="{{ url('dashboard_kelian') }}"
                          class="nav-link {{ request()->is('dashboard_kelian') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <li class="nav-header"> <i class="fas fa-users"></i> DATA WARGA ADAT</li>
                  <li class="nav-item">
                      <a href="{{ url('data_warga') }}"
                          class="nav-link {{ request()->is('data_warga') || request()->is('data_warga/detail/' . request()->segment(3)) ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>
                              Data Warga
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('kematian_kelian') }}"
                          class="nav-link {{ request()->is('kematian_kelian') || request()->is('kematian_kelian/detail/' . request()->segment(3)) || request()->is('kematian_kelian/edit/' . request()->segment(3)) ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>
                              Data Kematian
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('pernikahan_kelian') }}"
                          class="nav-link {{ request()->is('pernikahan_kelian') || request()->is('pernikahan_kelian/detail/' . request()->segment(3)) ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>
                              Data Pernikahan
                          </p>
                      </a>
                  </li>
                  <li class="nav-header"><i class="nav-icon fa fa-envelope"></i> SURAT KELUAR</li>
                  <li class="nav-item">
                      <a href="{{ url('sk_undangan_kelian') }}"
                          class="nav-link {{ request()->is('sk_undangan_kelian') || request()->is('sk_undnagan_kelian/detail/' . request()->segment(3)) ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>
                              Surat Undangan
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('sk_keputusan_kelian') }}"
                          class="nav-link {{ request()->is('sk_keputusan_kelian') || request()->is('sk_keputusan_kelian/detail/' . request()->segment(3)) ? 'active' : '' }}">
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
