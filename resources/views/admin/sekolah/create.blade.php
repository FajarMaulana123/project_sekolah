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
              <h3 class="card-title">Tambah Sekolah</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ url('addsekolah') }}" enctype="multipart/form-data" >
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="sekolah">Nama Sekolah</label>
                  <input type="text" class="form-control" id="sekolah" placeholder="Masukan Nama Sekolah" name="nama_sekolah" required>
                </div>
                <div class="form-group">
                  <label for="kps">Nama Kepala Sekolah</label>
                  <input type="text" class="form-control" id="kps" placeholder="Masukan Nama Kepala Sekolah" name="nama_kps" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" placeholder="Masukan Email" name="email" required>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nohp">No hp</label>
                      <input type="text" class="form-control" id="nohp" placeholder="Masukan No hp" name="nohp" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tingkat</label>
                      <select class="form-control" name="tingkat">
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">Alamat Sekolah</label>
                  <textarea name="alamat" class="form-control" rows="3" placeholder="Masukan Alamat"></textarea>
                </div>
                <div class="form-group">
                  <label for="email">Deskripsi Sekolah</label>
                  <div class="card-body">
                    <textarea id="summernote" placeholder="Deskripsi..." name="deskripsi">
                    </textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="daya_tampung">Daya Tampung</label>
                      <input type="number" class="form-control" id="daya_tampung" placeholder="Masukan Daya Tampung" name="daya_tampung" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="jml_diterima">Jumlah Diterima</label>
                      <input type="number" class="form-control" id="jml_diterima" placeholder="Masukan Jumlah Diterima" name="jml_diterima" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputFile">Dokumen sekolah</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="bukti" required accept="application/pdf, application/msword,.doc,.docx">
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
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="logo" required accept="image/png, image/jpg, image/jpeg">
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
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="foto" required accept="image/png, image/jpg, image/jpeg">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                      <p>*jpg/jpeg/png</p>
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