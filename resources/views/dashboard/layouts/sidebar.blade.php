<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-secondary sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/dataobat*') ? 'active' :'' }}" aria-current="page" href="/dashboard/dataobat">
              <span data-feather="file-text"></span>
              Data Obat
            </a>
          </li>
          <li class="nav-item">
            <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/obatmasuk*') ? 'active' :'' }}" href="/dashboard/obatmasuk">
              <span data-feather="file-plus"></span>
              Data Obat Masuk
            </a>

            <a class="nav-link {{ Request::is('dashboard/obatkeluar*') ? 'active' :'' }} " href="/dashboard/obatkeluar">
              <span data-feather="file-minus"></span>
              Data Obat Keluar
            </a>

            <a class="nav-link {{ Request::is('/*') ? 'active' :'' }} " href="/">
              <span data-feather="log-out"></span>
              LogOut
            </a>

            <!-- <a class="nav-link px-3" href="/">LogOut <span data-feather="log-out"></span></a> -->
        </ul>
    </nav>