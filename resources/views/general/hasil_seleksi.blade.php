@extends('template_general')
@section('contents')
<section id="testimonials" class="testimonials section-bg">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
    </div>

    <div class=" swiper-container" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">

        <div class="row">

        @foreach($pendaftaran as $use)
          <div class="col-md-6">
            <div class="testimonial-wrap">
              <?php if ($use->status == 2) { ?>
                <div class="testimonial-item" style="background-color: #f9f9f9;" >
              <?php }else{ ?>
                <div class="testimonial-item" >
              <?php } ?>
                <img src="{{asset('imageUpload/logo/'.$use->logo)}}" class="testimonial-img" alt="">
                <h3>{{$use->nama_sekolah}}</h3>
                <h4>{{$use->tgl_mulai}} - {{$use->tgl_berakhir}}</h4>
                <p>
                  Kamu melakukan pendaftaran di {{$use->nama_sekolah}} lewat jalur <b>{{ucwords($use->jalur)}}</b> Tahun Ajaran {{$use->tahun_ajaran}}
                </p>
                <?php $hasil = \App\Hasilseleksi::where('id_sekolah', $use->id_sekolah)->first(); ?>
                <?php if ($use->status == 0) { ?>
                  <h4 style="float: right; color: white; background-color: grey; padding: 10px; border-radius: 5px;">Menunggu Hasil</h4>
                <?php }else if($use->status == 1){ ?>
                <a href="{{asset('imageUpload/dokumen/'.$hasil['hasil_seleksi'])}}" target="_blank">
                  <h4 style="float: right; color: white; background-color: green; padding: 10px; border-radius: 5px;">Diterima</h4>
                </a>
                <?php }else { ?>
                <a href="{{asset('imageUpload/dokumen/'.$hasil['hasil_seleksi'])}}" target="_blank">
                  <h4 style="float: right; color: white; background-color: red; padding: 10px; border-radius: 5px;">Tidak Diterima</h4>
                </a>
                <?php } ?>
                </a>
              </div>
            </div>
          </div>
        @endforeach
          

        </div>

      </div>
    </div>

  </div>
</section>
@endsection