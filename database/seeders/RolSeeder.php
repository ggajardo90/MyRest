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
        $roleUser = Role::create(['name' => 'User']);
        $roleInvitado = Role::create(['name' => 'Invitado']);


        $permisos = array(
            ['name' => 'categoria.index'],
            ['name' => 'categoria.create'],
            ['name' => 'categoria.edit'],
            ['name' => 'categoria.destroy'],
            ['name' => 'producto.index'],
            ['name' => 'producto.create'],
            ['name' => 'producto.edit'],
            ['name' => 'producto.destroy'],
            ['name' => 'users.index'],
            ['name' => 'users.create'],
            ['name' => 'users.edit'],
            ['name' => 'users.show'],
            ['name' => 'users.update'],
            ['name' => 'users.destroy'],
            ['name' => 'perfil.edit'],
            ['name' => 'perfil.editRole'],
        );

        foreach($permisos as $permiso){
            Permission::create($permiso);
        }

        $roleUser->syncPermissions([1,2,3,4,5,6,7,8,13]);

        $roleInvitado->syncPermissions([1,5]);

    }
}
