@extends('template_general')
@section('contents')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
</style>
<section id="contact" class="contact" style="margin-top: 60px;">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Profile </h2>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block" data-aos="fade-up" data-aos-delay="300">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
    </div>
    @endif
    <?php if ($siswa->agama == NULL || $siswa->tingkat == NULL || $siswa->jk == NULL || $siswa->tempat == NULL || $siswa->tgl_lahir == NULL || $siswa->asal_sekolah == NULL || $siswa->alamat == NULL || $siswa->nohp == NULL || $siswa->foto == NULL || $siswa->akte == NULL || $siswa->ijazah == NULL || $siswa->skhun == NULL || $siswa->kk == NULL ) { ?>
      <div class="alert alert-danger alert-block" data-aos="fade-up" data-aos-delay="300">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>Segera Lengkapi data diri kamu!</strong>
      </div>
    <?php } ?>
    <form method="post" action="{{ url('editsiswa') }}" enctype="multipart/form-data"  role="form">
      <?php if ($siswa->foto == null) { ?>
        <img src="{{asset('imageUpload/default.png')}}" class="rounded-circle center" alt="Cinque Terre" width="250" height="250" data-aos="fade-up" data-aos-delay="300">
      <?php }else{ ?>
        <img src="{{asset('imageUpload/dokumen/'.$siswa->foto)}}" class="rounded-circle center" alt="Cinque Terre" width="250" height="250" data-aos="fade-up" data-aos-delay="300">
      <?php } ?>
      <input type="file" name="foto" class="form-control center mt-3" value="{{$siswa->foto}}" style="width: 250px;" data-aos="fade-up" data-aos-delay="300" accept="image/png, image/jpg, image/jpeg"> 
      <div class="row" style="margin-top:20px;">
        <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="300">

          @csrf
          <input type="hidden" name="id_siswa"  value="{{$siswa->id_siswa}}" >
          <div class="row" style="margin-top:20px;">
            <div class="col-md-6">

              <div class="row">
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
                  <div class="form-group">
                    <?php if ($siswa->agama == null) { ?>
                      <label style="color: red">Agama*</label>
                    <?php }else{ ?>
                      <label >Agama</label>
                    <?php } ?>
                    <input type="text" name="agama" class="form-control" id="agama" placeholder="Masukan Agama" value="{{$siswa->agama}}" >
                  </div>
                </div>
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
            <div class="col-md-3">
              <?php if ($siswa->jk == null) { ?>
                <label style="color: red">Jenis Kelamin*</label>
              <?php }else{ ?>
                <label >Jenis Kelamin</label>
              <?php } ?>
              <div class="form-group">
                <select class="form-control" name="jk">
                  <option value="" <?php if($siswa->jk == null) echo 'selected="selected"'; ?>>-Pilih Jenis Kelamin-</option>
                  <option value="Laki-laki" <?php if($siswa->jk == 'Laki-laki') echo 'selected="selected"'; ?>>Laki-laki</option>
                  <option value="Perempuan" <?php if($siswa->jk == 'Perempuan') echo 'selected="selected"'; ?>>Perempuan</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
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
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <?php if ($siswa->asal_sekolah == null) { ?>
                      <label style="color: red">Asal Sekolah*</label>
                    <?php }else{ ?>
                      <label >Asal Sekolah</label>
                    <?php } ?>
                    <input type="text" name="asal_sekolah" class="form-control" id="asal_sekolah" placeholder="Masukan Asal Sekolah" value="{{$siswa->asal_sekolah}}" >
                  </div>
                </div>
                <div class="col-md-6">
                  <?php if ($siswa->jk == null) { ?>
                    <label style="color: red">Tingkat Sekolah*</label>
                  <?php }else{ ?>
                    <label >Tingkat Sekolah</label>
                  <?php } ?>
                  <div class="form-group">
                    <select class="form-control" name="tingkat">
                      <option value="" <?php if($siswa->tingkat == null) echo 'selected="selected"'; ?>>-Pilih Tingkat-</option>
                      <option value="Tidak ada" <?php if($siswa->tingkat == 'Tidak ada') echo 'selected="selected"'; ?>>Tidak ada</option>
                      <option value="TK" <?php if($siswa->tingkat == 'TK') echo 'selected="selected"'; ?>>TK</option>
                      <option value="SD" <?php if($siswa->tingkat == 'SD') echo 'selected="selected"'; ?>>SD</option>
                    </select>
                  </div>
                </div>

              </div>
              <div class="row" style="margin-top:20px;">
                <div class="col-md-6">
                  <div class="form-group">
                    <?php if ($siswa->ijazah == null) { ?>
                      <label style="color: red">Scan Ijazah*</label>
                    <?php }else{ ?>
                      <label >Scan Ijazah</label><br>
                      <a href="{{asset('imageUpload/dokumen/'.$siswa->ijazah)}}" target="_blank"><i class="fa fa-eye"></i> Lihat Ijazah</a>
                    <?php } ?>

                    <input type="file" name="ijazah" class="form-control mt-2" value="{{$siswa->ijazah}}" accept="application/pdf, application/msword,.doc,.docx">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php if ($siswa->skhun == null) { ?>
                      <label style="color: red">Scan SKHUN*</label>
                    <?php }else{ ?>
                      <label >Scan SKHUN</label><br>
                      <a href="{{asset('imageUpload/dokumen/'.$siswa->skhun)}}" target="_blank"><i class="fa fa-eye"></i> Lihat SKHUN</a>
                    <?php } ?>
                    <input type="file" name="skhun" class="form-control mt-2" value="{{$siswa->skhun}}" accept="application/pdf, application/msword,.doc,.docx">
                  </div>
                </div>
              </div>
              <div class="row" style="margin-top:20px;">
                <div class="col-md-6">
                  <div class="form-group">
                    <?php if ($siswa->akte == null) { ?>
                      <label style="color: red">Scan Akte*</label>
                    <?php }else{ ?>
                      <label >Scan Akte</label><br>
                      <a href="{{asset('imageUpload/dokumen/'.$siswa->akte)}}" target="_blank"><i class="fa fa-eye"></i> Lihat Akte</a>
                    <?php } ?>
                    <input type="file" name="akte" class="form-control" value="{{$siswa->akte}}" accept="application/pdf, application/msword,.doc,.docx">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php if ($siswa->kk == null) { ?>
                      <label style="color: red">Scan Kartu Keluarga*</label>
                    <?php }else{ ?>
                      <label >Scan Kartu Keluarga</label><br>
                      <a href="{{asset('imageUpload/dokumen/'.$siswa->kk)}}" target="_blank"><i class="fa fa-eye"></i> Lihat KK</a>
                    <?php } ?>
                    <input type="file" name="kk" class="form-control" value="{{$siswa->kk}}" accept="application/pdf, application/msword,.doc,.docx">
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
                    <label >Scan Sertifikat 1</label><br>
                    <a href="{{asset('imageUpload/dokumen/'.$siswa->sertifikat1)}}" target="_blank"><i class="fa fa-eye"></i> Lihat Sertifikat1</a>
                  <?php } ?>
                  <input type="file" name="sertifikat1" class="form-control" value="{{$siswa->sertifikat1}}" accept="application/pdf, application/msword,.doc,.docx">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <?php if ($siswa->sertifikat2 == null) { ?>
                    <label style="color: red">Scan Sertifikat 2*</label>
                  <?php }else{ ?>
                    <label >Scan Sertifikat 2</label><br>
                    <a href="{{asset('imageUpload/dokumen/'.$siswa->sertifikat2)}}" target="_blank"><i class="fa fa-eye"></i> Lihat Sertifikat2</a>
                  <?php } ?>
                  <input type="file" name="sertifikat2" class="form-control" value="{{$siswa->sertifikat2}}" accept="application/pdf, application/msword,.doc,.docx">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <?php if ($siswa->sertifikat3 == null) { ?>
                    <label style="color: red">Scan Sertifikat 3*</label>
                  <?php }else{ ?>
                    <label >Scan Sertifikat 3</label><br>
                    <a href="{{asset('imageUpload/dokumen/'.$siswa->sertifikat3)}}" target="_blank"><i class="fa fa-eye"></i> Lihat Sertifikat3</a>
                  <?php } ?>
                  <input type="file" name="sertifikat3" class="form-control" value="{{$siswa->sertifikat3}}" accept="application/pdf, application/msword,.doc,.docx">
                </div>
              </div>
            </div>
          </div>
          
          
          <div class="text-center" style="float: right; margin-top: 20px;">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>

        </div>

      </div>
    </form>
  </div>
</section>
@endsection
@include('partials.js')