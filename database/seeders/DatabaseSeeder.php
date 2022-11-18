<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Setting;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'student']);
        Role::create(['name' => 'bedelia']);

        $user = User::create([
            'typedoc' => 'DNI',
            'numdoc' => 34752137,
            'email' => 'nico.cristalli@gmail.com',
            'password' => bcrypt('Urquiza.49'),
            'name' => 'Nicolas',
            'surname' => 'Cristalli',
            'nationality' => 'Argentina',
            'phone' => '3413444192',
            'address' => 'Falucho 277',
            'postalcode' => 2156,
            'locality' => 'Fray Luis Beltran',
            'birthday' => '1990-04-22',
            'title' => 'AUS',
            'yearofgraduation' => '2015',
            'institution' => 'UTN'
        ]);
        $user->assignRole('Super Admin');

        Setting::create([
            'name' => 'inscripcion',
            'value' => 0,
            'obs' => 2023
        ]);
    }
}
