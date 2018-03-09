<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservaSilla extends Model{
    public    $table      = "reserva_silla_usuario";
    protected $primaryKey = "id_unico";
    public    $timestamps = false;
}
