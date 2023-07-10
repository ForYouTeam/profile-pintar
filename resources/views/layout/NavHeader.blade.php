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
                      <li><a href="{{ route('jabatan') }}">Jabatan</a></li>
                      <li><a href="{{ route('devisi') }}">Devisi</a></li>
                      <li><a href="{{ route('sektor') }}">Sektor</a></li>
                      <li><a href="{{ route('anggota') }}">Anggota</a></li>
                      <li><a href="{{ route('galeri') }}">Galeri</a></li>
                      <li><a href="{{ route('postingan') }}">Postingan</a></li>
                      <li><a href="{{ route('komentar') }}">Komentar</a></li>
                  </ul>
              </li>
              <li class="nav-item {{Route::is('profile') ? 'active' : ''}}">
                <a href="{{ route('profile') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Profile</span></a>
            </li>
            <li class="nav-item {{Route::is('akun') ? 'active' : ''}}">
                <a href="{{ route('akun') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext">Acount</span></a>
            </li>
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
          <a href="#!" class="b-brand">
              <!-- ========   change your logo hear   ============ -->
              <img src="assets/images/logo.png" alt="" class="logo">
              <img src="assets/images/logo-icon.png" alt="" class="logo-thumb">
          </a>
          <a href="#!" class="mob-toggler">
              <i class="feather icon-more-vertical"></i>
          </a>
      </div>
      <div class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                  <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                  <div class="search-bar">
                      <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                      <button type="button" class="close" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
              </li>
          </ul>
          <ul class="navbar-nav ml-auto">
              <li>
                  <div class="dropdown">
                      <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
                      <div class="dropdown-menu dropdown-menu-right notification">
                          <div class="noti-head">
                              <h6 class="d-inline-block m-b-0">Notifications</h6>
                              <div class="float-right">
                                  <a href="#!" class="m-r-10">mark as read</a>
                                  <a href="#!">clear all</a>
                              </div>
                          </div>
                          <ul class="noti-body">
                              <li class="n-title">
                                  <p class="m-b-0">NEW</p>
                              </li>
                              <li class="notification">
                                  <div class="media">
                                      <img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
                                      <div class="media-body">
                                          <p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
                                          <p>New ticket Added</p>
                                      </div>
                                  </div>
                              </li>
                              <li class="n-title">
                                  <p class="m-b-0">EARLIER</p>
                              </li>
                              <li class="notification">
                                  <div class="media">
                                      <img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
                                      <div class="media-body">
                                          <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>10 min</span></p>
                                          <p>Prchace New Theme and make payment</p>
                                      </div>
                                  </div>
                              </li>
                              <li class="notification">
                                  <div class="media">
                                      <img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
                                      <div class="media-body">
                                          <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>12 min</span></p>
                                          <p>currently login</p>
                                      </div>
                                  </div>
                              </li>
                              <li class="notification">
                                  <div class="media">
                                      <img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
                                      <div class="media-body">
                                          <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                          <p>Prchace New Theme and make payment</p>
                                      </div>
                                  </div>
                              </li>
                          </ul>
                          <div class="noti-footer">
                              <a href="#!">show all</a>
                          </div>
                      </div>
                  </div>
              </li>
              <li>
                  <div class="dropdown drp-user">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="feather icon-user"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right profile-notification">
                          <div class="pro-head">
                              <img src="assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                              <span>John Doe</span>
                              <a href="auth-signin.html" class="dud-logout" title="Logout">
                                  <i class="feather icon-log-out"></i>
                              </a>
                          </div>
                          <ul class="pro-body">
                              <li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                              <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                              <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
                          </ul>
                      </div>
                  </div>
              </li>
          </ul>
      </div>
  </div>
</header>