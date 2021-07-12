<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    <div class="logo">
      <h1><a href="index.html">My School</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
        <!-- <li><a class="nav-link scrollto" href="#about">About</a></li> -->
        <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li>
        <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
        <li><a class="nav-link scrollto" href="#team">Team</a></li>
        <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
        <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li> -->
        <!-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
        @if (!Session::get('loginsiswa')) 
          <li><a class="getstarted scrollto" href="{{url('login')}}">Login</a></li>
        @else
          <?php $id = Session::get('id_user');
          $username = \App\Siswa::where(['id_user' => $id])->first() ?>

          <li><a class="nav-link scrollto" href="">Hasil Seleksi</a></li>
          <li style="margin-right: -20px;"><a><img src="{{asset('general/img/siswa.png')}}" width="40" style="display: inline;"></a></li>
          <li class="dropdown"><a href="#"><span>{{$username->nama}}</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="#">Lihat Profil</a></li>
            <li><a href="{{url('logout')}}">Logout</a></li>
          </ul>
        </li>
          <!-- <li><a class="getstarted scrollto" href="">{{Session::get('email')}}</a></li> -->
          <!-- <li><a class="getstarted scrollto" href="{{url('logout')}}">logout</a></li> -->
        @endif
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header>