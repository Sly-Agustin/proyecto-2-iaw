<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Carbon::now() se usa para la fecha actual en timestamp, usar use Carbon/Carbon;
        User::Truncate();
        for ($i = 1; $i <= 10; $i++) {
            $usuario = new App\User;
            $usuario->nombre = 'Nombre '.$i;
            $usuario->apellido = 'Apellido '.$i;
            $usuario->username = 'Usuario '.$i;
            $usuario->email = 'usuario'.$i.'@gmail.com';
            $usuario->password = Hash::make('contrasenia');
            $usuario->save();
        }
    }
}
