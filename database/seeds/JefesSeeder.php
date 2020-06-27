<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Jefe;

class JefesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Jefe::Truncate();
        $jefe = new App\Jefe;
        $jefe->nombre = 'Javier';
        $jefe->apellido = 'Mascherano';
        $jefe->username = 'JaviM';
        $jefe->email = 'jefecito@jefe.com';
        $jefe->password = Hash::make('jefe');
        $jefe->save();
        
    }
}
