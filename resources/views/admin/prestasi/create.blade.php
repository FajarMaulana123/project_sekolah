@extends('template')
@section('content')
<div class="content-wrapper mt-2">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Prestasi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Prestasi</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Tambah Prestasi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ url('prestasi/create')}}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="prestasi">Prestasi</label>
                  <input type="text" class="form-control" id="prestasi" placeholder="Enter prestasi" name="judul" required>
                </div>
                <div class="form-group">
                  <label for="deskripsi">deskripsi</label>
                  <textarea id="summernotes" placeholder="Deskripsi..." name="deskripsi"></textarea>
                </div>
               
              <div class="card-footer">
                <button type="submit" class="btn btn-secondary"><i class="fa fa-window-close"></i> Batal</button>
                <button type="submit" class="btn btn-success  "><i class="fa fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection