<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Categoria;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->word();
        return [
            'categoria_id' => Categoria::all()->random()->id,
            'nombre' => $name,
            'slug' => Str::slug($name),
            'precio' => $this->faker->numberBetween($min = 100,$max = 500),
            'stock' => round(random_int(1, 20)),
            'descripcion' => $this->faker->paragraph(1),
            'imagen' => 'productodefault.png',
            'activo' => round(random_int(0, 1))
        ];
    }
}
