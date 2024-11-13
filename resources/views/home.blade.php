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
    <!-- card list view  -->
    <div id="cardList" class="m-10">
        <h1 class="text-center text-4xl pb-10 font-serif font-bold text-black">Posts</h1>
        <div class="grid grid-cols-2 gap-4">
            <!-- card displaying  -->
            @foreach ($posts as $post)
                <div class="flex grid grid-cols-3 gap-2 items-center p-5 border rounded-lg shadow bg-rose-50">
                    <!-- hidden post modal -->
                    <div id="postBody{{ $post->id }}" class="hidden">
                        {!! $post->blog_content !!}
                    </div>
                    <div class="cols-start-1 col-span-1 font-bold">
                        {{ $post->blog_title }}
                    </div>
                    <div class="col-start-1 col-span-2">
                        {!! $post->blog_content !!}
                    </div>
                    <div class="col-start-1 col-span-2 font-bold">
                        Posted By: {{ $post->user->name ?? 'Cant Find Author'}}
                    </div>
                    <!-- 'open' button -->
                    <div class="col-start-3 col-span-1 flex justify-end">
                        <button data-target="modalPost{{ $post->id }}"
                            class="read-more-button inline-flex self-end items-center bg-rose-600 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded-full max-h-8">
                            Read More
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- modal view  -->
                <div id="modalPost{{ $post->id }}" style="display: none;"
                    class="fixed top-0 left-0 bg-black bg-opacity-60 w-full h-full">
                    <div class="p-5 border rounded-lg shadow bg-rose-50 m-10">
                        <div class="text-4xl font-bold text-rose-600">
                            {{ $post->blog_title }}
                        </div>
                        <div class="text-lg font-semibold text-black">
                            Posted By: {{ $post->user->name ?? 'Cant Find Author'}}
                        </div>
                        <p>{!! $post->blog_content !!}</p>
                        <!-- 'close' button -->
                        <button data-target="modalPost{{ $post->id }}"
                            class="close-button inline-flex self-end items-center bg-rose-600 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded-full max-h-8">
                            Close
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>