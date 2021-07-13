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
Route::get('kategori_kecamatan','Home@kategori');
Route::get('home','admin\HomeController@index');


Route::get('login','Auth\LoginController@index');
Route::get('daftar','Home@daftar');
Route::get('daftar/siswa','Home@daftar_siswa');
Route::post('akunsiswa', 'Home@post_akunsiswa');
Route::get('detail-sekolah/{nama}/{id}', 'Home@detail_sekolah');
Route::get('jalur-pendaftaran', 'Home@jalur_pendaftaran');

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

//ppdb_sekolah
Route::get('ppdb_sekolah', 'PostCategoryController@ppdb_sekolah');

