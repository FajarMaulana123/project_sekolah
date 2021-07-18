<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataDonatur extends Model
{
    protected $table ="datadonatur";

    protected $fillable = [
'jumlah','kode','namakonten','id_konten','bank','nama','email','nomorhp','status','komentar','url','anonim'
 ];

 public function post()
 {
     return $this->belongsTo(Post::class);
   
 } 

 public function datadonatur()
 {
     return $this->belongsTo(DataDonatur::class);
 } 

 protected $primaryKey = 'id_donatur';
 public $incrementing = false;

}
