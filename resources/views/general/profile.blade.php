@extends('template_general')
@section('contents')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<section id="contact" class="contact" style="margin-top: 60px;">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Profile </h2>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row" style="margin-top:20px;">

      <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="300">
        <form method="post" action="{{ url('editsiswa') }}" enctype="multipart/form-data"  role="form">
          @csrf
          <input type="hidden" name="id_siswa"  value="{{$siswa->id_siswa}}" >
          <div class="row" style="margin-top:20px;">
            <div class="col-md-6">
              <div class="form-group">
                <?php if ($siswa->nama == null) { ?>
                  <label style="color: red">Nama Lengkap*</label>
                <?php }else{ ?>
                  <label >Nama Lengkap</label>
                <?php } ?>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama" value="{{$siswa->nama}}" >
              </div>
            </div>
            <div class="col-md-6">
              <?php if ($siswa->email == null) { ?>
                <label style="color: red">Email*</label>
              <?php }else{ ?>
                <label >Email</label>
              <?php } ?>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" value="{{$siswa->email}}" disabled>
              </div>
            </div>
          </div>
          <div class="row" style="margin-top:20px;">
            <div class="col-md-3">
              <div class="form-group">
                <?php if ($siswa->tempat == null) { ?>
                  <label style="color: red">Tempat Lahir*</label>
                <?php }else{ ?>
                  <label >Tempat Lahir</label>
                <?php } ?>
                <input type="text" name="tempat" class="form-control" id="tempat" placeholder="Masukan Tempat Lahir" value="{{$siswa->tempat}}" >
              </div>
            </div>
            <div class="col-md-3">
              <?php if ($siswa->tgl_lahir == null) { ?>
                <label style="color: red">Tanggal Lahir*</label>
              <?php }else{ ?>
                <label >Tanggal Lahir</label>
              <?php } ?>
              <div class="form-group">
                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Masukan Tanggal Lahir" value="{{$siswa->tgl_lahir}}">
              </div>
            </div>
            <div class="col-md-6">
              <?php if ($siswa->nohp == null) { ?>
                <label style="color: red">No Hp*</label>
              <?php }else{ ?>
                <label >No Hp</label>
              <?php } ?>
              <div class="form-group">
                <input type="number" class="form-control" name="nohp" id="nohp" placeholder="Masukan No Hp" value="{{$siswa->nohp}}">
              </div>
            </div>
          </div>
          <div class="row" style="margin-top:20px;">
            <div class="col-md-6">
              <div class="form-group">
                <?php if ($siswa->asal_sekolah == null) { ?>
                  <label style="color: red">Asal Sekolah*</label>
                <?php }else{ ?>
                  <label >Asal Sekolah</label>
                <?php } ?>
                <input type="text" name="asal_sekolah" class="form-control" id="asal_sekolah" placeholder="Masukan Asal Sekolah" value="{{$siswa->asal_sekolah}}" >
              </div>

              <div class="row" style="margin-top:20px;">
                <div class="col-md-6">
                  <div class="form-group">
                    <?php if ($siswa->ijazah == null) { ?>
                      <label style="color: red">Scan Ijazah*</label>
                    <?php }else{ ?>
                      <label >Scan Ijazah</label>
                    <?php } ?>
                    <input type="file" name="ijazah" class="form-control" value="{{$siswa->ijazah}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php if ($siswa->skhun == null) { ?>
                      <label style="color: red">Scan SKHUN*</label>
                    <?php }else{ ?>
                      <label >Scan SKHUN</label>
                    <?php } ?>
                    <input type="file" name="skhun" class="form-control" value="{{$siswa->skhun}}">
                  </div>
                </div>
              </div>
              <div class="row" style="margin-top:20px;">
                <div class="col-md-6">
                  <div class="form-group">
                    <?php if ($siswa->akte == null) { ?>
                      <label style="color: red">Scan Akte*</label>
                    <?php }else{ ?>
                      <label >Scan Akte</label>
                    <?php } ?>
                    <input type="file" name="akte" class="form-control" value="{{$siswa->akte}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php if ($siswa->kk == null) { ?>
                      <label style="color: red">Scan Kartu Keluarga*</label>
                    <?php }else{ ?>
                      <label >Scan Kartu Keluarga</label>
                    <?php } ?>
                    <input type="file" name="kk" class="form-control" value="{{$siswa->kk}}">
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-6">
              <?php if ($siswa->alamat == null) { ?>
                <label style="color: red">Alamat*</label>
              <?php }else{ ?>
                <label >Alamat</label>
              <?php } ?>
              <div class="form-group">
                <textarea class="form-control" name="alamat" rows="9" placeholder="Masukan Alamat..." >{{$siswa->alamat}}</textarea>
              </div>
            </div>
            <div class="row" style="margin-top:20px;">
              <div class="col-md-4">
                <div class="form-group">
                  <?php if ($siswa->sertifikat1 == null) { ?>
                    <label style="color: red">Scan Sertifikat 1*</label>
                  <?php }else{ ?>
                    <label >Scan Sertifikat 1</label>
                  <?php } ?>
                  <input type="file" name="sertifikat1" class="form-control" value="{{$siswa->sertifikat1}}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <?php if ($siswa->sertifikat2 == null) { ?>
                    <label style="color: red">Scan Sertifikat 2*</label>
                  <?php }else{ ?>
                    <label >Scan Sertifikat 2</label>
                  <?php } ?>
                  <input type="file" name="sertifikat2" class="form-control" value="{{$siswa->sertifikat2}}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <?php if ($siswa->sertifikat3 == null) { ?>
                    <label style="color: red">Scan Sertifikat 3*</label>
                  <?php }else{ ?>
                    <label >Scan Sertifikat 3</label>
                  <?php } ?>
                  <input type="file" name="sertifikat3" class="form-control" value="{{$siswa->sertifikat3}}">
                </div>
              </div>
            </div>
          </div>
          
          
          <div class="text-center" style="float: right; margin-top: 20px;">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>

    </div>

  </div>
</section>
@endsection
@include('partials.js')