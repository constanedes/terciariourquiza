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
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'type_doc' => $this->faker->randomElement(['DNI', 'LC', 'LE', 'PASAPORTE']),
            'num_doc' => $this->faker->unique->randomNumber,
            'nationality' => $this->faker->country,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->streetName,
            'postalcode' => $this->faker->postcode,
            'locality' => $this->faker->country,
            'birthday' => '1997-09-30',
            'title' => 'Titulo secundario',
            'year_of_graduation' => '1997',
            'institution' => 'Urquiza',
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
