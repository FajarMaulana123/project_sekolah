<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table ="sekolah";

    protected $fillable = [
     'id_user','nama_sekolah','nama_kps','tingkat','email','alamat','deskripsi','bukti','logo','foto','daya_tampung','jml_diterima','longitude','latitude'
 ];
 protected $primaryKey = 'id_sekolah';
}
