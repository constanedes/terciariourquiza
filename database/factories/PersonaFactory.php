<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    protected $model = Persona::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombres' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'docpersonas'=> $this->faker->randomNumber,
            'email' => $this->faker->email,
            'nacionalidad' => $this->faker->country,
            'celular' => $this->faker->phoneNumber,
            'calle' => $this->faker->streetName,
            'numero' => $this->faker->buildingNumber,
            'piso' => $this->faker->randomNumber,
            'dpto' => $this->faker->realText($maxNbChars = 200),
            'codpostal' => $this->faker->postcode,
            'localidad_id' => rand(1,10)
        ];
    }
}
