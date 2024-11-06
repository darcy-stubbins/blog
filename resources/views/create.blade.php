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
            selector: '#mytextarea'
        });
    </script>

</head>

<body>
    @yield('navbar')
    <form action="/post" method="POST">
        @csrf
        <div class="w-screen flex justify-center p-10">
            <div class="w-full p-10 border rounded-lg shadow bg-rose-50">
                <div>
                    <textarea id="mytextarea" name="blog_content"></textarea>
                    <div class="flex justify-center pt-3">
                        <button type="submit"
                            class="inline-flex items-center px-3 py-2  text-center bg-rose-700 text-white font-semibold rounded-lg hover:text-rose-700 hover:bg-white">
                            Upload
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>