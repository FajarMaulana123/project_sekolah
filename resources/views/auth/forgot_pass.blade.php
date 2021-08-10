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
      <a class="underlineHover" style="color: grey">Dapatkan akun kamu kembali!</a>
    </div>
    <h5 style="font-family: 'Open Sans', sans-serif; text-align: left; margin-left: 35px; margin-top: 20px;"><b>Lupa Password?</b></h5>
    @if ($message = Session::get('warning'))
    <div class="alert alert-danger alert-block" style="margin-right: 40px; margin-left: 40px; margin-top: 20px;">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
    </div>
    @endif
    <form action="{{url('forgot-password')}}" method="post">
      @csrf
      <input type="text" id="email" class="fadeIn second" name="email" placeholder="Masukan Email" value="{{ old('email') }}" required>
      <input type="text" id="question" class="fadeIn second" name="question" placeholder="Masukan Question" value="{{ old('question') }}" required>
      <input type="text" id="answer" class="fadeIn second" name="answer" placeholder="Masukan Answer" value="{{ old('answer') }}" required>
      <input type="submit" class="fadeIn fourth" value="Lanjutkan">
    </form>
    <div id="formFooter">
      <a class="underlineHover" href="{{url('login')}}">Kembali</a>
    </div>
  </div>
</div>
@include('partials.js')
