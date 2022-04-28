<?php

namespace Database\Factories;

use App\Models\Localidad;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Localidad>
 */
class LocalidadFactory extends Factory
{
    protected $model = Localidad::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'codlocalidad' => $this->faker->randomNumber,
            'localidad' => $this->faker->city
        ];
    }
}
