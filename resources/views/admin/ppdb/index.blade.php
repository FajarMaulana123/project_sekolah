@extends('template')
@section('content')
<div class="content-wrapper mt-2">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Form PPDB</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">PPDB</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Form PPDB</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ url('/ppdb/update') }}">
              @csrf
              <input type="hidden" value="{{$id->id_sekolah}}" name="id_sekolah">
              <div class="card-body">
                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <select class="form-control" name="tahun_ajaran">
                        <option value="">Pilih Tahun Ajaran</option>
                        @foreach($data as $val)
                        <option value="{{$val->tahun_ajaran}}" <?php if ($ppdb['tahun_ajaran'] == $val->tahun_ajaran) { echo 'selected'; }?>>{{$val->tahun_ajaran}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="dayatampung">Daya Tampung</label>
                  <input type="text" class="form-control" id="dayatampung" placeholder="Enter tahun ajaran" name="daya_tampung" value="{{$ppdb['daya_tampung']}}" required>
                </div>
                <div class="form-group">
                  <label for="jml_diterima">Jumlah diterima</label>
                  <input type="text" class="form-control" id="jml_diterima" placeholder="Enter tahun ajaran" name="jml_diterima" value="{{$ppdb['jml_diterima']}}" required>
                </div>
                <div class="form-group">
                  <label for="tgl_mulai">Tanggal Mulai</label>
                  <input type="date" class="form-control" id="tgl_mulai" placeholder="Enter tahun ajaran" name="tgl_mulai" value="{{$ppdb['tgl_mulai']}}" required>
                </div>
                <div class="form-group">
                  <label for="tgl_berakhir">Tanggal Berakhir</label>
                  <input type="date" class="form-control" id="tgl_berakhir" placeholder="Enter tahun ajaran" name="tgl_berakhir" value="{{$ppdb['tgl_berakhir']}}" required>
                </div>
                
                
                <!-- <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
              </div> -->
              <!-- /.card-body -->

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