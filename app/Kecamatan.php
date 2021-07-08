<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table ="kecamatan";

    protected $fillable = [
     'kode_pos','nama_kec'
 ];
 protected $primaryKey = 'id_kec';
}
