<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TurnsController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\SettingsController;
use Datatables;
use App\Models\Turn;
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
/*
Route::get('analisis-funcional', function () {
    return view('pages.af');
});

Route::get('infraestructura-ti', function () {
    return view('pages.iti');
});

Route::get('desarrollo-software', function () {
    return view('pages.ds');
});
*/
Route::get('nuestrascarreras/{id}', [CareersController::class, 'careerPage']);
Route::get('preinscripcion', function () {
    return view('pages.preinscripcion.index');
});

Route::get('getcarreras', [CareersController::class, 'getCareers']);


Route::post('/preinscripcion/enviar', [StudentsController::class, 'store']);

Route::post('carreras', [CareersController::class, 'careersSelect']);

Route::get('/turnos/getdays', [TurnsController::class, 'getDays']);
Route::get('/turnos/gethours/{date}', [TurnsController::class, 'getHours']);
//RUTAS PRIVADAS - INGRESO UNICAMENTE LOGUEADO
Route::middleware(['auth'])->group(function () {
    //INGRESO UNICAMENTE CON ROL BEDELIA O SUPER ADMIN
    Route::middleware(['role:bedelia|Super Admin'])->group(function () {
        Route::prefix('administracion')->group(function () {
            Route::post('/turnos/crear', [TurnsController::class, 'generateTurns']);
            Route::get('/users', [UsersController::class, 'index'])
                ->name('pages.administracion.users.index');
            Route::get('/estudiantes', [StudentsController::class, 'index'])
                ->name('pages.administracion.estudiantes.index');
            Route::get('/ingresantes', [StudentsController::class, 'ingresantesIndex'])
                ->name('pages.administracion.ingresantes.index');
            Route::post('/ingresantes/confirmar', [StudentsController::class, 'confirm']);
            Route::get('/carreras', [CareersController::class, 'index'])
                ->name('pages.administracion.carreras.index');
            Route::get('/carreras/create', function () {
                return view('pages.administracion.carreras.create.create');
            });
            Route::post('/carreras/nuevo', [CareersController::class, 'store']);
            //Route::get('/turnos', [TurnsController::class, 'index']);
            Route::get('/turnos', function () {
                $model = Turn::with(['student']);

                return Datatables::eloquent($model)
                    ->addColumn('', function (Turn $turn) {
                        return $turn->student->map(function ($student) {
                            return \Illuminate\Support\Str::limit($student->title, 30, '...');
                        })->implode('<br>');
                    })
                    ->toJson();
            });
            Route::get('/turnos/create', function () {
                return view('pages.administracion.turnos.create.create');
            });
            Route::get('/configuraciones', [SettingsController::class, 'index']);
            Route::get('/configuraciones/create', function () {
                return view('pages.administracion.configuraciones.create.create');
            });
            Route::post('/configuraciones/nuevo', [SettingsController::class, 'store']);
        });
    });
});
require __DIR__ . '/auth.php';
