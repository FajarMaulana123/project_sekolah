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
  <div id="formContent" style="font-family: 'Open Sans', sans-serif; text-align: left;">
    <div id="formFooter">
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-danger alert-block" style="margin-right: 40px; margin-left: 40px; margin-top: 20px;">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
    </div>
    @endif
    <h5 style="margin-left: 35px; margin-top: 20px;"><b>Pemberitahuan!</b></h5>

    <p style="margin-left: 35px; margin-top: 20px;">Pendaftaran sekolah di {{$sekolah->nama_sekolah}} lewat jalur {{$jalur}} Berhasil!. Silahkan cek di hasil seleksi untuk pemberitahuan selanjutnya</p>

    <a type="submit" href="{{url('/')}}" class="btn btn-primary" style="float: right; color: white; margin-top: 30px; margin-bottom: 30px; margin-right: 20px;">Oke</a>
  </div>
</div>
@include('partials.js')
