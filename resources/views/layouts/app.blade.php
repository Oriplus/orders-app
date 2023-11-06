<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Orders</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
</head>

<body>
    <div id="app">
        <nav class="navbar shadow-sm bg-body-tertiary">
            <div class="container-fluid justify-content-center">
                <span class="navbar-brand" href="#">
                    Orders
                </span>
            </div>
        </nav>
        <main class="container py-4">
            @yield('content')
        </main>
    </div>
    @livewireScripts
</body>

</html>
