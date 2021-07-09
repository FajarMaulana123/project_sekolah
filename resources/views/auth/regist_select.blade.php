<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="{{asset('general/css/log.css')}}" rel="stylesheet">
<div class="wrapper fadeInDown">
  <div id="formContents">
    <div id="formFooter">
      <a class="underlineHover" style="color: grey">Selamat Datang, Silahkan pilih Pendaftaran!</a>
    </div>
    <h5 style="font-family: 'Open Sans', sans-serif; text-align: left; margin-left: 50px; margin-top: 20px;"><b>Pilih Tipe Akun</b></h5>
    <p style="font-family: 'Open Sans', sans-serif; text-align: left; margin-left: 50px;margin-right: 50px; font-size: 14px; color: grey;">Silahkan pilih, anda daftar sebagai siswa atau pemilik sekolah</p>
    <a class="btn btn-primary fadeIn fourth hyuwan-hyu" style="color: black;">
      <div>
        <table>
          <tr>
            <td>
              <img src="{{asset('imageUpload/admin.svg')}}">
            </td>
            <td style="width: 270px;">
              <p style="font-family: 'Open Sans', sans-serif;font-size: 14px; color: black; margin-top: 10px;"><b>Sebagai Pemilik Sekolah</b></p>
            </td>
            <td><i class="fa fa-chevron-right" ></i></td>
          </tr>
        </table>
      </div>
    </a>
    <a class="btn btn-primary fadeIn fourth hyuwan-hyu" style="color: black; margin-top: -10px; margin-bottom: 80px;">
      <div>
        <table>
          <tr>
            <td>
              <img src="{{asset('imageUpload/siswa.svg')}}">
            </td>
            <td style="width: 270px;">
              <p style="font-family: 'Open Sans', sans-serif;font-size: 14px; color: black; margin-top: 10px;"><b>Sebagai Siswa</b></p>
            </td>
            <td><i class="fa fa-chevron-right" ></i></td>
          </tr>
        </table>
      </div>
    </a>
    
  </div>
</div>