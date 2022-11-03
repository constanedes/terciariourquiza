<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TurnsController;
use App\Http\Controllers\CareersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/nosotros', function () {
    return view('pages.nosotros');
});

Route::get('analisis-funcional', function () {
    return view('pages.af');
});

Route::get('infraestructura-ti', function () {
    return view('pages.iti');
});

Route::get('desarrollo-software', function () {
    return view('pages.ds');
});

Route::get('getcarreras', [CareersController::class, 'getCareers']);

Route::get('preinscripcion/{id}', [CareersController::class, 'preinscriptionView']);

Route::post('/preinscripcion/enviar', [StudentsController::class, 'store']);

Route::get('carreras', [CareersController::class, 'careersSelect']);


Route::post('/preinscripcion/enviar', [StudentsController::class, 'store']);


//RUTAS PRIVADAS - INGRESO UNICAMENTE LOGUEADO
Route::middleware(['auth'])->group(function () {
    //INGRESO UNICAMENTE CON ROL BEDELIA O SUPER ADMIN
    Route::middleware(['role:bedelia|Super Admin'])->group(function () {
        Route::post('/administracion/turnos/crear', [TurnsController::class, 'generateTurns']);
        Route::get('/administracion/users', [UsersController::class, 'index'])
            ->name('pages.administracion.users.index');
        Route::get('/administracion/estudiantes', [StudentsController::class, 'index'])
            ->name('pages.administracion.estudiantes.index');
        Route::get('/administracion/ingresantes', [StudentsController::class, 'ingresantesIndex'])
            ->name('pages.administracion.ingresantes.index');
        Route::get('/administracion/carreras', [CareersController::class, 'index'])
            ->name('pages.administracion.carreras.index');
        Route::get('administracion/carreras/create', function () {
            return view('pages.administracion.carreras.create.create');
        });
        Route::post('/administracion/carreras/nuevo', [CareersController::class, 'store']);
        Route::get('/administracion/turnos', function () {
            return view('pages.administracion.turnos.index');
        });
    });
});
require __DIR__ . '/auth.php';
