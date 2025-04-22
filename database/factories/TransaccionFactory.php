<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaccion>
 */
class TransaccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo' => $this->faker->randomElement(['ingreso', 'gasto']),
            'monto' => $this->faker->numberBetween(1000, 100000),
            'descripcion' => $this->faker->sentence,
            'fecha' => $this->faker->date(),
        ];
    }
}
