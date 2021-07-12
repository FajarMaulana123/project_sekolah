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
    <div style="margin-bottom: 30px; margin-top: 20px;" class="fadeIn fourth">
      <a href="{{url('/')}}" style="float: left; margin-left: 35px; margin-right: -80px; margin-top: 5px;"><img src="{{asset('general/img/back.png')}}" width="30" height="25" ></a>
      <h3 style="font-family: 'Open Sans', sans-serif; text-align: center;  margin-top: 20px; "><b>Login </b></h3>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block" style="margin-right: 40px; margin-left: 40px; margin-top: 20px;">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
    </div>
    @endif
    @if ($message = Session::get('danger'))
    <div class="alert alert-danger alert-block" style="margin-right: 40px; margin-left: 40px; margin-top: 20px;">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
    </div>
    @endif
    <form action="{{url('postlogin')}}" method="post">
      @csrf
      <input type="email" id="login" class="fadeIn second" name="email" placeholder="Email" value="{{ Input::old('email') }}" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" value="{{ Input::old('password') }}" required>
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
    <a style="margin-top: -50px; margin-bottom: 20px;" class="underlineHover" href="{{url('home')}}">Lupa Password?</a>
    <div id="formFooter">
      Belum punya akun? <a class="underlineHover" href="{{url('daftar/siswa')}}">Daftar Sekarang</a>
    </div>
  </div>
</div>
@include('partials.js')