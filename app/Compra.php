<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $primaryKey = 'id_compra';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'producto_id', 'id_producto');  // (modelo, nombre de key en compra, nombre de key en producto)
    }
}
