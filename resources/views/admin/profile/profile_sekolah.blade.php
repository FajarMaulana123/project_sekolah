@extends('template')
@section('content')
<div class="content-wrapper mt-2">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Sekolah</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Sekolah</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
      @endif
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
              <h3 class="card-title">Edit Sekolah</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ url('editprofile') }}" enctype="multipart/form-data" >
              @csrf
              <input type="hidden" name="id_sekolah" value="{{$data->id_sekolah}}">
              <div class="card-body">
                <div class="form-group">
                  <label for="sekolah">Nama Sekolah</label>
                  <input type="text" class="form-control" id="sekolah" placeholder="Masukan Nama Sekolah" name="nama_sekolah" value="{{$data->nama_sekolah}}">
                </div>
                <div class="form-group">
                  <label for="kps">Nama Kepala Sekolah</label>
                  <input type="text" class="form-control" id="kps" placeholder="Masukan Nama Kepala Sekolah" name="nama_kps" value="{{$data->nama_kps}}" >
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" placeholder="Masukan Email" name="email" value="{{$data->email}}">
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="nohp">No hp</label>
                      <input type="text" class="form-control" id="nohp" placeholder="Masukan No hp" name="nohp" value="{{$data->nohp}}">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tingkat</label>
                      <select class="form-control" name="tingkat">
                        <option value="SD" <?php if($data->tingkat == 'SD') echo 'selected="selected"'; ?>>SD</option>
                        <option value="SMP" <?php if($data->tingkat == 'SMP') echo 'selected="selected"'; ?>>SMP</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <select class="form-control" name="id_kec">
                        <?php foreach ($list_kec as $kec) { ?>
                          <option value="{{$kec->id_kec}}" <?php if ($kec->id_kec == $data->id_kec) echo ' selected="selected"'; ?>>{{$kec->nama_kec}}</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">Alamat Sekolah</label>
                  <textarea name="alamat" class="form-control" rows="3" placeholder="Masukan Alamat" >{{$data->alamat}}</textarea>
                </div>
                <div class="form-group">
                  <label for="email">Deskripsi Sekolah</label>
                  <div class="card-body">
                    <textarea id="summernote" placeholder="Deskripsi..." name="deskripsi">{{$data->deskripsi}}
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="visi">Visi & Misi</label>
                  <div class="card-body">
                    <textarea id="summernotes" placeholder="Visi & Misi..." name="visimisi">{{$data->visimisi}}
                    </textarea>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputFile">Dokumen sekolah</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="bukti" accept="application/pdf, application/msword,.doc,.docx">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                      <p>*pdf/docx</p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputFile">Logo Sekolah</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="logo" accept="image/png, image/jpg, image/jpeg">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                      <p>*jpg/jpeg/png</p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputFile">Foto sekolah</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="foto" accept="image/png, image/jpg, image/jpeg">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                      <p>*jpg/jpeg/png</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <a href="{{asset('bukti/'.$data->bukti)}}">{{$data->bukti}}</a>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <img src="{{asset('imageUpload/logo/'.$data->logo)}}" alt="" width="50px" height="50px">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <img src="{{asset('imageUpload/sekolah/'.$data->foto)}}" alt=""  width="50px" height="50px">
                    </div>
                  </div>
                </div>
              </div>
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