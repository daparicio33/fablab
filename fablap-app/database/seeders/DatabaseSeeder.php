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
        $usuario->tipo = "Superadmin";
        $usuario->save();
    }
}
