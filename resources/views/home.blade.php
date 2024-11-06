<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <!-- include the navbar partial  -->
    @include('partials/navbar')
</head>

<body>
    @yield('navbar')
    <div class="m-10">
        <div class="grid grid-cols-2 gap-4">
            <div class="col-start-1 p-10 border rounded-lg shadow bg-rose-50">
                hello
            </div>
            <div class="col-start-2 p-10 border rounded-lg shadow bg-rose-50">
                hello
            </div>
        </div>
    </div>
</body>

</html>