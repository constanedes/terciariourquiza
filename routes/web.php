<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatatableController;

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
    return view('welcome');
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

//RUTAS PRIVADAS - INGRESO UNICAMENTE LOGUEADO
Route::middleware(['auth'])->group(function (){
    //INGRESO UNICAMENTE CON ROL BEDELIA O SUPER ADMIN
    Route::middleware(['role:bedelia|Super Admin'])->group(function (){
        Route::get('administracion', function(){
            return view('pages.administracion.administracion');
        });
        //RUTAS DE TABLAS
        Route::controller(DatatableController::class)->group(function(){
            Route::get('/datatables/users','getUsers');
        });
    });
});
require __DIR__.'/auth.php';
