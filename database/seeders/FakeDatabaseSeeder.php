<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Localidad::factory(10)->create();
        \App\Models\Persona::factory(10)->create();
        \App\Models\Estudiante::factory(10)->create();
    }
}
