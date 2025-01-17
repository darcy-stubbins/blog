<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add a Post</title>

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
    <h1 class="py-10 text-center text-4xl pb-10 font-bold text-black">Upload</h1>
    <form action="/post" method="POST">
        @csrf

        <div class="flex justify-center">
            <div class="border rounded-lg shadow bg-rose-50 mx-10 px-5 py-5 mb-10 w-full">
                <!-- title input  -->
                <div class="flex justify-center mb-5">
                    <input required
                        class="shadow appearance-none border rounded-lg w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="blog_title" placeholder="Title">
                </div>

                <div>
                    <textarea required name="blog_content" rows="7"
                        class="w-full shadow appearance-none border rounded-lg w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Create a post here"></textarea>
                </div>

                <!-- submit button  -->
                <div class="flex justify-center pt-5">
                    <button type="submit"
                        class="inline-flex items-center px-3 py-2 text-center bg-rose-600 hover:bg-rose-700 text-white rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="size-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>