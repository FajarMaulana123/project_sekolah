<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="{{asset('general/css/log.css')}}" rel="stylesheet">
<div class="wrapper fadeInDown">
  <div id="formContents">
    <div id="formFooter">
      <a class="underlineHover" style="color: grey">Halo Calon Siswa, Silahkan pilih Jalur Pendaftaran!</a>
    </div>
    <h5 style="font-family: 'Open Sans', sans-serif; text-align: left; margin-left: 50px; margin-top: 20px;"><b>Pilih Jalur Pendaftaran</b></h5>
    <?php
      $zonasi = "zonasi"; ?>
      
        <a class="btn btn-primary fadeIn fourth hyuwan-hyu-re" href="{{url('jalur-pendaftaran/'.$zonasi.'/update/'.Crypt::encrypt($id_sekolah))}}" style="color: black;">
      
      <div>
        <table>
          <tr>
            <td>
              <img src="{{asset('imageUpload/zonasi.png')}}" width="70">
            </td>
            <td style="width: 270px;">
              <p style="font-family: 'Open Sans', sans-serif;font-size: 14px; color: black; margin-top: 10px; margin-left: 10px;"><b>Zonasi</b></p>
            </td>
            <td><i class="fa fa-chevron-right" ></i></td>
          </tr>
        </table>
      </div>
    </a>
    <?php if ($siswa->tingkat != "Tidak ada") { ?>
      <?php
        $prestasi = "prestasi";
        if ($siswa->sertifikat1 == null && $siswa->sertifikat2 == null && $siswa->sertifikat3 == null) { ?>
        <a class="btn btn-primary fadeIn fourth hyuwan-hyu-re" style="color: black; margin-top: -10px;" href="{{url('jalur-pendaftaran/'.$prestasi.'/'.Crypt::encrypt($id_sekolah))}}">
      <?php }else{ ?>
        <a class="btn btn-primary fadeIn fourth hyuwan-hyu-re" style="color: black; margin-top: -10px;" href="{{url('jalur-pendaftaran/'.$prestasi.'/update/'.Crypt::encrypt($id_sekolah))}}">
      <?php } ?>
        <div>
          <table>
            <tr>
              <td>
                <img src="{{asset('imageUpload/prestasi.png')}}" width="70">
              </td>
              <td style="width: 270px;">
                <p style="font-family: 'Open Sans', sans-serif;font-size: 14px; color: black; margin-top: 10px; margin-left: 10px;"><b>Prestasi</b></p>
              </td>
              <td><i class="fa fa-chevron-right" ></i></td>
            </tr>
          </table>
        </div>
      </a>
    <?php } ?>
    <?php
      $perpindahan = "perpindahan-orang-tua";
      if ($siswa->perpindahan == null) { ?>
      <a class="btn btn-primary fadeIn fourth hyuwan-hyu-re" style="color: black; margin-top: -10px;" href="{{url('jalur-pendaftaran/'.$perpindahan.'/'.Crypt::encrypt($id_sekolah))}}">
    <?php }else{ ?>
      <a class="btn btn-primary fadeIn fourth hyuwan-hyu-re" style="color: black; margin-top: -10px;" href="{{url('jalur-pendaftaran/'.$perpindahan.'/update/'.Crypt::encrypt($id_sekolah))}}">
    <?php } ?>
      <div>
        <table>
          <tr>
            <td>
              <img src="{{asset('imageUpload/perpindahan.png')}}" width="70">
            </td>
            <td style="width: 270px;">
              <p style="font-family: 'Open Sans', sans-serif;font-size: 14px; color: black; margin-top: 10px; margin-left: 10px;"><b>Perpindahan Orang Tua</b></p>
            </td>
            <td><i class="fa fa-chevron-right" ></i></td>
          </tr>
        </table>
      </div>
    </a>

    <?php
      $afirmasi = "afirmasi";
      if ($siswa->afirmasi == null) { ?>
      <a class="btn btn-primary fadeIn fourth hyuwan-hyu-re" style="color: black; margin-top: -10px;" href="{{url('jalur-pendaftaran/'.$afirmasi.'/'.Crypt::encrypt($id_sekolah))}}">
    <?php }else{ ?>
      <a class="btn btn-primary fadeIn fourth hyuwan-hyu-re" style="color: black; margin-top: -10px;" href="{{url('jalur-pendaftaran/'.$afirmasi.'/update/'.Crypt::encrypt($id_sekolah))}}">
    <?php } ?>
      <div>
        <table>
          <tr>
            <td>
              <img src="{{asset('imageUpload/tidakmampu.png')}}" width="70">
            </td>
            <td style="width: 270px;">
              <p style="font-family: 'Open Sans', sans-serif;font-size: 14px; color: black; margin-top: 10px; margin-left: 10px;"><b>Afirmatif</b></p>
            </td>
            <td><i class="fa fa-chevron-right" ></i></td>
          </tr>
        </table>
      </div>
    </a>
    
  </div>
</div>