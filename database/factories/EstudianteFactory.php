<?php

namespace Database\Factories;

use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EstudianteFactory extends Factory
{
    protected $model = Estudiante::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'anio' => $this->faker->randomNumber,
            'legajo' => $this->faker->unique->randomNumber,
            'persona_id' => rand(1,10)
        ];
    }
}
