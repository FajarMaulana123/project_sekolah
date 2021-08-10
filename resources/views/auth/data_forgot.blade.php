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
  @if($user == NULL)
    <div id="formFooter">
      <a class="underlineHover" style="color: grey">Akun tidak ditemukan!</a>
    </div>
  @else
    <div id="formFooter">
      <a class="underlineHover" style="color: grey">Segera Amankan akun anda!</a>
    </div>
    <?php $siswa = \App\Siswa::where('id_user', $user->id_user)->first(); ?>
    <h5 style="font-family: 'Open Sans', sans-serif; text-align: left; margin-left: 35px; margin-top: 20px;"><b>Halo {{$siswa->nama}}</b></h5>
    
    @if ($message = Session::get('warning'))
    <div class="alert alert-danger alert-block" style="margin-right: 40px; margin-left: 40px; margin-top: 20px;">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
    </div>
    @endif
    <form action="{{url('proses-forgot')}}" method="POST">
      @csrf
      <input type="hidden" id="id_user" class="fadeIn third" name="id_user" value="{{$user->id_user}}">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Masukan Password Baru">
      <input type="password" id="cpassword" class="fadeIn third" name="cpassword" placeholder="Masukan Konfirmasi Password">
      <input type="submit" class="fadeIn fourth" value="Lanjutkan" onclick="myFunction()">
    </form>
    @endif
  
    <div id="formFooter">
      <a class="underlineHover" href="{{url('forgot')}}">Kembali</a>
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
