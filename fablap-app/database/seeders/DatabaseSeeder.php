<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        //creamos Roles
        $superadmin = Role::create(['name' => 'Superadmin']);
        $admin = Role::create(['name'=>'Admin']);
        $usuario = Role::create(['name'=>'Usuario']);
        
        Permission::create(['name'=>'dashboard.administrators.index','description'=>'Dashboard Administrador Inicio'])->syncRoles([$superadmin]);
        Permission::create(['name'=>'dashboard.administrators.create','description'=>'Dashboard Administrador Crear'])->syncRoles([$superadmin]);
        Permission::create(['name'=>'dashboard.administrators.store','description'=>'Dashboard Administrador Almacenar'])->syncRoles([$superadmin]);
        Permission::create(['name'=>'dashboard.administrators.edit','description'=>'Dashboard Administrador Editar'])->syncRoles([$superadmin]);
        Permission::create(['name'=>'dashboard.administrators.update','description'=>'Dashboard Administrador Actualizar'])->syncRoles([$superadmin]);
        Permission::create(['name'=>'dashboard.administrators.destroy','description'=>'Dashboard Administrador Destruir'])->syncRoles([$superadmin]);

        
        /* \App\Models\User::factory(10)->create(); */
        $usuario1 = new User;
        $usuario1->name = "Davis Williams Aparicio Palomino";
        $usuario1->email = "daparicio@idexperujapon.edu.pe";
        $usuario1->password = bcrypt('B3n3tt0n_');
        $usuario1->sexo="Masculino";
        $usuario1->tipo = "Superadmin";
        $usuario1->save();
        $usuario1->assignRole('Superadmin');
    }
}
