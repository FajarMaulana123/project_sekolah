<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="{{asset('general/css/style.css')}}" rel="stylesheet">
<link href="{{asset('general/css/log.css')}}" rel="stylesheet">
<style type="text/css">
  a {
    color: #92badd;
    display:inline-block;
    text-decoration: none;
    font-weight: 400;
  }
</style>
<section id="contact" class="contact" style="margin-top: 60px;">
  <div class="wrapper fadeInDown">
    <div id="formData">
      <div id="formFooter" style="text-align: left;">
        <?php $jalur_pendaftaran = str_replace('-', ' ', $jalur) ?>
        <a class="underlineHover" style="color: grey; font-size: 18px; ">Pendaftaran Jalur {{ucfirst($jalur_pendaftaran)}}</a>
      </div>

      <form method="post" action="{{ url('pendaftaran-siswa') }}" enctype="multipart/form-data"  role="form">
        <a target="_blank" href="{{asset('imageUpload/dokumen/'.$siswa->foto)}}"><img src="{{asset('imageUpload/dokumen/'.$siswa->foto)}}" class="rounded-circle center mt-4" alt="Cinque Terre" width="250" height="250" data-aos="fade-up" data-aos-delay="300"></a>
        <div class="row" style="margin-top:20px;text-align: left; padding: 40px;">
          <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="300">
            @csrf
            <div class="row">
              <div class="col-md-5" style="background-color: #f9f9f9; padding: 20px;">

                <div class="form-group">
                  <b><label >Nama Lengkap</label></b>
                  <p style="margin-top: -10px">{{$siswa->nama}}</p>
                </div>
                <hr>
                <div class="form-group" style="margin-top: -10px">
                  <b><label >Tempat, Tgl Lahir</label></b>
                  <p style="margin-top: -10px">{{$siswa->tempat}}, {{$siswa->tgl_lahir}}</p>
                </div>
                <hr>
                <div class="form-group" style="margin-top: -10px">
                  <b><label >Jenis Kelamin</label></b>
                  <p style="margin-top: -10px">{{$siswa->jk}}</p>
                </div>
                <hr>
                <div class="form-group" style="margin-top: -10px">
                  <b><label >Agama</label></b>
                  <p style="margin-top: -10px">{{$siswa->agama}}</p>
                </div>
                <hr>
                <div class="form-group" style="margin-top: -10px">
                  <b><label >Email</label></b>
                  <p style="margin-top: -10px">{{$siswa->email}}</p>
                </div>
                <hr>
                <div class="form-group" style="margin-top: -10px">
                  <b><label >No Hp</label></b>
                  <p style="margin-top: -10px">{{$siswa->nohp}}</p>
                </div>
                <hr>
                <div class="form-group" style="margin-top: -10px">
                  <b><label >Asal Sekolah</label></b>
                  <p style="margin-top: -10px">{{$siswa->asal_sekolah}}</p>
                </div>
                <hr>
                <div class="form-group" style="margin-top: -10px">
                  <b><label >Tingkat</label></b>
                  <p style="margin-top: -10px">{{$siswa->tingkat}}</p>
                </div>
                <hr>
                <div class="form-group" style="margin-top: -10px">
                  <b><label >Ijasah & SKHUN</label></b><br>
                  <a target="_blank" href="{{asset('imageUpload/dokumen/'.$siswa->ijazah)}}"><img src="{{asset('imageUpload/dokumen/'.$siswa->ijazah)}}" width="80"></a>
                  <a target="_blank" href="{{asset('imageUpload/dokumen/'.$siswa->skhun)}}"><img src="{{asset('imageUpload/dokumen/'.$siswa->skhun)}}" width="80"></a>
                </div>
                <hr>
                <div class="form-group" style="margin-top: -10px">
                  <b><label >Akte & KK</label></b><br>
                  <a target="_blank" href="{{asset('imageUpload/dokumen/'.$siswa->akte)}}"><img src="{{asset('imageUpload/dokumen/'.$siswa->akte)}}" width="80"></a>
                  <a target="_blank" href="{{asset('imageUpload/dokumen/'.$siswa->kk)}}"><img src="{{asset('imageUpload/dokumen/'.$siswa->kk)}}" width="80"></a>
                </div>
                <hr>
                <div class="form-group" style="margin-top: -10px">
                  <b><label >Sertifikat</label></b><br>
                  <?php if ($siswa->sertifikat1 != null) { ?>
                    <a target="_blank" href="{{asset('imageUpload/dokumen/'.$siswa->sertifikat1)}}"><img src="{{asset('imageUpload/dokumen/'.$siswa->sertifikat1)}}" width="70"></a>
                  <?php } ?>
                  <?php if ($siswa->sertifikat2 != null) { ?>
                    <a target="_blank" href="{{asset('imageUpload/dokumen/'.$siswa->sertifikat2)}}"><img src="{{asset('imageUpload/dokumen/'.$siswa->sertifikat2)}}" width="70"></a>
                  <?php } ?>
                  <?php if ($siswa->sertifikat3 != null) { ?>
                    <a target="_blank" href="{{asset('imageUpload/dokumen/'.$siswa->sertifikat3)}}"><img src="{{asset('imageUpload/dokumen/'.$siswa->sertifikat3)}}" width="70"></a>
                    <?php } ?>
                </div>
                <?php if ($jalur == "perpindahan-orang-tua") { ?>
                  <hr>
                  <div class="form-group" style="margin-top: -10px">
                    <b><label >Bukti Perpindahan Ortu</label></b><br>
                    <a target="_blank" href="{{asset('imageUpload/dokumen/'.$siswa->perpindahan)}}"><img src="{{asset('imageUpload/dokumen/'.$siswa->perpindahan)}}" width="80"></a>
                  </div>
                <?php }?>
                <?php if ($jalur == "afirmasi") { ?>
                  <hr>
                  <div class="form-group" style="margin-top: -10px">
                    <b><label >SKTM</label></b><br>
                    <a target="_blank" href="{{asset('imageUpload/dokumen/'.$siswa->afirmasi)}}"><img src="{{asset('imageUpload/dokumen/'.$siswa->afirmasi)}}" width="80"></a>
                  </div>
                <?php }?>

                

              </div>
              <div class="col-md-7">
                <a target="_blank" href="{{asset('imageUpload/sekolah/'.$sekolah->foto)}}"><img src="{{asset('imageUpload/dokumen/'.$sekolah->foto)}}" style="width: 100%"></a>
                <h6 style="width: 100%; margin-top: 20px;"><b>{{$sekolah->nama_sekolah}}</b></h6>
                <hr>
                <div style="width: 100%; margin-top: 20px;">{!!$sekolah->visimisi!!}</div>
              </div>
            </div>

            <input type="hidden" name="id_sekolah" value="{{$sekolah->id_sekolah}}">
            <input type="hidden" name="id_siswa" value="{{$siswa->id_siswa}}">
            <input type="hidden" name="jalur" value="{{$jalur_pendaftaran}}">

            <button type="submit" href="" class="btn btn-primary" style="float: right; color: white;">Daftar sekarang</button>

          </div>

        </div>
      </form>

    </div>
  </div>
  @include('partials.js')
