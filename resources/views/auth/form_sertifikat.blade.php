<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      <a class="underlineHover" style="color: grey">Minimal upload satu sertifikat!</a>
    </div>
    <h5 style="font-family: 'Open Sans', sans-serif; text-align: left; margin-left: 35px; margin-top: 20px;"><b>Upload Sertifikat</b></h5>
    @if ($message = Session::get('warning'))
    <div class="alert alert-danger alert-block" style="margin-right: 40px; margin-left: 40px; margin-top: 20px;">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
    </div>
    @endif
    <form method="post" action="{{ url('addsertifikat/'.$jalur.'/'.Crypt::encrypt($id_sekolah)) }}" enctype="multipart/form-data"  role="form" style="padding-left: 40px;padding-right: 40px; text-align: left;">
      @csrf
      <input type="hidden" name="id_siswa" value="{{$siswa->id_siswa}}">
      <label style="margin-top: 10px;">Sertifikat 1</label>
      <?php if ($siswa->sertifikat1 != null) { ?>
        <br>
        <a href="{{asset('imageUpload/dokumen/'.$siswa->sertifikat1)}}" target="_blank"><i class="fa fa-eye"></i> Lihat Sertifikat1</a><br>
      <?php } ?>
      <input type="file" id="sertifikat1" class="fadeIn second form-control mt-2" name="sertifikat1" placeholder="Sertifikat1"  accept="application/pdf, application/msword,.doc,.docx">

      <label style="margin-top: 10px;">Sertifikat 2</label>
      <?php if ($siswa->sertifikat2 != null) { ?>
        <br>
        <a href="{{asset('imageUpload/dokumen/'.$siswa->sertifikat2)}}" target="_blank"><i class="fa fa-eye"></i> Lihat Sertifikat1</a><br>
      <?php } ?>
      <input type="file" id="sertifikat2" class="fadeIn second form-control mt-2" name="sertifikat2" placeholder="Sertifikat2"  accept="application/pdf, application/msword,.doc,.docx">

      <label style="margin-top: 10px;">Sertifikat 3</label>
      <?php if ($siswa->sertifikat3 != null) { ?>
        <br>
        <a href="{{asset('imageUpload/dokumen/'.$siswa->sertifikat3)}}" target="_blank"><i class="fa fa-eye"></i> Lihat Sertifikat1</a><br>
      <?php } ?>
      <input type="file" id="sertifikat3" class="fadeIn second form-control mt-2" name="sertifikat3" placeholder="Sertifikat3"  accept="application/pdf, application/msword,.doc,.docx">
      
      <input type="submit" class="fadeIn fourth" value="Upload" style="margin-left: 25%;">
    </form>
  </div>
</div>
@include('partials.js')
