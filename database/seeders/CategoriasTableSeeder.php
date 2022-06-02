<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static $nombres = ['Pizza´s','Hamburguesas','Tablas', 'Pastas', 'Del mar'];
    
    public function run()
    {
        foreach (self::$nombres as $nombre) {
            DB::table('categorias')->insert([
                'nombre' => $nombre,
                'descripcion' => 'De Prueba',
                'imagen' => 'https://imgur.com/HZ4s5vu',
                'activa' => 1
            ]);
        }
    }
}
