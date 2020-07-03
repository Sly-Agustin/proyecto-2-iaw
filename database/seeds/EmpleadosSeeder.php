<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Empleado;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Empleado::Truncate();
        $empleado = new App\Empleado;
        $empleado->nombre = 'John';
        $empleado->apellido = 'Caldera';
        $empleado->username = 'JohnC';
        $empleado->email = 'johnc@gmail.com';
        $empleado->enActividad = true;
        $empleado->password = Hash::make('empleado');
        $empleado->save();
    }
}
