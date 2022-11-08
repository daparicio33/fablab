<?php

namespace Database\Seeders;

use App\Models\Proyecto;
use App\Models\Tproyecto;
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
        //proyecto
        $proyecto = Proyecto::create([
            'nombre'=>'Proyecto Primero del Sistema',
            'descripcion'=>"
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                It has survived not only five centuries, but also the leap into electronic typesetting, 
                remaining essentially unchanged. 
                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            ",
            'fecha'=>'10/10/10',
            'user_id'=>$usuario1=1
        ]);
        //tipos de proyectos
        $tipo1 = Tproyecto::create(['nombre'=>'Investigacion y Desarrollo']);
        $tipo2 = Tproyecto::create(['nombre'=>'Recurso Educativo']);
        $tipo3 = Tproyecto::create(['nombre'=>'Desarrollo Empresarial']);
        $tipo4 = Tproyecto::create(['nombre'=>'Desarrollo Comunitario']);
    }
}
