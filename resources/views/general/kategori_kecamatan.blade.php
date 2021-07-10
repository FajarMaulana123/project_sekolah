@extends('template_general')
@section('contents')
<section id="services" class="services"></section>
<section id="services" class="services" style="margin-top: -30px;">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Sekolah SD Di Kecamatan</h2>
      <p>Segera Daftarkan Diri Kamu Sebelum Pendaftaran Ditutup!</p>
    </div>

  </div>
</section>
<section id="portfolio" class="portfolio" style="margin-top: -80px;">
  <div class="container">
    <div class="row" data-aos="fade-up" data-aos-delay="200">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <a href="#more-services-sd"><li data-filter="*" class="filter-active">SD</li></a>
          <a href="#more-services-smp"><li data-filter=".filter-card">SMP</li></a>
        </ul>
      </div>
    </div>
  </div>
</section>
<section id="more-services-sd" class="more-services" >
  <div class="container">
    <div class="row">
      <div data-aos="fade-up">
      </div>
      @foreach ($list_sekolah as $sekolah)
      <div class="col-md-6 d-flex align-items-stretch mt-4">
        <div class="card" style="background-image: url('{{asset('imageUpload/sekolah/'.$sekolah->foto)}}');" data-aos="fade-up" data-aos-delay="100">
          <div class="card-body">
            <h5 class="card-title"><a href="">{{ $sekolah->nama_sekolah }}</a></h5>
            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua.</p> -->
            <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Lihat Sekolah</a></div>
          </div>
        </div>
      </div>

      @endforeach
    </div>
  </div>
</section>
<section id="services" class="services" style="margin-top: -30px;">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Sekolah SMP Di Kecamatan</h2>
      <p>Segera Daftarkan Diri Kamu Sebelum Pendaftaran Ditutup!</p>
    </div>

  </div>
</section>
<section id="portfolio" class="portfolio" style="margin-top: -80px;">
  <div class="container">
    <div class="row" data-aos="fade-up" data-aos-delay="200">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <a href="#more-services-sd"><li data-filter="*">SD</li></a>
          <a href="#more-services-smp"><li data-filter=".filter-card" class="filter-active">SMP</li></a>
        </ul>
      </div>
    </div>
  </div>
</section>
<section id="more-services-smp" class="more-services" >
  <div class="container">
    <div class="row">
      <div data-aos="fade-up">
      </div>
      @foreach ($list_sekolah as $sekolah)
      <div class="col-md-6 d-flex align-items-stretch mt-4">
        <div class="card" style="background-image: url('{{asset('imageUpload/sekolah/'.$sekolah->foto)}}');" data-aos="fade-up" data-aos-delay="100">
          <div class="card-body">
            <h5 class="card-title"><a href="">{{ $sekolah->nama_sekolah }}</a></h5>
            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua.</p> -->
            <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Lihat Sekolah</a></div>
          </div>
        </div>
      </div>

      @endforeach
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
      <div class="col-lg-3 col-md-3 mt-3 mt-md-2">
        <div class="icon-box">
          <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
          <h3><a href="">{{$kecamatan->nama_kec}}</a></h3>
        </div>
      </div>
      @endforeach

    </div>

  </div>
</section>
@endsection