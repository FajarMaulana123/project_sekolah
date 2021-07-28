<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table ="siswa";

    protected $fillable = [
     'id_user','id_agama','nama','email','jk','tempat','tgl_lahir','asal_sekolah','alamat','nohp','tingkat','foto','akte','ijazah','skhun','kk','sertifikat1','sertifikat2','sertifikat3','longitude','latitude'
 ];
 protected $primaryKey = 'id_sekolah';
}
