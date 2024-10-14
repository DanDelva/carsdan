<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carro>
 */
class CarroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'modelo' => $this->faker->word(), 
            'color' => $this->faker->safeColorName(), // Genera un color de nombre seguro
            'precio' => $this->faker->randomFloat(2, 10000, 50000), 
            'transmision' => $this->faker->randomElement(['Manual', 'Automática']), 
            'submarca' => $this->faker->company(), // Genera una marca/submarca ficticia
            'marca_id' => $this->faker->numberBetween(1, 10), // Genera un número para la clave foránea, asumiendo que hay de 1 a 10 marcas
            'foto' => 'img/cars/fake_image.jpg', // Genera una ruta falsa para la imagen
        ];
    }
}
