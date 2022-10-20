<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = Role::create(['name' => 'Super Admin']);
        $role = Role::create(['name' => 'bedelia']);

        Role::create(['name' => 'student']);

        Permission::create(['name' => 'editar alumnos']);

        $role->givePermissionTo('editar alumnos');

        $user = User::create([
            'typedoc' => 'DNI',
            'numdoc' => 40404040,
            'email' => 'prueba@gmail.com',
            'password' => bcrypt('testing'),
            'name' => 'Matias',
            'surname' => 'Gomez',
            'nationality' => 'Argentina',
            'phone' => '3413333333',
            'address' => 'Montevideo',
            'postalcode' => 2000,
            'locality' => 'Rosario',
            'birthday' => '1997-09-30',
            'title' => 'Titulo secundario',
            'yearofgraduation' => '1997',
            'institution' => 'Urquiza',
        ]);
        $user->assignRole('Super Admin');
        $estudiante = User::create([
            'typedoc' => 'DNI',
            'numdoc' => 50404040,
            'email' => 'estudiante@gmail.com',
            'password' => bcrypt('testing'),
            'name' => 'Mauro',
            'surname' => 'Fernandez',
            'nationality' => 'Argentina',
            'phone' => '3413333332',
            'address' => 'Montevideo',
            'postalcode' => 2000,
            'locality' => 'Rosario',
            'birthday' => '1997-09-30',
            'title' => 'Titulo secundario',
            'yearofgraduation' => '1997',
            'institution' => 'Urquiza',
        ]);
        $estudiante->assignRole('student');
    }
}
