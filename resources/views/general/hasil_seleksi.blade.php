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
                  Kamu melakukan pendaftaran di {{$use->nama_sekolah}} lewat jalur <b>{{ucwords($use->jalur)}}</b> Tahun Ajaran {{$use->tahun_ajaran}} status {{$use->status}}
                </p>
                <?php 
                    $thn_ajar = date('Y') . " / ".date('Y', strtotime('+1 year'));
                    $hasil = \App\Hasilseleksi::where('id_sekolah', $use->id_sekolah)->where('tahun_ajar', $thn_ajar)->first(); ?>
                  <?php if(!$hasil) {?>
                      <h4 style="float: right; color: white; background-color: grey; padding: 10px; border-radius: 5px;">Menunggu Hasil</h4>
                  <?php }else { ?>
                    <?php if ($use->status == 0 ) { ?>
                      <h4 style="float: right; color: white; background-color: grey; padding: 10px; border-radius: 5px;">Menunggu Hasil</h4>
                    <?php }else if($use->status == 1){ ?>
                    <!-- <a href="{{asset('imageUpload/dokumen/'.$hasil['hasil_seleksi'])}}" target="_blank">
                      <h4 style="float: right; color: white; background-color: green; padding: 10px; border-radius: 5px;">Diterima</h4>
                      
                    </a> -->
                      <form method="post" action="{{url('update-baca')}}">
                        @csrf
                        <input type="hidden" name="id_sekolah" value="{{ $hasil['id_sekolah'] }}">
                        <input type="hidden" id="hasil" value="{{ $hasil['hasil_seleksi'] }}">
                        <button style="float: right;" type="submit" class="btn btn-success" onclick="show_my_receipt()">Diterima</button>
                      </form>
                    <?php }else { ?>
                    <!-- <a href="{{asset('imageUpload/dokumen/'.$hasil['hasil_seleksi'])}}" target="_blank">
                      <h4 style="float: right; color: white; background-color: red; padding: 10px; border-radius: 5px;">Tidak Diterima</h4>
                    </a> -->
                      <form method="post" action="{{url('update-baca')}}">  
                        @csrf
                        <input type="hidden" name="id_sekolah" value="{{ $hasil['id_sekolah'] }}">
                        <input type="hidden" id="hasil" value="{{ $hasil['hasil_seleksi'] }}">
                        <button style="float: right;" type="submit" class="btn btn-danger" onclick="show_my_receipt()">Tidak Diterima</button>
                      </form>
                    <?php } ?>
                  <?php } ?>
                
              </div>
            </div>
          </div>
        @endforeach
          

        </div>

      </div>
    </div>

  </div>
</section>
<script type="text/javascript">
  function show_my_receipt() {
         
         // open the page as popup //
         var x = document.getElementById("hasil").value;
         console.log(x);
         var page = "imageUpload/dokumen/"+x;
         var myWindow = window.open(page, "_blank", "");
         
         // focus on the popup //
         myWindow.focus();
         
         // if you want to close it after some time (like for example open the popup print the receipt and close it) //
         
        //  setTimeout(function() {
        //    myWindow.close();
        //  }, 1000);
        
       }
</script>
@endsection