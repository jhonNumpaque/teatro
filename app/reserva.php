<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reserva extends Model{
    public    $table      = "reserva";
    protected $primaryKey = "id_unico";
    public    $timestamps = false;
}
