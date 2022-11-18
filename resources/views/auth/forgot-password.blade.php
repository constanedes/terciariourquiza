@extends('layouts.main')
@section('content')


<div class="mb-4 text-sm text-gray-600 pt-3">
    <h3>
        {{ __(
        'Olvidaste tu contraseña? No hay problema. Solo dinos tu email y te enviaremos un link para que puedaselegiruna
        nueva'
        ) }}
    </h3>
</div>

<!-- Session Status -->
@if(session('status')))
<p>
    Correo de recuperación enviado!
</p>
@endif

<!-- Validation Errors -->

<x-auth-validation-errors class="mb-4" :errors="$errors" />

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
            autofocus />
    </div>

    <div class="flex items-center justify-end mt-4">
        <button>
            {{ __('Email Password Reset Link') }}
        </button>
    </div>
</form>
@endsection