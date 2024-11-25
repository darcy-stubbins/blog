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
        <!-- headers -->
        <h1 class="text-center text-4xl pb-10 font-bold text-black">
            Posts
        </h1>

        <!-- if there are no posts -->
        @if ($posts->isEmpty())
            <h3 class="text-2xl text-center">
                Sorry there are currently no posts!
            </h3>
        @endif

        <!-- card displaying  -->
        <div class="grid grid-cols-3 gap-4">
            @foreach ($posts as $post)
                <div class="flex p-5 border rounded-lg shadow bg-rose-50">
                    <!-- hidden post modal for read more -->
                    <div id="postBody{{ $post->id }}" class="hidden">
                        {!! $post->blog_content !!}
                    </div>

                    <!-- card list view  -->
                    <div class="size-40 w-full overflow-hidden">
                        <h4 class="font-bold text-2xl text-gray-900">
                            {{ $post->blog_title }}
                        </h4>

                        <p class="mt-1 text-sm text-gray-700">
                            Posted by:
                            <a href="/profile/{{ $post->user->id }}" class="text-blue-700 underline">
                                {{ $post->user->name ?? 'Cant Find Author' }}
                            </a>
                        </p>

                        <!-- 'open' button -->
                        <div class="flex justify-center mt-16">
                            <button data-target="modalPost{{ $post->id }}"
                                class="read-more-button inline-flex justify-center items-center bg-rose-600 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded-full max-h-8 w-2/3">
                                Read More
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- modal view  -->
                <div id="modalPost{{ $post->id }}" style="display: none;"
                    class="fixed top-0 left-0 bg-black bg-opacity-60 w-full h-full">
                    <div class="p-5 border rounded-lg shadow bg-rose-50 m-20">

                        <h1 class="font-bold text-3xl text-gray-900">
                            {{ $post->blog_title }}
                        </h1>

                        <h3 class="mt-1 text-gray-700">
                            Posted by:
                            <a href="/profile/{{ $post->user->id }}" class="text-blue-700 underline">
                                {{ $post->user->name ?? 'Cant Find Author' }}
                            </a>
                        </h3>

                        <hr class="h-px my-6 bg-gray-300 border-0">

                        <p>{!! $post->blog_content !!}</p>

                        <!-- 'close' button -->
                        <div class="flex justify-center py-3">
                            <button data-target="modalPost{{ $post->id }}"
                                class="close-button inline-flex self-end items-center bg-rose-600 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded-full max-h-8">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>