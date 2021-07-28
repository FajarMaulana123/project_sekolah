<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table ="pendaftaran";

    protected $fillable = [
     'id_siswa','id_sekolah','jalur','daya_tampung','jml_diterima','tahun_ajaran','status'
 ];
 protected $primaryKey = 'id_pendaftaran';
}
