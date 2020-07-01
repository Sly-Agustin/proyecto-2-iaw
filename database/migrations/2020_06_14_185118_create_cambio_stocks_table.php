<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCambioStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cambio_stocks', function (Blueprint $table) {
            $table->id('id_cambio');
            $table->timestamp('fecha')->useCurrent();
            $table->integer('cantidad');
            $table->string('descripcion');
            $table->unsignedInteger('usuario_id')->nullable();
            $table->unsignedInteger('empleado_id')->nullable();
            $table->unsignedInteger('jefe_id')->nullable();
            $table->unsignedInteger('producto_id');     //Referencia a la ID del producto
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cambio_stocks');
    }
}
