<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    // Comentar esto si se vuelve a usar el registro viejo
    protected $fillable = [
        'direccion', 'codigoPostal', 'telefono'
    ];
    //
    public $timestamps = false;
}
