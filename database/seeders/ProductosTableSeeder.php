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
    static $nombres = [
        'Napolitana',
        'Vaquera',
        '3 Carnes',
        'Fetuccini',
        'Ceviche Mixto',
        'Texana',
        'Vegetariana',
        'Tallarines',
        'Lomo salteado',
        'Lasagna',
        'Coca-Cola',
        'Fanta',
        'Jugo Natural',
        'Heineken',
        'Mojito'
    ];

    public function run()
    {
        foreach (self::$nombres as $nombre) {
            DB::table('productos')->insert([
                'categoria_id' => rand(1, 11),
                'nombre' => $nombre,
                'precio' => rand(5000, 10000),
                'stock' => rand(2, 8),
                'descripcion' => 'De Prueba',
                'imagen' => 'productodefault.png',
                'activo' => 1,
                'created_at' => now()
            ]);
        }
    }
}
