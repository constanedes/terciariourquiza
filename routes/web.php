<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StudentsController;

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

Route::get('/nosotros', function(){
    return view('pages.nosotros');
});

Route::get('analisis-funcional', function(){
    return view('pages.af');
});

Route::get('infraestructura-ti', function(){
    return view('pages.iti');
});

Route::get('desarrollo-software', function(){
    return view('pages.ds');
});

Route::get('preinscripcion', function(){
    return view('pages.preinscripcion');
});

<<<<<<< HEAD
Route::get('carreras', function(){
    return view('pages.carreras');
});
=======
Route::post('/preinscripcion/enviar',[StudentsController::class,'store']);
>>>>>>> 96eb76cd87f546c423110055ad29f50423ee6070

//RUTAS PRIVADAS - INGRESO UNICAMENTE LOGUEADO
Route::middleware(['auth'])->group(function (){
    //INGRESO UNICAMENTE CON ROL BEDELIA O SUPER ADMIN
    Route::middleware(['role:bedelia|Super Admin'])->group(function (){
        /*Route::get('administracion', function(){
            return view('pages.administracion.administracion');
        });*/
        //RUTAS DE TABLAS
        /*Route::controller(DatatableController::class)->group(function(){
            Route::get('/datatables/users','getUsers');
        });*/
        Route::get('/administracion/users', [UsersController::class, 'index'])->name('pages.administracion.users.index');
        Route::get('/administracion/estudiantes', [EstudiantesController::class, 'index'])->name('pages.administracion.estudiantes.index');
    });
});
require __DIR__.'/auth.php';
