<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasilseleksi extends Model
{
    protected $table ="hasil_seleksi";

    protected $fillable = [
     'id_sekolah', 'hasil_seleksi'
 ];
 protected $primaryKey = 'id_hasil';
}
