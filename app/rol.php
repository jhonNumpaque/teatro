<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rol extends Model{
    public    $table      = "rol";
    protected $primaryKey = "id_unico";
    public    $timestamps = false;
}
