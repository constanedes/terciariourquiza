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

        //Role::create(['name' => 'invitado']);
        Role::create(['name' => 'estudiante']);

        Permission::create(['name' => 'editar alumnos']);
        
        $role->givePermissionTo('editar alumnos');
        
        $user = User::create([
            'tipodoc' => 'DNI',
            'documento' => 40404040,
            'email' => 'prueba@gmail.com',
            'password' => bcrypt('testing'),
            'nombres' => 'Matias',
            'apellidos' => 'Gomez',
            'nacionalidad' => 'Argentina',
            'celular' => '3413333333',
            'calle' => 'Montevideo',
            'numero' => 100,
            'piso' => 2,
            'dpto' => 'B',
            'codpostal' => 2000
        ]);
        $user->assignRole('Super Admin');
        $estudiante = User::create([
            'tipodoc' => 'DNI',
            'documento' => 50404040,
            'email' => 'estudiante@gmail.com',
            'password' => bcrypt('testing'),
            'nombres' => 'Mauro',
            'apellidos' => 'Fernandez',
            'nacionalidad' => 'Argentina',
            'celular' => '3413333332',
            'calle' => 'Montevideo',
            'numero' => 150,
            'piso' => 2,
            'dpto' => 'B',
            'codpostal' => 2000
        ]);
        $estudiante->assignRole('estudiante');
    }
}
