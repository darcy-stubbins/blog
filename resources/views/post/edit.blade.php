<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Post</title>

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
    <form action="/post/{{ $post->id }}" method="POST">

        <!-- headers -->
        <h1 class="text-center text-4xl font-bold text-black m-10">
            Edit Your Post
        </h1>

        <div class="flex justify-center">
            <div class="border rounded-lg shadow bg-rose-50 mx-10 px-5 py-5 mb-10 w-full">
                <!-- title input  -->
                <div class="flex justify-center mb-5">
                    <input
                        class="shadow appearance-none border rounded-lg w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="blog_title" value="{{ $post->blog_title }}">
                </div>

                <!-- WYSIWYG input -->
                <textarea id="mytextarea" name="blog_content">{!! $post->blog_content !!}</textarea>

                <div class="flex justify-center pt-5">
                    @csrf
                    @method('patch')

                    <!-- confirm changes button  -->
                    <button type="submit"
                        class="inline-flex items-center px-3 py-2 text-center bg-rose-600 hover:bg-rose-700 text-white rounded-lg">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </form>
</body>