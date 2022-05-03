<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'nombres' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'tipodoc' => $this->faker->randomElement(['DNI','LC','LE','PASAPORTE']),
            'docpersonas'=> $this->faker->randomNumber,
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

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
