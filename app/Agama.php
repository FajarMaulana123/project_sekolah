<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $table ="agama";

    protected $fillable = [
     'nama_agama'
    ];
    protected $primaryKey = 'id_agama';
}
