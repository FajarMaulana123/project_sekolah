<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Home@index');
Route::get('kecamatan/{nama}/{id}','Home@kategori');
Route::get('home','admin\HomeController@index');
Route::get('hasil-seleksi','Home@hasil_seleksi');

Route::get('terbanyak-pendaftar','Home@terbanyak_pendaftar');
Route::get('prestasi-terbanyak','Home@terbanyak_prestasi');
Route::get('terdekat','Home@terdekat');

Route::get('maps/{jalur}/{id}','Home@maps');
Route::get('maps-profile/{nama}','Home@maps_profile');
Route::post('updatetitik/{nama}', 'Home@updatetitik');

Route::get('maps-sekolah/{nama}/{id}','SekolahController@maps_sekolah');
Route::post('update-lokasi-sekolah/{nama}/{id}', 'SekolahController@update_lokasi');

Route::get('login','Auth\LoginController@index');
Route::get('daftar','Home@daftar');
Route::get('daftar/siswa','Home@daftar_siswa');
Route::get('daftar/sekolah','Home@daftar_sekolah');

Route::post('akunsiswa', 'Home@post_akunsiswa');
Route::post('akunsekolah', 'Home@post_akunsekolah');
Route::get('detail-sekolah/{nama}/{id}', 'Home@detail_sekolah');
Route::get('jalur-pendaftaran/{id}', 'Home@jalur_pendaftaran');
Route::get('profile/{nama}', 'Home@profile');
Route::post('editsiswa', 'Home@editsiswa');
Route::post('addsertifikat/{prestasi}/{id}', 'Home@addsertifikat');
Route::post('addperpindahan/{perpindahan}/{id}', 'Home@addperpindahan');
Route::post('addzonasi/{zonasi}/{id}', 'Home@addzonasi');
Route::post('addafirmasi/{afirmasi}/{id}', 'Home@addafirmasi');

Route::get('jalur-pendaftaran/{jalur}/{id}', 'Home@jalur');
Route::get('jalur-pendaftaran/{jalur}/update/{id}', 'Home@jalur_update');
Route::get('data-diri/{jalur}/{id}', 'Home@data_diri');
Route::post('pendaftaran-siswa', 'Home@pendaftaran');

// Route::get('login','Auth\LoginController@index');
Route::get('login','LoginController@index');
Route::post('postlogin', 'LoginController@postlogin');
Route::get('logout', 'LoginController@logout');


//kecamatan
Route::get('kecamatan','KecamatanController@index');
Route::get('kecamatan/create','KecamatanController@create');
Route::post('addkec','KecamatanController@add');
Route::get('kecamatan/{kecamatan}/edit','KecamatanController@edit');
Route::patch('kecamatan/{kecamatan}','KecamatanController@update');
Route::get('kecamatan/{kecamatan}','KecamatanController@delete');

//sekolah
Route::get('sekolah','SekolahController@index');
Route::get('sekolah/create','SekolahController@create');
Route::post('addsekolah','SekolahController@add');
Route::get('editsekolah/{sekolah}', 'SekolahController@edit');
Route::post('editsekolah', 'SekolahController@update');
Route::get('sekolah/{sekolah}', 'SekolahController@hapus');
Route::get('status_sekolah/{sekolah}','SekolahController@acc');
Route::get('detail_sekolah/{sekolah}','SekolahController@detail');

Route::get('profile-sekolah/{sekolah}','SekolahController@profile_sekolah');
Route::post('editprofile', 'SekolahController@update_profile');

//prestasi
Route::get('prestasi','SekolahController@prestasi');
Route::get('prestasi/create', 'SekolahController@create_prestasi');
Route::post('prestasi/create', 'SekolahController@post_prestasi');
Route::get('prestasi/{id}/edit', 'SekolahController@edit_prestasi');
Route::post('prestasi/{id}', 'SekolahController@update_prestasi');
Route::get('prestasi/{id}', 'SekolahController@hapus_prestasi');

//tahun ajaran
Route::get('tahunajaran', 'SekolahController@tahunajaran');
Route::get('tahunajaran/create', 'SekolahController@create_thajaran');
Route::post('tahunajaran/create', 'SekolahController@post_thajaran');
Route::get('tahunajaran/{id}/edit', 'SekolahController@edit_thajaran');
Route::post('tahunajaran/update','SekolahController@update_thajaran');
Route::get('tahunajaran/{id}', 'SekolahController@hapus_thajaran');

//agama
Route::get('agama', 'SekolahController@agama');
Route::get('agama/create', 'SekolahController@create_agama');
Route::post('agama/create', 'SekolahController@post_agama');
Route::get('agama/{id}/edit', 'SekolahController@edit_agama');
Route::post('agama/update','SekolahController@update_agama');
Route::get('agama/{id}', 'SekolahController@hapus_agama');

//ppdb_sekolah
Route::get('ppdb_sekolah', 'SekolahController@ppdb_sekolah');
Route::post('ppdb/update', 'SekolahController@update_ppdb');

//data_pendaftaran
Route::get('data_pendaftaran/cetak_pdf', 'SekolahController@cetak');
Route::get('data_pendaftaran', 'SekolahController@data_daftar');
Route::post('data_pendaftaran/status', 'SekolahController@status_daftar');
Route::get('data_pendaftaran/{id}', 'SekolahController@hapus_daftar');
Route::post('st_zonasi', 'SekolahController@st_zonasi');
Route::post('upload_hasil', 'SekolahController@upload_hasil');


