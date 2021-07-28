@extends('template')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Pendaftar</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Pendaftar</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
          </div>
          @endif
          <div class="card card-light">
            <!-- /.card-header -->
            <div class="card-header">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <p>List Data Pendaftar</p>
                </div>
                <!-- <div class="col-sm-6 ">
                  <a type="submit" class="btn btn-info btn-sm float-sm-right" href="{{url('sekolah/create')}}" style="color: white"><i class="fa fa-plus"></i> Tambah Sekolah</a>
                </div> -->
              </div>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>E-mail</th>
                    <th>Asal Sekolah</th>
                    <th>Jalur Pendaftaran</th>
                    <th>Status</th>
                    <th>Kelola</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; $i = 0;?>
                  @foreach ($data as $sekolah)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$sekolah['nama']}}</td>
                    <td>{{$sekolah['email']}}</td>
                    <td>
                      {{$sekolah['asal_sekolah']}}
                    </td>
                    <td>
                      {{$sekolah['jalur']}}
                    </td>
                    <td>
                    <form action="{{url('data_pendaftaran/status')}}" method="POST">
                    @csrf
                        <input type="hidden" name="id" value="{{$sekolah['id_pendaftaran']}}">
                        <select name="status" id="status" class="form-control" onchange="this.form.submit()">
                            <option value="0" <?php echo ($sekolah['status'] ==  '0') ? ' selected="selected"' : '';?>>Menunggu</option>
                            <option value="1" <?php echo ($sekolah['status'] ==  '1') ? ' selected="selected"' : '';?>>Di Terima</option>
                            <option value="2" <?php echo ($sekolah['status'] ==  '2') ? ' selected="selected"' : '';?>>Di Tolak</option>
                        </select>
                    </form>
                      <!-- @if ($sekolah['status'] == 1)
                      <span class="badge bg-success"><i class="fa fa-check"></i>Di Terima</span>
                      @elseif($sekolah['status'] == 2)
                      <span class="badge bg-danger">Di Tolak</span>
                      @else
                      <span class="badge bg-warning">Menunggu</span>
                      @endif -->
                    </td>
                    <td>
                    
                      <a href="#" data-toggle="modal" data-target="#modal-lg{{$no}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>
                      <a type="submit" class="btn btn-danger btn-sm " href="{{ url('/data_pendaftaran/'.$sekolah['id_pendaftaran']) }}" onclick="return confirm('Yakin data akan dihapus?')"><i class="fa fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                  <div class="modal fade" id="modal-lg{{$no}}">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Large Modal</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-3">
                              <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                  <div>
                                    <div class="text-center">
                                      <img class="profile-user-img img-fluid img-circle"
                                      src="{{asset('imageUpload/logo/'.$sekolah['logo'])}}"
                                      alt="User profile picture" >
                                    </div>
                                    <div class="form-group mt-4" style="font-size: 14px;">
                                      <label for="kps" >Nama Kepala Sekolah</label>
                                      <p style="margin-top: -10px;">{{$sekolah['nama_kps']}}</p>
                                    </div>
                                    <div class="form-group" style="font-size: 14px; margin-top: -10px;">
                                      <label for="email">Email</label>
                                      <p style="margin-top: -10px;">{{$sekolah['email']}}</p>
                                    </div>
                                    <div class="form-group" style="font-size: 14px;margin-top: -10px;">
                                      <label for="nohp">No hp</label>
                                      <p style="margin-top: -10px;">{{$sekolah['nohp']}}</p>
                                    </div>
                                    <div class="form-group" style="font-size: 14px;margin-top: -10px;">
                                      <label>Tingkat</label>
                                      <p style="margin-top: -10px;">{{$sekolah['tingkat']}}</p>
                                    </div>
                                    <div class="form-group" style="font-size: 14px;margin-top: -10px;">
                                      <label>Alamat</label>
                                      <p style="margin-top: -10px;">{{$sekolah['alamat']}}</p>
                                    </div>
                                  </div>
                                  <h3 class="profile-username text-center"></h3>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-9">
                              <div class="card">
                                <div class="card-body">
                                  <input type="hidden" name="id_sekolah" value="{{$sekolah['id_sekolah']}}">
                                  <div class="card-body">
                                    <div class="form-group">
                                      <label for="sekolah" ><h1>{{$sekolah['nama_sekolah']}}</h1></label>
                                    </div>
                                    <hr style="height: 1px;">
                                    <div class="form-group">
                                      <label><h4>Visi & Misi Sekolah</h4></label>
                                      <hr>
                                      <p>{!!$sekolah['visimisi']!!}</p>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <label><h4>Deskripsi Sekolah</h4></label>
                                      <hr>
                                      <p>{!!$sekolah['deskripsi']!!}</p>
                                    </div>
                                    <hr>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="daya_tampung">Daya Tampung</label>
                                          <div class="inner">
                                            <h3>{{$sekolah['daya_tampung']}}</h3>
                                          </div>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="jml_diterima">Jumlah Diterima</label>
                                            <div class="inner">
                                              <h3>{{$sekolah['jml_diterima']}}</h3>
                                          </div>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="exampleInputFile">Dokumen sekolah</label><br>
                                            <a target="_blank" href="{{asset('bukti/'.$sekolah['bukti'])}}">{{$sekolah['bukti']}}</a>
                                          </div>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <label for="exampleInputFile"><h3>Foto sekolah</h3></label><br>
                                            <a target="_blank" href="{{asset('imageUpload/sekolah/'.$sekolah['foto'])}}"><img src="{{asset('imageUpload/sekolah/'.$sekolah['foto'])}}" alt=""  style="width: 80%"></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div><!-- /.card-body -->
                              </div>
                              <!-- /.card -->
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </tbody>  
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection

@section('js')
<script type="text/javascript">
  // $('document').ready(function (){
  //     var data = ;
  //     var isi = '';
  //     for(var i = 0; i < data.length; i++){
  //     // console.log(data[i]['nama_sekolah']);
  //     isi += `<p>`+data[i]['nama_sekolah']+`</p>`;
  //     $('#o'+i).html(isi);
  //     }
  //     // console.log(data);

  // });
  // function reply_click(element)
  // {
  //   $('#sekolah').html(element.getAttribute('data-sekolah-name'));
  //   var h = element.getAttribute('data-sekolah-logo');

  //   var elem = document.createElement("img");
  //   elem.setAttribute("height", "200");
  //   elem.setAttribute("width", "200");
  //   elem.setAttribute("src", "imageUpload/logo/" + h);
  //   document.getElementById("logo").appendChild(elem);


  // }
  
</script>
@endsection