<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cambio_stock extends Model
{
    //
    protected $primaryKey = 'id_cambio';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'usuario_id');
    }
    public function producto(){
        return $this->belongsTo('App\Producto', 'producto_id', 'id_producto');
    }
    public function empleado(){
        return $this->belongsTo('App\Empleado', 'empleado_id', 'id_empleado');
    }
}
