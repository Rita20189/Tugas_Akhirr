<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{url('/dashboard')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#data-master" aria-expanded="false" aria-controls="data-master">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Data Master</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="data-master">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('/data-meja')}}">Data Meja</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/data-outlet')}}">Data Outlet</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/data-kategori')}}">Data Kategori</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/data-menu')}}">Data Menu</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#data-pesanan" aria-expanded="false" aria-controls="data-pesanan">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Manajemen Pesan</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="data-pesanan">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('/data-pesanan')}}">Data Pesanan</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#data-pengguna" aria-expanded="false" aria-controls="data-pengguna">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Manajemen Pengguna</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="data-pengguna">
        <ul class="nav flex-column sub-menu">
         <li class="nav-item"> <a class="nav-link" href="{{url('/data-pengguna')}}">Data Pengguna</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/documentation/documentation.html">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Laporan</span>
      </a>
    </li>
  </ul>
</nav>