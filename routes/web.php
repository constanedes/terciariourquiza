<?php

use Illuminate\Support\Facades\Route;

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

Route::get('administracion', function(){
    return view('pages.administracion.administracion');
})->middleware(['auth'])->name('administracion');

Route::controller('datatables', 'UserController', [
    //'anyData'  => 'datatables.data',
    'getUserData' => 'datatables',
]);
/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/
require __DIR__.'/auth.php';
