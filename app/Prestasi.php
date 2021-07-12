<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table ="prestasi";

    protected $fillable = [
     'id_sekolah','judul','deskripsi'
 ];
 protected $primaryKey = 'id_prestasi';
}
