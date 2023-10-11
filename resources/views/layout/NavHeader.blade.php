<nav class="pcoded-navbar theme-horizontal menu-light brand-blue">
  <div class="navbar-wrapper container">
      <div class="navbar-content sidenav-horizontal" id="layout-sidenav">
          <ul class="nav pcoded-inner-navbar sidenav-inner">
              <li class="nav-item pcoded-menu-caption">
                  <label>Navigation</label>
              </li>
              <li class="nav-item {{Route::is('dashboard') ? 'active' : ''}}">
                  <a href="{{ route('dashboard') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
              </li>
              <li class="nav-item pcoded-hasmenu {{Route::is('jabatan') || Route::is('devisi') || Route::is('sektor') || Route::is('anggota') || Route::is('galeri') || Route::is('postingan') || Route::is('komentar') ? 'active' : ''}}">
                  <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Data Tabel</span></a>
                  <ul class="pcoded-submenu">
                    @hasrole('super-admin')
                      <li><a href="{{ route('jabatan') }}">Jabatan</a></li>
                      <li><a href="{{ route('devisi') }}">Devisi</a></li>
                      <li><a href="{{ route('sektor') }}">Sektor</a></li>
                      <li><a href="{{ route('anggota') }}">Anggota</a></li>
                      <li><a href="{{ route('galeri') }}">Galeri</a></li>
                      @endhasrole
                      @hasrole('super-admin|admin|')
                      <li><a href="{{ route('postingan') }}">Postingan</a></li>
                      <li><a href="{{ route('komentar') }}">Komentar</a></li>
                      @endhasrole
                  </ul>
              </li>
              @hasrole('super-admin')
              <li class="nav-item {{Route::is('profile') ? 'active' : ''}}">
                <a href="{{ route('profile') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Profile</span></a>
              </li>
              <li class="nav-item {{Route::is('akun') ? 'active' : ''}}">
                <a href="{{ route('akun') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext">Acount</span></a>
              </li>
              @endhasrole
          </ul>
      </div>
  </div>
</nav>
<!-- [ navigation menu ] end -->
<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
  <div class="container">
      <div class="m-header">
          <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
          <a href="{{route('dashboard')}}" class="b-brand">
            <img src="{{asset('assets/images/koperasi.png')}}" style="height: 130px; margin-top: 15px; margin-right: 60px" alt="">
          </a>
          <a href="#!" class="mob-toggler">
              <i class="feather icon-more-vertical"></i>
          </a>
      </div>
      <div class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
            
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="text-light">
                <b>{{Auth::user()->name}}</b>
            </li>
              <li>
                  <div class="dropdown drp-user">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="feather icon-user"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right profile-notification">
                         
                          <ul class="pro-body">
                              <li><a href="{{route('logout')}}" class="dropdown-item"><i class="feather icon-log-out text-danger"></i> Logout</a></li>
                          </ul>
                      </div>
                  </div>
              </li>
          </ul>
      </div>
  </div>
</header>