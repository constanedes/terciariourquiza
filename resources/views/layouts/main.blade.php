@include('layouts.head')
@include('layouts.nav')
@include('layouts.footer')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@yield('head')

<body class="antialiased bg-secondary">
    @yield('nav')
    <div style="padding-top:60px">@yield('content')</div>
    <footer>
        @yield('footer')
    </footer>

    @stack('scripts')
</body>

</html>