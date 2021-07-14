@extends('template_general')
@section('contents')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<section id="faq" class="faq" style="margin-top: 60px;">
<style type="text/css">
  .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <?php $nama_sekolah = strtoupper($sekolah->nama_sekolah);?>
      <h2>{{$nama_sekolah}}</h2>
    </div>

    <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-3" style="background-color: #fff; max-height: 100%; padding: 20px; border-color: #f4f4f4;border-style: solid;">
        <a href="{{asset('imageUpload/logo/'.$sekolah->logo)}}" target="_blank"><img src="{{asset('imageUpload/logo/'.$sekolah->logo)}}" width="140" class="rounded-circle center"></a>
        <p style="margin-top: 40px; margin-bottom: -3px;">Kepala Sekolah</p>
        <h4 style="margin-left: -1px;">{{$sekolah->nama_kps}}</h4>

        <p style="margin-top: 10px; margin-bottom: -3px;">Email</p>
        <h4 style="margin-left: -1px;">{{$sekolah->email}}</h4>

        <p style="margin-top: 10px; margin-bottom: -3px;">No Hp</p>
        <h4 style="margin-left: -1px;">{{$sekolah->nohp}}</h4>

        <p style="margin-top: 10px; margin-bottom: -3px;">Tingkat</p>
        <h4 style="margin-left: -1px;">{{$sekolah->tingkat}}</h4>

        <p style="margin-top: 10px; margin-bottom: -3px;">Alamat</p>
        <h4 style="margin-left: -1px;">{{$sekolah->alamat}}</h4>
      </div>
      <div class="col-lg-9">
        <a href="{{asset('imageUpload/sekolah/'.$sekolah->foto)}}" target="_blank"><img src="{{asset('imageUpload/sekolah/'.$sekolah->foto)}}" style="width: 100%;"></a>
        <p>
          {!!$sekolah->deskripsi!!}
        </p>

        <h3>Visi & Misi</h3>
        <hr>
        <p>
          {!!$sekolah->visimisi!!}
        </p>

        <h3 style="margin-top: 50px;">Prestasi</h3>
        <hr>
        <ol>
          
          @foreach ($prestasi as $pres)
              <li><h6>{{$pres->judul}}</h6></li>
              <p style="font-size: 14px;">{!!$pres->deskripsi!!}</p>
          @endforeach
        </ol>

        <h3 style="margin-top: 50px;">Info Lainnya</h3>
        <hr>
        <div class="row">
          <div class="col-md-4">
            <p>Daya Tampung</p>
            <h5>{{$sekolah->daya_tampung}}</h5>
          </div>
          <div class="col-md-4">
            <p>Jumlah Diterima</p>
            <h5>{{$sekolah->jml_diterima}}</h5>
          </div>
          <div class="col-md-4">
            <p>Dokumen Sekolah</p>
            <a href="{{asset('bukti/'.$sekolah->bukti)}}" target="_blank">{{$sekolah->bukti}}</a>
          </div>
        </div>

      </div>
    </div>
    <?php
          $jud = $siswa->nama;
          $string = str_replace(array('[\', \']'), '', $jud);
          $string = preg_replace('/\[.*\]/U', '', $jud);
          $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $jud);
          $string = htmlentities($jud, ENT_COMPAT, 'utf-8');
          $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $jud );
          $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $jud);
          $nama = strtolower(trim($string, '-'));
        ?>
    <?php if ($siswa->tempat == NULL && $siswa->tgl_lahir == NULL && $siswa->asal_sekolah == NULL && $siswa->alamat == NULL && $siswa->nohp == NULL && $siswa->foto == NULL && $siswa->akte == NULL && $siswa->ijazah == NULL && $siswa->skhun == NULL && $siswa->kk == NULL) { ?>
      <a href="{{url('profile/'.$nama)}}" class="back-to-daftar d-flex align-items-center justify-content-center">Daftar Sekarang</a>
    <?php }else{ ?>
      <a href="{{url('jalur-pendaftaran')}}" class="back-to-daftar d-flex align-items-center justify-content-center">Daftar Sekarang</a>
    <?php } ?>
  </div>
</section>
@endsection