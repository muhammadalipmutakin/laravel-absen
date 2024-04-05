<ul
        class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion py-5"
        id="accordionSidebar"
      >
        <!-- Sidebar - Brand -->

        @if(auth()->user()->jabatan == 'admin')
          <hr class="sidebar-divider mt-4" />
          <li class="nav-item">
              <a class="nav-link" href="{{ url('/') }}">
                  <i class="fas fa-fw fa-tachometer-alt text-white"></i>
                  <span class="text-white">Dashboard</span>
              </a>
          </li>
          @endif
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseTwo"
            aria-expanded="true"
            aria-controls="collapseTwo"
          >
            <i class="fas fa-user"></i>
            <span class="text-white">Karyawan</span>
          </a>
          <div
            id="collapseTwo"
            class="collapse"
            aria-labelledby="headingTwo"
            data-parent="#accordionSidebar"
          >
            <div class="bg-white py-2 collapse-inner rounded">
              @if(auth()->user()->jabatan == 'admin')
                <a class="collapse-item" href="{{ url('users') }}">Data Karyawan</a>
              @endif
              <a class="collapse-item" href="{{ url('profil') }}">Detail User</a>
            </div>
          </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseUtilities"
            aria-expanded="true"
            aria-controls="collapseUtilities"
          >
            <i class="fas fa-calendar-alt"></i>
            <span class="text-white">Absensi</span>
          </a>
          <div
            id="collapseUtilities"
            class="collapse"
            aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar"
          >
            <div class="bg-white py-2 collapse-inner rounded">
              @if(auth()->user()->jabatan == 'admin')
                <a class="collapse-item" href="{{ url('absensi') }}"
                  >Data Absensi Karyawan</a
                >
              @endif
              <a class="collapse-item" href="{{ url('absensi/create') }}"
                >Absen Masuk</a
              >
              <a class="collapse-item" href="{{ url('absensi/edit') }}"
                >Absen Pulang</a
              >
            </div>
          </div>
        </li>

        @if(auth()->user()->jabatan == 'admin')
          <li class="nav-item">
            <a
              class="nav-link collapsed"
              href="#"
              data-toggle="collapse"
              data-target="#collapseReport"
              aria-expanded="true"
              aria-controls="collapseUtilities"
            >
              <i class="fas fa-chart-bar"></i>
              <span class="text-white">Report</span>
            </a>
            <div
              id="collapseReport"
              class="collapse"
              aria-labelledby="headingUtilities"
              data-parent="#accordionSidebar"
            >
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('report') }}"
                  >Report Absensi Karyawan</a
                >
              </div>
            </div>
          </li>
        @endif

        <hr class="sidebar-divider my-4" />
        <li class="nav-item">
          <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
          </a>
      </li>
      
      </ul>