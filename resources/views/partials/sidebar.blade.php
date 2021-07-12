<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{url('home')}}" class="brand-link">
    <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    @if(Session::get('loginsuper'))
    <span class="brand-text font-weight-light">Super Admin</span>
    @else
    <span class="brand-text font-weight-light">Admin</span>
    @endif
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    @if(Session::get('loginsuper'))
    @else
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <?php $id = Session::get('id_user');
          $sekolah = \App\Sekolah::where(['id_user' => $id])->first() ?>
      <div class="info">
        <a href="#" class="d-block">{{$sekolah->nama_sekolah}}</a>
      </div>
    </div>
    @endif

    <!-- SidebarSearch Form -->
    @if(Session::get('loginsuper'))
    <div class="form-inline mt-3 pb-3 mb-3 d-flex">
    @else
    <div class="form-inline">
    @endif
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{url('home')}}" class="nav-link">
            <i class="nav-icon fa fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        @if(Session::get('loginsuper'))
        <li class="nav-item">
          <a href="{{url('kecamatan')}}" class="nav-link">
            <i class="nav-icon fa fa-hotel"></i>
            <p>
              Kecamatan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('sekolah')}}" class="nav-link">
            <i class="nav-icon fas fa-school"></i>
            <p>
              Sekolah
            </p>
          </a>
        </li>
        @endif
        @if(Session::get('loginadmin'))
        <li class="nav-item">
          <a href="{{url('prestasi')}}" class="nav-link">
            <i class="nav-icon fa fa-trophy"></i>
            <p>
              Prestasi
            </p>
          </a>
        </li>
        @endif
        <li class="nav-item">
          <a href="{{url('logout')}}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>