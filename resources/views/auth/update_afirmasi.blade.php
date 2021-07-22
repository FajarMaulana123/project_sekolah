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
      <a class="underlineHover" style="color: grey">SKTM sudah ada!</a>
    </div>
    
    @if ($message = Session::get('warning'))
    <div class="alert alert-danger alert-block" style="margin-right: 40px; margin-left: 40px; margin-top: 20px;">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
    </div>
    @endif
    <input type="hidden" name="id_siswa" value="{{$siswa->id_siswa}}">
    <label style="margin-top: 10px; text-align: left;"><h5 style="font-family: 'Open Sans', sans-serif; margin-top: 20px;"><b>Update SKTM?</b></h5></label><br>
    <a href="{{asset('imageUpload/dokumen/'.$siswa->afirmasi)}}" target="_blank"><img src="{{asset('imageUpload/dokumen/'.$siswa->afirmasi)}}" width="200" ></a>
    <a href="{{url('data-diri/'.$jalur.'/'.Crypt::encrypt($id_sekolah))}}" class="fadeIn fourth hyuwan-a" style="color: white" >Tidak, Lanjutkan</a>
    <a href="{{url('jalur-pendaftaran/'.$jalur.'/'.Crypt::encrypt($id_sekolah))}}" class="fadeIn fourth hyuwan-b" value="Update" style=" margin-top: -30px; color: white;">Update</a>
  </div>
</div>
@include('partials.js')
