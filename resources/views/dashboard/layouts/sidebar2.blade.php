<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/dataobat') ? 'active' :'' }}" aria-current="page" href="/admin/dataobat">
              <span data-feather="file-text"></span>
              Data Obat
            </a>
          </li>
          <li class="nav-item">
            <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/obatmasuk*') ? 'active' :'' }}" href="/admin/obatmasuk">
              <span data-feather="file-plus"></span>
              Obat Masuk
            </a>
            <a class="nav-link {{ Request::is('admin/obatkeluar*') ? 'active' :'' }} " href="/admin/obatkeluar">
              <span data-feather="file-minus"></span>
              Obat Keluar
            </a>

            <a class="nav-link {{ Request::is('/*') ? 'active' :'' }} " href="/">
              <span data-feather="log-out"></span>
              LogOut
            </a>
          </li> 
        </ul>
    </nav>