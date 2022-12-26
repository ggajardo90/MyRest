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


        $permisos = array(
            ['name' => 'categoria.index'],       //1
            ['name' => 'categoria.index.table'], //2
            ['name' => 'categoria.create'],      //3
            ['name' => 'categoria.edit'],        //4
            ['name' => 'categoria.destroy'],     //5
            ['name' => 'producto.index'],        //6
            ['name' => 'producto.index.table'],  //7
            ['name' => 'producto.create'],       //8
            ['name' => 'producto.edit'],         //9
            ['name' => 'producto.destroy'],      //10
            ['name' => 'users.index'],           //11
            ['name' => 'users.create'],          //12
            ['name' => 'users.edit'],            //13
            ['name' => 'users.show'],            //14
            ['name' => 'users.update'],          //15
            ['name' => 'users.destroy'],         //16
            ['name' => 'tables.index'],          //17
            ['name' => 'tables.create'],         //18
            ['name' => 'tables.edit'],           //19
            ['name' => 'tables.update'],         //20
            ['name' => 'tables.destroy'],        //21
            ['name' => 'sales.index'],           //22
            ['name' => 'sales.create'],          //23
            ['name' => 'sales.edit'],            //24
            ['name' => 'reports.export'],        //25
            ['name' => 'reports.index'],         //26
        );

        foreach($permisos as $permiso){
            Permission::create($permiso);
        }

        $roleUser->syncPermissions([1,6,17,22,23,24]);

    }
}
