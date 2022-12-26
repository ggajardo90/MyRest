<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            'nombre' => $name,
            'slug' => Str::slug($name),
            'descripcion' => $this->faker->paragraph(1),
            'imagen' => 'categorydefault.png',
            'activa' => 1
        ];
    }
}
