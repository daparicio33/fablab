<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* \App\Models\User::factory(10)->create(); */
        $usuario = new User;
        $usuario->name = "Davis Williams Aparicio Palomino";
        $usuario->email = "daparicio@idexperujapon.edu.pe";
        $usuario->password = bcrypt('B3n3tt0n_');
        $usuario->sexo="Masculino";
        $usuario->tipo = "Superadmin";
        $usuario->save();
        $usuario2 = new User;
        $usuario2->name = "Dave Aparicio Palomino";
        $usuario2->email = "dwaparicicio@gmail.com";
        $usuario2->password = bcrypt('B3n3tt0n_');
        $usuario2->sexo="Masculino";
        $usuario2->tipo = "Superadmin";
        $usuario2->save();
        //creamos los permisos y los roles
        
    }
}
