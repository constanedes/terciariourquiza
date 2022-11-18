@extends('layouts.main')
@section('content')
<div class="d-flex justify-content-around mt-5">
    <div class="mb-4 text-sm text-gray-600 pt-3 text-center fw-bold col-8 ">
        <h3>Gracias por registrarte👍</h3>
        {{ __('
         Antes de empezar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que que te acabamos de enviar por correo electrónico?
         Si no recibes el correo electrónico, te enviaremos otro con mucho gusto.') }}
    </div>
</div>


@if (session('status') == 'verification-link-sent')
<div class="mb-4 font-medium text-sm text-green-600">
    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
</div>
@endif
<form method="POST" action="{{ route('verification.send') }}" class="text-center ">
    @csrf

    <div >
        <x-button class="btn btn-warning shadow-lg">
            {{ __('Resend Verification Email') }}
        </x-button>
    </div>
</form>
<form method="POST" action="{{ route('logout') }}" class="text-center mb-5">
    @csrf

    <button type="submit" class="underline text-sm text-white shadow-lg hover:text-gray-900 btn btn-warning">
        {{ __('Log Out') }}
    </button>
</form>
@endsection