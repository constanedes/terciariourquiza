@include('layouts.head')
@include('layouts.nav')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @yield('head')
    <body class="antialiased">
        @yield('nav')
        <div style="padding-top:60px">@yield('content')</div>
        <footer>
            
        </footer>
        <script src="{{ mix('js/app.js') }}" ></script>
        <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
        @stack('scripts')
    </body>
</html>