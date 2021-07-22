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
      <a class="underlineHover" style="color: grey">Upload Surat Keterangan Tidak Mampu (SKTM)!</a>
    </div>
    <h5 style="font-family: 'Open Sans', sans-serif; text-align: left; margin-left: 35px; margin-top: 20px;"><b>Upload SKTM</b></h5>
    @if ($message = Session::get('warning'))
    <div class="alert alert-danger alert-block" style="margin-right: 40px; margin-left: 40px; margin-top: 20px;">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
    </div>
    @endif
    <form method="post" action="{{ url('addafirmasi/'.$jalur.'/'.Crypt::encrypt($id_sekolah)) }}" enctype="multipart/form-data"  role="form" style="padding-left: 40px;padding-right: 40px; text-align: left;">
      @csrf
      <input type="hidden" name="id_siswa" value="{{$siswa->id_siswa}}">
      <?php if ($siswa->afirmasi != null) { ?>
        <br>
        <a href="{{asset('imageUpload/dokumen/'.$siswa->afirmasi)}}" target="_blank"><img src="{{asset('imageUpload/dokumen/'.$siswa->afirmasi)}}" width="80" ></a>
      <?php } ?>
      <input type="file" id="afirmasi" class="fadeIn second form-control mt-2" name="afirmasi" placeholder="Upload SKTM">
      
      <input type="submit" class="fadeIn fourth" value="Upload" style="margin-left: 25%;">
    </form>
  </div>
</div>
@include('partials.js')
