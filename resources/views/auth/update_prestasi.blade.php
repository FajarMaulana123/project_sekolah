<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="{{asset('general/css/log.css')}}" rel="stylesheet">
<style type="text/css">
  a {
    color: #92badd;
    display:inline-block;
    text-decoration: none;
    font-weight: 400;
  }
</style>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <div id="formFooter">
      <a class="underlineHover" style="color: grey">Sertifikat sudah ada!</a>
    </div>
    
    @if ($message = Session::get('warning'))
    <div class="alert alert-danger alert-block" style="margin-right: 40px; margin-left: 40px; margin-top: 20px;">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
    </div>
    @endif
    <input type="hidden" name="id_siswa" value="{{$siswa->id_siswa}}">
    <label style="margin-top: 10px; text-align: left;"><h5 style="font-family: 'Open Sans', sans-serif; margin-top: 20px;"><b>Update Sertifikat?</b></h5></label><br>
    <?php if ($siswa->sertifikat1 != null) { ?>
      <a href="{{asset('imageUpload/dokumen/'.$siswa->sertifikat1)}}" target="_blank"><img src="{{asset('imageUpload/dokumen/'.$siswa->sertifikat1)}}" width="200" ></a>
    <?php } ?>
    <?php if ($siswa->sertifikat2 != null) { ?>
      <a href="{{asset('imageUpload/dokumen/'.$siswa->sertifikat2)}}" target="_blank"><img src="{{asset('imageUpload/dokumen/'.$siswa->sertifikat2)}}" width="200" ></a>
    <?php } ?>
    <?php if ($siswa->sertifikat3 != null) { ?>
      <a href="{{asset('imageUpload/dokumen/'.$siswa->sertifikat3)}}" target="_blank" class="mt-2"><img src="{{asset('imageUpload/dokumen/'.$siswa->sertifikat3)}}" width="200" ></a>
    <?php } ?>

    <a href="{{url('data-diri/'.$jalur.'/'.Crypt::encrypt($id_sekolah))}}" class="fadeIn fourth hyuwan-a" style="color: white" >Tidak, Lanjutkan</a>
    <a href="{{url('jalur-pendaftaran/'.$jalur.'/'.Crypt::encrypt($id_sekolah))}}" class="fadeIn fourth hyuwan-b" value="Update" style=" margin-top: -30px; color: white;">Update</a>
  </div>
</div>
@include('partials.js')
