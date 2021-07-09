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
Route::get('home','admin\HomeController@index');

<<<<<<< HEAD
Route::get('login','Auth\LoginController@index');
Route::get('daftar','Home@daftar');
=======
// Route::get('login','Auth\LoginController@index');
Route::get('login','LoginController@index');
Route::post('postlogin', 'LoginController@postlogin');
Route::get('logout', 'LoginController@logout');
>>>>>>> 690079d5564daa30573c2516368de85e17518eac

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

