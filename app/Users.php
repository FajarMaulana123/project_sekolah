<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table ="users";

    protected $fillable = [
     'email','password','role','status'
 ];
 protected $primaryKey = 'id_user';
}
