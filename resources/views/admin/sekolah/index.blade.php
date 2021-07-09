@extends('template')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sekolah</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Sekolah</li>
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
                  <p>List Sekolah</p>
                </div>
                <div class="col-sm-6 ">
                  <a type="submit" class="btn btn-info btn-sm float-sm-right" href="{{url('sekolah/create')}}" style="color: white"><i class="fa fa-plus"></i> Tambah Sekolah</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Sekolah</th>
                    <th>Kepala Sekolah</th>
                    <th>Daya Tampung</th>
                    <th>Jumlah Diterima</th>
                    <th>Status</th>
                    <th>Kelola</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  @foreach ($list_sekolah as $sekolah)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$sekolah->nama_sekolah}}</td>
                    <td>{{$sekolah->nama_kps}}</td>
                    <td>{{$sekolah->daya_tampung}}</td>
                    <td>{{$sekolah->jml_diterima}}</td>
                    <td>
                      @if ($sekolah->status == 'aktif')
                      <a type="submit" class="btn btn-info btn-xs " ><i class="fa fa-check"></i>  ACC</a>
                      @else
                      <a type="submit" class="btn btn-secondary btn-xs " >Pending...</a>
                      @endif
                    </td>
                    <td>
                      @if ($sekolah->status == 'aktif')
                      <a type="submit" class="btn btn-secondary btn-sm " href="{{ url('/status_sekolah/'.$sekolah->id_user) }}">Pending...</a>
                      @else
                      <a type="submit" class="btn btn-info btn-sm " href="{{ url('/status_sekolah/'.$sekolah->id_user) }}"><i class="fa fa-check"></i> ACC</a>
                      @endif
                      <a href="#" data-toggle="modal" data-target="#modal-lg{{$no}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>
                      <a type="submit" class="btn btn-warning btn-sm " href="{{ url('/sekolah/'.$sekolah->id_kec.'/edit') }}"><i class="fa fa-edit"></i> Edit</a>
                      <a type="submit" class="btn btn-danger btn-sm " href="{{ url('/sekolah/'.$sekolah->id_kec) }}" onclick="return confirm('Yakin data akan dihapus?')"><i class="fa fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                  <div class="modal fade" id="modal-lg{{$no}}">
                    <div class="modal-dialog ">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Large Modal</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-4" style="margin-left:100px;"><p>Nama Sekolah</p></div>
                            <div>:</div>
                            <div class="col-md-4"><p>{{$sekolah->nama_sekolah}}</p></div>
                          </div>
                          <div class="row">
                            <div class="col-md-4" style="margin-left:100px;"><p>Tingkatan</p></div>
                            <div>:</div>
                            <div class="col-md-4"><p>{{$sekolah->tingkat}}</p></div>
                          </div>
                          <div class="row">
                            <div class="col-md-4" style="margin-left:100px;"><p>Nama Kepala Sekolah</p></div>
                            <div>:</div>
                            <div class="col-md-4"><p>{{$sekolah->nama_kps}}</p></div>
                          </div>
                          <div class="row">
                            <div class="col-md-4" style="margin-left:100px;"><p>E-mail</p></div>
                            <div>:</div>
                            <div class="col-md-4"><p>{{$sekolah->email}}</p></div>
                          </div>
                          <div class="row">
                            <div class="col-md-4" style="margin-left:100px;"><p>No Hp</p></div>
                            <div>:</div>
                            <div class="col-md-4"><p>{{$sekolah->nohp}}</p></div>
                          </div>
                          <div class="row">
                            <div class="col-md-4" style="margin-left:100px;"><p>Alamat</p></div>
                            <div>:</div>
                            <div class="col-md-4"><p>{{$sekolah->alamat}}</p></div>
                          </div>
                          <div class="row">
                            <div class="col-md-4" style="margin-left:100px;"><p>Deskripsi</p></div>
                            <div>:</div>
                            <div class="col-md-4"><p>{{$sekolah->deskripsi}}</p></div>
                          </div>
                          <div class="row">
                            <div class="col-md-4" style="margin-left:100px;"><p>Bukti</p></div>
                            <div>:</div>
                            <div class="col-md-4"><p>{{$sekolah->bukti}}</p></div>
                          </div>
                          <div class="row">
                            <div class="col-md-4" style="margin-left:100px;"><p>Logo</p></div>
                            <div>:</div>
                            <div class="col-md-4"><p>{{$sekolah->logo}}</p></div>
                          </div>
                          <div class="row">
                            <div class="col-md-4" style="margin-left:100px;"><p>Foto</p></div>
                            <div>:</div>
                            <div class="col-md-4"><p>{{$sekolah->foto}}</p></div>
                          </div>
                          <div class="row">
                            <div class="col-md-4" style="margin-left:100px;"><p>Daya Tampung</p></div>
                            <div>:</div>
                            <div class="col-md-4"><p>{{$sekolah->daya_tampung}}</p></div>
                          </div>
                          <div class="row">
                            <div class="col-md-4" style="margin-left:100px;"><p>Jumlah diterima</p></div>
                            <div>:</div>
                            <div class="col-md-4"><p>{{$sekolah->jml_diterima}}</p></div>
                          </div>
                        </div>
                        
                        
                        <!-- <img src="{{asset('imageUpload/sekolah/'.$sekolah->foto)}}" alt="" width="80px" height="80px">
                        <p>{{$sekolah->nama_sekolah}}</p> -->
                        
                       
                        
                        
                        
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
  //     var data = <?php echo $list_sekolah ?>;
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