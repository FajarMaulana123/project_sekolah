@extends('template_general')
@section('contents')
<section id="services" class="services"></section>
<section id="services" class="services" style="margin-top: -30px;">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Sekolah SD Terbanyak Pendaftar</h2>
      <p>Segera Daftarkan Diri Kamu Sebelum Pendaftaran Ditutup!</p>
    </div>

  </div>
</section>
<section id="portfolio" class="portfolio" style="margin-top: -80px;">
  <div class="container">
    <div class="row" data-aos="fade-up" data-aos-delay="200">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <a href="#sd"><li data-filter="*" class="filter-active">SD</li></a>
          <a href="#smp"><li data-filter=".filter-card">SMP</li></a>
        </ul>
      </div>
    </div>
  </div>
</section>
<section id="sd" class="more-services" >
  <div class="container">
    <div class="row">
      <div data-aos="fade-up">
      </div>
      <?php if (count($jum_banyak_sd) == 0) { ?>
        <div class="col-lg-12 d-flex justify-content-center">
          Tidak ada sekolah SD
        </div>
      <?php }else{ ?>
      @foreach ($jum_banyak_sd as $sekolah)
      <?php
          $jud = $sekolah['nama_sekolah'];
          $string = str_replace(array('[\', \']'), '', $jud);
          $string = preg_replace('/\[.*\]/U', '', $jud);
          $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $jud);
          $string = htmlentities($jud, ENT_COMPAT, 'utf-8');
          $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $jud );
          $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $jud);
          $nama = strtolower(trim($string, '-'));
        ?>
      <div class="col-md-6 d-flex align-items-stretch mt-4">
        <div class="card" style="background-image: url('{{asset('imageUpload/sekolah/'.$sekolah['foto'])}}');" data-aos="fade-up" data-aos-delay="100">
          <div class="card-body">
            <h5 class="card-title"><a href="">{{ $sekolah['nama_sekolah'] }}</a></h5>
            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua.</p> -->
            <div class="row">
              <div class="col-md-6">
                @if(!Session::get('loginsiswa'))
                <div class="read-more"><a href="{{url('login')}}"><i class="bi bi-arrow-right"></i> Lihat Sekolah</a></div>
                @else
                <div class="read-more"><a href="{{url('detail-sekolah/'.$nama.'/'.Crypt::encrypt($sekolah['id_sekolah']))}}"><i class="bi bi-arrow-right"></i> Lihat Sekolah</a></div>
                @endif
              </div>
              <div class="col-md-6">
                <?php $user = \App\Pendaftaran::where('id_sekolah', $sekolah['id_sekolah'])->get(); ?>
                <h5 class="card-title" style="float: right;"><i class="bi bi-person"></i> {{count($user)}}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>

      @endforeach
      <?php } ?>
    </div>
  </div>
</section>
<section id="services" class="services" style="margin-top: -30px;">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Sekolah SMP Terbanyak Pendaftar</h2>
      <p>Segera Daftarkan Diri Kamu Sebelum Pendaftaran Ditutup!</p>
    </div>

  </div>
</section>
<section id="portfolio" class="portfolio" style="margin-top: -80px;">
  <div class="container">
    <div class="row" data-aos="fade-up" data-aos-delay="200">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <a href="#sd"><li data-filter="*">SD</li></a>
          <a href="#smp"><li data-filter=".filter-card" class="filter-active">SMP</li></a>
        </ul>
      </div>
    </div>
  </div>
</section>
<section id="smp" class="more-services" >
  <div class="container">
    <div class="row">
      <div data-aos="fade-up">
      </div>
      <?php if (count($jum_banyak_smp) == 0) { ?>
        <div class="col-lg-12 d-flex justify-content-center">
          Tidak ada sekolah SMP
        </div>
      <?php }else{ ?>
      @foreach ($jum_banyak_smp as $smp)
      <?php
          $jud = $smp['nama_sekolah'];
          $string = str_replace(array('[\', \']'), '', $jud);
          $string = preg_replace('/\[.*\]/U', '', $jud);
          $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $jud);
          $string = htmlentities($jud, ENT_COMPAT, 'utf-8');
          $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $jud );
          $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $jud);
          $nama = strtolower(trim($string, '-'));
        ?>
      <div class="col-md-6 d-flex align-items-stretch mt-4">
        <div class="card" style="background-image: url('{{asset('imageUpload/sekolah/'.$smp['foto'])}}');" data-aos="fade-up" data-aos-delay="100">
          <div class="card-body">
            <h5 class="card-title"><a href="">{{ $smp['nama_sekolah'] }}</a></h5>
            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua.</p> -->
            <div class="row">
              <div class="col-md-6">
                @if(!Session::get('loginsiswa'))
                <div class="read-more"><a href="{{url('login')}}"><i class="bi bi-arrow-right"></i> Lihat Sekolah</a></div>
                @else
                <div class="read-more"><a href="{{url('detail-sekolah/'.$nama.'/'.Crypt::encrypt($smp['id_sekolah']))}}"><i class="bi bi-arrow-right"></i> Lihat Sekolah</a></div>
                @endif
              </div>
              <div class="col-md-6">
                <?php $user = \App\Pendaftaran::where('id_sekolah', $smp['id_sekolah'])->get(); ?>
                <h5 class="card-title" style="float: right;"><i class="bi bi-person"></i> {{count($user)}}</h5>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      @endforeach
    <?php } ?>
    </div>
  </div>
</section>

@endsection