<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
          <div class="nav">
              <div class="sb-sidenav-menu-heading">Core</div>
              <a class="nav-link" href="{{ route('dashboard') }}">
                  <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                  Dashboard
              </a>
              <div class="sb-sidenav-menu-heading">Interface</div>
              <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                  <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                  Barang
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                  <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ route('barang.index') }}">Data Barang</a>
                      <a class="nav-link" href="{{ route('peminjaman-barang.index') }}">Peminjaman Barang</a>
                  </nav>
              </div>
              <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                  <div class="sb-nav-link-icon"><i class="fas fa-house"></i></div>
                  Ruang
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                  <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ route('ruang.index') }}">Data Ruang</a>
                      <a class="nav-link" href="{{ route('peminjaman-ruang.index') }}">Peminjaman Ruang</a>
                  </nav>
              </div>
          </div>
      </div>
      <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          {{ Auth()->user()->name }}
      </div>
  </nav>
</div>