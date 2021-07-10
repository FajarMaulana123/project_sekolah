<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table ="sekolah";

    protected $fillable = [
     'id_user','id_kec','nama_sekolah','nama_kps','tingkat','email','alamat','visimisi','deskripsi','bukti','logo','foto','daya_tampung','jml_diterima','longitude','latitude'
 ];
 protected $primaryKey = 'id_sekolah';
}
