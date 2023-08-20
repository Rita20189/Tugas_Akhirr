<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo mr-9" href="index.html"><img src="{!! asset('backend/images/logo.svg') !!}" class="mr-2" alt="" class="me-3" width="150vh"  /></a>
    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{!! asset('backend/images/satu.svg') !!}" class="mr-5" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav mr-lg-2">
      <li class="nav-item nav-search d-none d-lg-block">
        <div class="input-group">
          <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
          </div>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">

      <!-- bagian admin-->
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          <img src="{!! asset('backend/images/profile.png') !!}" alt="icon"> Admin
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <div cldivss="dropdown-item">
            <form action="{{ url('logout') }}" method="post">
              @csrf
              <button type="submit" class="btn">
                <i class="ti-power-off text-primary"></i>Logout
              </button>
            </form>
          </div>
        </div>
      </li>
      <li class="nav-item nav-settings d-none d-lg-flex">
        <a class="nav-link" href="#">
          <!-- <i class="icon-ellipsis"></i> -->
        </a>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>