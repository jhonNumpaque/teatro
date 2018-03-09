<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class silla extends Model{
    public    $table      = "silla";
    protected $primaryKey = "id_unico";
    public    $timestamps = false;
}
