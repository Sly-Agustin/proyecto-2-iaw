<?php

use Illuminate\Database\Seeder;
use App\Producto;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inicialización manual de procesadores
        Producto::Truncate();
        $i7700 = new App\Producto;
        $i7700->nombre = 'i7 7700';
        $i7700->descripcion = 'Procesador Intel I7 de séptima generacion';
        $i7700->descripcionLarga = 'Descripción larga I7 7700';
        $i7700->tipo = 'procesador';
        $i7700->urlFabricante = 'https://www.intel.la/content/www/xl/es/products/processors/core/i7-processors/i7-7700.html';
        $i7700->precio = '15650';
        $i7700->stock = '100';
        $i7700->estaEnVenta=true;
        $i7700 ->save();

        $i7400 = new App\Producto;
        $i7400->nombre = 'i5 7400';
        $i7400->descripcion = 'Procesador Intel I5 de séptima generacion';
        $i7400->descripcionLarga = 'Descripción larga I5 7400';
        $i7400->tipo = 'procesador';
        $i7400->urlFabricante = 'https://www.intel.la/content/www/xl/es/products/processors/core/i5-processors/i5-7400.html';
        $i7400->precio = '13500';
        $i7400->stock = '100';
        $i7400->estaEnVenta=true;
        $i7400 ->save();

        $i7100 = new App\Producto;
        $i7100->nombre = 'i3 7100';
        $i7100->descripcion = 'Procesador Intel I3 de séptima generacion';
        $i7100->descripcionLarga = 'Descripción larga I3 7100';
        $i7100->tipo = 'procesador';
        $i7100->urlFabricante = 'https://ark.intel.com/content/www/es/es/ark/products/97455/intel-core-i3-7100-processor-3m-cache-3-90-ghz.html';
        $i7100->precio = '8000';
        $i7100->stock = '100';
        $i7100->estaEnVenta=true;
        $i7100 ->save();
        
    }
}
