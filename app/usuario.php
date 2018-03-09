<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model{
    public    $table      = "usuarios";
    protected $primaryKey = "id_unico";
    public    $timestamps = false;
}
