<?php

use App\DataTables\CareersDataTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TurnsController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;


use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('index')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

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
Route::middleware(['auth', 'verified'])->group(function () {
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
