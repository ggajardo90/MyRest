<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create(['name' => 'Admin']);
        $roleUser = Role::create(['name' => 'Mesero']);
        $roleInvitado = Role::create(['name' => 'Invitado']);


        $permisos = array(
            ['name' => 'categoria.index'],      //1
            ['name' => 'categoria.create'],     //2
            ['name' => 'categoria.edit'],       //3
            ['name' => 'categoria.destroy'],    //4
            ['name' => 'producto.index'],       //5
            ['name' => 'producto.create'],      //6
            ['name' => 'producto.edit'],        //7
            ['name' => 'producto.destroy'],     //8
            ['name' => 'users.index'],          //9
            ['name' => 'users.create'],         //10
            ['name' => 'users.edit'],           //11
            ['name' => 'users.show'],           //12
            ['name' => 'users.update'],         //13
            ['name' => 'users.destroy'],        //14
            ['name' => 'perfil.edit'],          //15
            ['name' => 'perfil.editRole'],      //16
        );

        foreach($permisos as $permiso){
            Permission::create($permiso);
        }

        $roleUser->syncPermissions([1,5]);

        $roleInvitado->syncPermissions([1,5]);

    }
}
