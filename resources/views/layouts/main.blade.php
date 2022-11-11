@include('layouts.head')
@include('layouts.nav')
@include('layouts.footer')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@yield('head')

<body class="antialiased bg-secondary">
    @yield('nav')
    <div style="padding-top:60px">@yield('content')</div>
    <footer
            class="text-center text-lg-start text-white"
            style="background-color: #1c2331" >
        @yield('footer')
    </footer>

    @stack('scripts')
</body>

</html>