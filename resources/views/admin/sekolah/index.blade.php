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
                  <?php $no = 1 ?>
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
                      <a href="#" data-toggle="modal" onclick="reply_click(this)" data-target="#modal-lg" data-sekolah-name="{{ $sekolah->nama_sekolah }}" data-sekolah-logo="{{ $sekolah->logo }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>
                      <a type="submit" class="btn btn-warning btn-sm " href="{{ url('/sekolah/'.$sekolah->id_kec.'/edit') }}"><i class="fa fa-edit"></i> Edit</a>
                      <a type="submit" class="btn btn-danger btn-sm " href="{{ url('/sekolah/'.$sekolah->id_kec) }}" onclick="return confirm('Yakin data akan dihapus?')"><i class="fa fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
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
<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Large Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p id="sekolah"></p>
      <div id="logo"></div>
      
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection


<script type="text/javascript">
  function reply_click(element)
  {
    $('#sekolah').html(element.getAttribute('data-sekolah-name'));
    var h = element.getAttribute('data-sekolah-logo');

    var elem = document.createElement("img");
    elem.setAttribute("height", "200");
    elem.setAttribute("width", "200");
    elem.setAttribute("src", "imageUpload/logo/" + h);
    document.getElementById("logo").appendChild(elem);

    
  }
  
</script>