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

    <!-- WYSIWYG form -->
    <script src="https://cdn.tiny.cloud/1/{{ env('API_KEY') }}/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            theme_advanced_resizing: true,
            theme_advanced_resizing_use_cookie: false,
        });
    </script>

</head>

<body>
    @yield('navbar')
    <h1 class="py-10 text-center text-4xl pb-10 font-serif font-bold text-black">Upload</h1>
    <form action="/post" method="POST">
        @csrf
        <div class="flex justify-center">
            <!-- card -->
            <div class="border rounded-lg shadow bg-rose-50 p-10 w-full mx-5 mb-10">
                <!-- title input  -->
                <div class="flex justify-center mb-5">
                    <input
                        class="shadow appearance-none border rounded-lg w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="blog_title" placeholder="Title">
                </div>
                <!-- WYSIWYG input -->
                <textarea id="mytextarea" name="blog_content"></textarea>
                <!-- submit button  -->
                <div class="flex justify-center pt-3">
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