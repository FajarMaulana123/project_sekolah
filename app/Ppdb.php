<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    protected $table ="ppdb";

    protected $fillable = [
     'id_sekolah','id_tahunajaran','tahun_ajaran','daya_tampung','jml_diterima','tgl_berakhir','tgl_mulai'
 ];
 protected $primaryKey = 'id_ppdb';
}
