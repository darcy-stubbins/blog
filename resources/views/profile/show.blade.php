<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile</title>

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

    <!-- headers -->
    <h1 class="text-center text-4xl font-bold text-black m-10">
        Posts
    </h1>

    <!-- post displaying -->
    @foreach ($posts as $post)
        <div class="flex justify-center m-10">
            <div class="border rounded-lg shadow bg-rose-50 p-5 overflow-hidden w-full">
                <div class="text-center">
                    <h4 class="font-bold text-2xl text-gray-900">
                        {{ $post->blog_title }}
                    </h4>

                    <hr class="h-px my-6 bg-gray-300 border-0">

                    <p>{!! $post->blog_content !!}</p>

                    <h1 class="font-bold text-start">
                        Likes: {{ $post->likes->count() }}
                    </h1>
                </div>
            </div>
        </div>
    @endforeach

</body>