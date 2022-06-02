<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static $nombres = ['Napolitana','Vaquera','3 Carnes', 'Fetuccini', 'Ceviche Mixto', 'Texana', 'Vegetariana', 'Tallarines'];
    
    public function run()
    {
        foreach (self::$nombres as $nombre) {
            DB::table('productos')->insert([
                'categoria_id' => rand(1,5),
                'nombre' => $nombre,
                'precio' => rand(5000,10000),
                'stock' => rand(2,8),
                'descripcion' => 'De Prueba',
                'imagen' => 'https://imgur.com/HZ4s5vu',
                'activo' => 1
            ]);
        }
    }
}
