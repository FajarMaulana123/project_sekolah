@extends('template')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Prestasi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Prestasi</li>
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
          <div id="swalDefaultSuccess"></div>
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
                  <p>List Prestasi</p>
                </div>
                <div class="col-sm-6 ">
                  <a type="submit" class="btn btn-info btn-sm float-sm-right" href="{{url('prestasi/create')}}" style="color: white"><i class="fa fa-plus"></i> Tambah Prestasi</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Kelola</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1 ?>
                  @foreach ($list_pres as $data)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->judul}}</td>
                    <td>{!!$data->deskripsi!!}</td>
                    <td>
                      <a type="submit" class="btn btn-warning btn-sm " href="{{ url('/prestasi/'.$data->id_prestasi.'/edit') }}"><i class="fa fa-edit"></i> Edit</a>
                      <a type="submit" class="btn btn-danger btn-sm " href="{{ url('/prestasi/'.$data->id_prestasi) }}" onclick="return confirm('Yakin data akan dihapus?')"><i class="fa fa-trash"></i> Hapus</a>
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
@endsection
