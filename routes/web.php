<?php

use App\DataTables\CareersDataTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TurnsController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;

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

Route::post('/contact', [HomeController::class, 'sendContact']);

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/nosotros', function () {
    return view('pages.nosotros');
});

Route::get('/nuestrascarreras/{id}', [CareersController::class, 'careerPage']);

Route::get('/preinscripcion', [StudentsController::class, 'preinscriptionPage'])
    ->name('preinscription');

Route::get('/getcarreras', [CareersController::class, 'getCareers']);


Route::post('/preinscripcion/enviar', [StudentsController::class, 'store']);

Route::post('carreras', [CareersController::class, 'careersSelect']);

Route::get('/turnos/getdays', [TurnsController::class, 'getDays']);
Route::get('/turnos/gethours/{date}', [TurnsController::class, 'getHours']);
//RUTAS PRIVADAS - INGRESO UNICAMENTE LOGUEADO
Route::middleware(['auth'])->group(function () {
    //INGRESO UNICAMENTE CON ROL BEDELIA O SUPER ADMIN
    Route::middleware(['role:bedelia|Super Admin'])->group(function () {
        Route::prefix('administracion')->group(function () {
            /* CARRERAS */
            Route::get('/carreras', [CareersController::class, 'index'])
                ->name('pages.administracion.carreras.index');
            Route::get('/carreras/create', function () {
                return view('pages.administracion.carreras.create.create');
            });
            Route::get('/carreras/editar/{id}', [CareersController::class, 'editView']);
            Route::post('/carreras/nuevo', [CareersController::class, 'store']);
            Route::post('/carreras/eliminar', [CareersController::class, 'delete']);
            Route::post('/carreras/edit', [CareersController::class, 'edit']);
            Route::post('/carreras/cupo', [CareersController::class, 'updateCupo']);

            /* CONFIGURACIONES */
            Route::get('/configuraciones', [SettingsController::class, 'index'])
                ->name('administracion.configuraciones');
            Route::get('/configuraciones/create', function () {
                return view('pages.administracion.configuraciones.create.create');
            });
            Route::get('/configuraciones/editar/{id}', [SettingsController::class, 'editView']);
            Route::post('/configuraciones/edit', [SettingsController::class, 'edit']);
            Route::post('/configuraciones/nuevo', [SettingsController::class, 'store']);

            /* ESTUDIANTES */
            Route::get('/estudiantes', [StudentsController::class, 'index'])
                ->name('pages.administracion.estudiantes.index');

            /* INGRESANTES */
            Route::get('/ingresantes', [StudentsController::class, 'ingresantesIndex'])
                ->name('pages.administracion.ingresantes.index');
            Route::post('/ingresantes/confirmar', [StudentsController::class, 'confirm']);

            /* TURNOS */
            Route::post('/turnos/crear', [TurnsController::class, 'generateTurns']);
            Route::get('/turnos', [TurnsController::class, 'index']);
            Route::get('/turnos/create', function () {
                return view('pages.administracion.turnos.create.create');
            });
            Route::post('/turnos/eliminar', [TurnsController::class, 'delete']);

            /* USERS */
            Route::get('/users', [UsersController::class, 'index'])
                ->name('pages.administracion.users.index');
            Route::get('/users/create', [UsersController::class, 'newUserView']);
            Route::post('/users/nuevo', [UsersController::class, 'store']);
            Route::get('/users/editar/{id}', [UsersController::class, 'editUserView']);
            Route::post('/users/edit', [UsersController::class, 'edit']);
        });
    });
});
require __DIR__ . '/auth.php';
