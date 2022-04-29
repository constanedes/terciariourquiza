@include('layouts.head')
@include('layouts.nav')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @yield('head')
    <body class="antialiased">
        @yield('nav')
        <div style="padding-top:60px">@yield('content')</div>
        <footer>
            <script src="{{ asset('js/app.js') }}" ></script>
        </footer>
    </body>
</html>