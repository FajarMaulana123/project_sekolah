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
      <a class="underlineHover" style="color: grey">Halo Calon Siswa, Silahkan buat akun!</a>
    </div>
    <h5 style="font-family: 'Open Sans', sans-serif; text-align: left; margin-left: 35px; margin-top: 20px;"><b>Daftar Akun Siswa</b></h5>
    @if ($message = Session::get('warning'))
    <div class="alert alert-danger alert-block" style="margin-right: 40px; margin-left: 40px; margin-top: 20px;">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
    </div>
    @endif
    <form action="{{url('akunsiswa')}}" method="post">
      @csrf
      <input type="text" id="nama" class="fadeIn second" name="nama" placeholder="Nama Lengkap" value="{{ Input::old('nama') }}" required>
      <input type="text" id="email" class="fadeIn second" name="email" placeholder="Email" value="{{ old('email') }}" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>
      <input type="password" id="cpassword" class="fadeIn third" name="cpassword" placeholder="Konfirmasi Password" required>
      <input type="submit" class="fadeIn fourth" value="Daftar">
    </form>
    <div id="formFooter">
      Sudah punya akun? <a class="underlineHover" href="{{url('login')}}">Login</a>
    </div>
  </div>
</div>
@include('partials.js')
