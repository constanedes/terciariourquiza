@extends('layouts.main')
@section('content')



<div class="d-flex justify-content-around mt-5">
    <div class="mb-4 text-sm text-dark pt-3 text-center fw-bold col-8 ">
        <h3>
            {{ __(
            'Olvidaste tu contraseña? No hay problema. '.
            'Solo dinos tu email y te enviaremos un link '.
            'para que puedas elegir una nueva'
            ) }}
        </h3>
    </div>
</div>

<!-- Session Status -->
@if(session('status')))
<p class="fw-bold text-center text-dark">
    Correo de recuperación enviado!
</p>
@endif

<!-- Validation Errors -->

<x-auth-validation-errors class="mb-4" :errors="$errors" />

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div class="container d-flex align-items-center flex-column mb-3">
        <div class="row ">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
        </div>
        <div class="row mt-3 mb-3">
            <button class="btn btn-warning shadow-lg">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </div>


</form>
@endsection