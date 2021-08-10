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
      <a class="underlineHover" style="color: grey">Kosongkan password jika tidak ingin diubah!</a>
    </div>
    @if ($message = Session::get('warning'))
    <div class="alert alert-danger alert-block" style="margin-right: 40px; margin-left: 40px; margin-top: 20px;">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
    </div>
    @endif
    <form action="{{url('update-emailpass')}}" method="post">
      @csrf
      <input type="hidden" id="nama" class="fadeIn second" name="nama" value="{{$nama}}">
      <input type="text" id="email" class="fadeIn second" name="email" placeholder="Masukan Email" value="{{$mail}}" required>
      <input type="password" id="password" class="fadeIn second" name="password" placeholder="Masukan password">
      <input type="password" id="cpassword" class="fadeIn second" name="cpassword" placeholder="Masukan konfirmasi password">
      <input type="submit" class="fadeIn fourth" value="Simpan" onclick="myFunction()">
    </form>
    <div id="formFooter">
      <a class="underlineHover" href="{{url('login')}}">Kembali</a>
    </div>
  </div>
</div>
<script>
   function myFunction() {
      var pass = document.getElementById('password').value;
      var cpass = document.getElementById('cpassword').value;
      if (cpass != pass) {
         confirm("Konfirmasi password tidak sama!");
      }
   }
</script>
@include('partials.js')
