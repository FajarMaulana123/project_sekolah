@extends('template')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Kecamatan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Kecamatan</li>
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
                  <p>List Kecamatan</p>
                </div>
                <div class="col-sm-6 ">
                  <a type="submit" class="btn btn-info btn-sm float-sm-right" href="{{url('kecamatan/create')}}" style="color: white"><i class="fa fa-plus"></i> Tambah Kecamatan</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kecamatan</th>
                    <th>Kode Pos</th>
                    <th>Kelola</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1 ?>
                  @foreach ($list_kec as $kecamatan)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$kecamatan->nama_kec}}</td>
                    <td>{{$kecamatan->kode_pos}}</td>
                    <td>
                      <a type="submit" class="btn btn-warning btn-sm " href="{{ url('/kecamatan/'.$kecamatan->id_kec.'/edit') }}"><i class="fa fa-edit"></i> Edit</a>
                      <a type="submit" class="btn btn-danger btn-sm " href="{{ url('/kecamatan/'.$kecamatan->id_kec) }}" onclick="return confirm('Yakin data akan dihapus?')"><i class="fa fa-trash"></i> Hapus</a>
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
