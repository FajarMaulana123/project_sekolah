@extends('template_general')
@section('contents')
<section id="services" class="services"></section>
<section id="services" class="services" style="margin-top: -30px;">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Sekolah SD Di Kecamatan {{$kecamatan}}</h2>
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
      <?php if ($list_sekolah_sd->count() == 0) { ?>
        <div class="col-lg-12 d-flex justify-content-center">
          Tidak ada sekolah SD
        </div>
      <?php }else{ ?>
      @foreach ($list_sekolah_sd as $sekolah)
      <?php
          $jud = $sekolah->nama_sekolah;
          $string = str_replace(array('[\', \']'), '', $jud);
          $string = preg_replace('/\[.*\]/U', '', $jud);
          $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $jud);
          $string = htmlentities($jud, ENT_COMPAT, 'utf-8');
          $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $jud );
          $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $jud);
          $nama = strtolower(trim($string, '-'));
        ?>
      <div class="col-md-6 d-flex align-items-stretch mt-4">
        <div class="card" style="background-image: url('{{asset('imageUpload/sekolah/'.$sekolah->foto)}}');" data-aos="fade-up" data-aos-delay="100">
          <div class="card-body">
            <h5 class="card-title"><a href="">{{ $sekolah->nama_sekolah }}</a></h5>
            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua.</p> -->
            @if(!Session::get('loginsiswa'))
              <div class="read-more"><a href="{{url('login')}}"><i class="bi bi-arrow-right"></i> Lihat Sekolah</a></div>
              @else
              <div class="read-more"><a href="{{url('detail-sekolah/'.$nama.'/'.Crypt::encrypt($sekolah->id_sekolah))}}"><i class="bi bi-arrow-right"></i> Lihat Sekolah</a></div>
              @endif
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
      <h2>Sekolah SMP Di Kecamatan {{$kecamatan}}</h2>
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
      <?php if ($list_sekolah_smp->count() == 0) { ?>
        <div class="col-lg-12 d-flex justify-content-center">
          Tidak ada sekolah SMP
        </div>
      <?php }else{ ?>
      @foreach ($list_sekolah_smp as $sekolah)
      <?php
          $jud = $sekolah->nama_sekolah;
          $string = str_replace(array('[\', \']'), '', $jud);
          $string = preg_replace('/\[.*\]/U', '', $jud);
          $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $jud);
          $string = htmlentities($jud, ENT_COMPAT, 'utf-8');
          $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $jud );
          $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $jud);
          $nama = strtolower(trim($string, '-'));
        ?>
      <div class="col-md-6 d-flex align-items-stretch mt-4">
        <div class="card" style="background-image: url('{{asset('imageUpload/sekolah/'.$sekolah->foto)}}');" data-aos="fade-up" data-aos-delay="100">
          <div class="card-body">
            <h5 class="card-title"><a href="">{{ $sekolah->nama_sekolah }}</a></h5>
            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua.</p> -->
            @if(!Session::get('loginsiswa'))
              <div class="read-more"><a href="{{url('login')}}"><i class="bi bi-arrow-right"></i> Lihat Sekolah</a></div>
              @else
              <div class="read-more"><a href="{{url('detail-sekolah/'.$nama.'/'.Crypt::encrypt($sekolah->id_sekolah))}}"><i class="bi bi-arrow-right"></i> Lihat Sekolah</a></div>
              @endif
          </div>
        </div>
      </div>
      @endforeach
    <?php } ?>
    </div>
  </div>
</section>
<section id="features" class="features">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Kecamatan</h2>
      <p>Lihat sekolah berdasarkan kecamatan yang ada di Indramayu</p>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="300">
      @foreach ($list_kecamatan as $kecamatan)
      <?php $jum_sekolah = \App\Sekolah::where(['id_kec' => $kecamatan->id_kec])->get(); ?>
      <div class="col-lg-3 col-md-3 mt-3 mt-md-2">
        <div class="icon-box">
          <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
          <h3><a href="{{url('kecamatan/'.strtolower($kecamatan->nama_kec).'/'.Crypt::encrypt($kecamatan->id_kec))}}">{{$kecamatan->nama_kec}} ({{$jum_sekolah->count()}})</a></h3>
        </div>
      </div>
      @endforeach

    </div>

  </div>
</section>
@endsection