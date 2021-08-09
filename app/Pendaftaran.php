<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table ="pendaftaran";

    protected $fillable = [
     'id_siswa','id_sekolah','jalur','jarak','daya_tampung','jml_diterima','tahun_ajaran','status','baca'
 ];
 protected $primaryKey = 'id_pendaftaran';
}
