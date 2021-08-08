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
<link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet">
  <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css" type="text/css">
<style type="text/css">
  .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
  body { margin: 0; padding: 0; }
  #map { position: absolute; top: 0; bottom: 0; width: 95%; margin-top: 75px;}
    #menu {
      top: 10px; 
      left: 10px;
      position: absolute;
      background: #efefef;
      padding: 10px;
      font-family: 'Open Sans', sans-serif;
    }
    .mapboxgl-popup {
      max-width: 400px;
      font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
    }
    .geocoder {
      position: absolute;
      z-index: 1;
      width: 50%;
      left: 70%;
      margin-left: -25%;
      top: 10px;
    }
    .mapboxgl-ctrl-geocoder {
      min-width: 100%;
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
    <?php if ($siswa->tingkat == "SD") { ?>
      <?php if ( $siswa->tingkat == NULL || $siswa->jk == NULL || $siswa->tempat == NULL || $siswa->tgl_lahir == NULL || $siswa->asal_sekolah == NULL || $siswa->alamat == NULL || $siswa->nohp == NULL || $siswa->foto == NULL || $siswa->akte == NULL || $siswa->ijazah == NULL || $siswa->skhun == NULL || $siswa->kk == NULL || $siswa->id_agama == NULL || $siswa->longitude == NULL || $siswa->latitude == NULL) { ?>
        <div class="alert alert-danger alert-block" data-aos="fade-up" data-aos-delay="300">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>Segera Lengkapi data diri kamu!</strong>
        </div>
      <?php } ?>
    <?php }else{ ?>
      <?php if ( $siswa->tingkat == NULL || $siswa->jk == NULL || $siswa->tempat == NULL || $siswa->tgl_lahir == NULL || $siswa->asal_sekolah == NULL || $siswa->alamat == NULL || $siswa->nohp == NULL || $siswa->foto == NULL || $siswa->akte == NULL || $siswa->kk == NULL || $siswa->id_agama == NULL || $siswa->longitude == NULL || $siswa->latitude == NULL) { ?>
        <div class="alert alert-danger alert-block" data-aos="fade-up" data-aos-delay="300">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>Segera Lengkapi data diri kamu!</strong>
        </div>
      <?php } ?>
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
                    <?php if ($siswa->id_agama == null) { ?>
                      <label style="color: red">Agama*</label>
                    <?php }else{ ?>
                      <label >Agama</label>
                    <?php } ?>
                    <div class="form-group">
                      <select class="form-control" name="id_agama">
                        <option value="" <?php if($siswa->id_agama == null) echo 'selected="selected"'; ?>>-Pilih Agama-</option>
                        @foreach($agama as $ag)
                        <option value="{{$ag->id_agama}}" <?php if($siswa->id_agama == $ag->id_agama) echo 'selected="selected"'; ?>>{{$ag->nama_agama}}</option>
                        @endforeach
                      </select>
                    </div>
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
                  <?php if ($siswa->tingkat == null) { ?>
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
              <div class="row">
                <div col-md-12>
                  <?php if ($siswa->alamat == null) { ?>
                    <label style="color: red">Alamat*</label>
                  <?php }else{ ?>
                    <label >Alamat</label>
                  <?php } ?>
                  <div class="form-group">
                    <textarea class="form-control" name="alamat" rows="9" placeholder="Masukan Alamat..." >{{$siswa->alamat}}</textarea>
                  </div>
                </div>
              </div>
              

            </div>
            <div class="col-md-6">
              
              <?php if ($siswa->longitude == null && $siswa->latitude == null) { ?>
                <label style="color: red">Titik Lokasi*</label>
              <?php }else{ ?>
                <label >Titik Lokasi</label>
              <?php } ?>
              <input type="text" class="form-control" value="{{$siswa->longitude}},{{$siswa->latitude}} " disabled="">
              <a href="{{url('maps-profile/'.$siswa->nama)}}"><div id="map"></div></a>
              <input type="hidden" name='latitude' id='lat' value="{{$siswa->latitude}}">
              <input type="hidden" name='longitude' id='lng' value="{{$siswa->longitude}}">
            </div>

              <div class="row" style="margin-top:20px;">
                <div class="col-md-3">
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
                <div class="col-md-3">
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
                <?php if ($siswa->tingkat == "SD") { ?>
                  <div class="col-md-3">
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
                  <div class="col-md-3">
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
                <?php } ?>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"
type="text/javascript"></script>
<script>
   function myFunction() {
      var latlang = document.getElementById('latlang').value;
      if (latlang == null || latlang == "") {
         alert("Pilih Lokasi terlebih dahulu !!!");
      }
   }
</script>
<script>
  var a = document.getElementById('lng').value;
    var b = document.getElementById('lat').value;
    mapboxgl.accessToken = 'pk.eyJ1IjoiaHl1d2FubmlkYSIsImEiOiJja3Jpb2Q4Y280dXY0MnZwZHVyMmlxOGVlIn0.iVbM3KengzDSkyQwpwawMQ';
    if (a == 0 | b == 0) {
      lng = 108.324936;
      lat = -6.327583;
    }else{
      lng = a;
      lat = b;
    }
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [lng, lat],
        zoom: 16
      });
    var marker = new mapboxgl.Marker()
      .setLngLat([lng, lat])
    .addTo(map);
    

    
    var geocoder = new MapboxGeocoder({
      accessToken: mapboxgl.accessToken,
      mapboxgl: mapboxgl
    });

    document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
  </script>
@endsection
@include('partials.js')