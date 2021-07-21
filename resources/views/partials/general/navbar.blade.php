<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    <div class="logo">
      <h1><a href="{{url('/')}}">My School</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav id="navbar" class="navbar">
      <ul>
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
        <!--  -->
        @if (!Session::get('loginsiswa')) 
        <li><a class="getstarted scrollto" href="{{url('login')}}">Login</a></li>
        @else
        <?php $id = Session::get('id_user');
        $username = \App\Siswa::where(['id_user' => $id])->first();

        $pendaftaran = \App\Pendaftaran::where('id_siswa', $username->id_siswa)->where('status', 0);


         ?>
        <?php
            $n = $username->nama;
            $na = str_replace(' ', '-', $n);
            $nama = strtolower($na);

         ?>

        <li><a class="nav-link scrollto {{ request()->is('/') ? 'active' : ''}}" href="{{url('/')}}">Home</a></li>
        <?php if ($pendaftaran->count() != 0) { ?>
          <li><a class="nav-link scrollto {{ request()->is('hasil-seleksi') ? 'active' : ''}}" href="{{url('hasil-seleksi')}}" style="display: inline;">Hasil Seleksi <sup style="background-color: red; padding:3px 7px 3px 7px; border-radius: 10px; color: white"><b>{{$pendaftaran->count()}}</b></sup></a> </li>
        <?php }else{ ?>
          <li><a class="nav-link scrollto" href="{{url('hasil-seleksi')}}" >Hasil Seleksi</a> </li>
        <?php } ?>

        <li style="margin-right: -20px;"><a><img src="{{asset('general/img/siswa.png')}}" width="40" style="display: inline;"></a></li>
        <?php if ($username->agama == NULL ||$username->tingkat == NULL || $username->jk == NULL || $username->tempat == NULL || $username->tgl_lahir == NULL || $username->asal_sekolah == NULL || $username->alamat == NULL || $username->nohp == NULL || $username->foto == NULL || $username->akte == NULL || $username->ijazah == NULL || $username->skhun == NULL || $username->kk == NULL ) { ?>
          <li class="dropdown"><a href="#"><span>{{$username->nama}}</span> <i class="bi bi-chevron-down"></i> <p style="color: red; font-size: 20px;">*</p></a>
            <ul>
              <li><a href="{{url('profile/'.$nama)}}"><p style="display: inline;">Lihat Profil</p><p style="color: red;">*</p></a></li>
              <li><a href="{{url('logout')}}" style="margin-top: -25px;">Logout</a></li>
            </ul>
          <?php }else{ ?> 
            <li class="dropdown"><a href="#"><span>{{$username->nama}}</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{{url('profile/'.$nama)}}"><p style="display: inline;">Lihat Profil</p></a></li>
                <li><a href="{{url('logout')}}" style="margin-top: -25px;">Logout</a></li>
              </ul>
            <?php }?>

          </li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>