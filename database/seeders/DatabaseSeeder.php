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

        Permission::create(['name' => 'editar alumnos']);
        
        $role->givePermissionTo('editar alumnos');
        
        $user = User::create([
            'docpersonas' => 40404040,
            'email' => 'matiasgr3009@gmail.com',
            'password' => bcrypt('testing'),
            'nombres' => 'Matias',
            'apellidos' => 'Ramirez',
            'nacionalidad' => 'Argentina',
            'celular' => '3413333333',
            'calle' => 'Montevideo',
            'numero' => 100,
            'piso' => 2,
            'dpto' => 'B',
            'codpostal' => 2000
        ]);
        $user->assignRole('Super Admin');
    }
}
