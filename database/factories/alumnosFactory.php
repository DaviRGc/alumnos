<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\alumnos>
 */
class alumnosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->unique()->bothify('A-####'),
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'genero' => $this->faker->randomElement(['M', 'F', 'O']),
            'carrera' => $this->faker->randomElement(['Ing. Sistemas', 'Matemáticas', 'Derecho']),
        ];
    }
}
