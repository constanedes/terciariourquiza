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
Route::get('/nosotros', function () {
    return view('pages.nosotros');
});
Route::get('/desarrollo-software', function () {
    return view('pages.ds');
});
Route::view('/analisis-funcional','pages.af');
Route::view('/infraestructura-ti', 'pages.iti');