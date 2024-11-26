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
        Your Posts
        <!-- Hello {{ Auth::user()->name }} -->
    </h1>

    <!-- if the user has created no posts to be shown -->
    @if ($posts->isEmpty())
        <h3 class="text-2xl text-center">
            Sorry there are currently no posts!
        </h3>
    @endif

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
                </div>

                <div class="flex grid grid-cols-2 gap-3 px-5">
                    <!-- displaying the likes -->
                    <div class="flex col-start-1">
                        <h1 class="font-bold content-end text-center">
                            Likes: {{ $post->likes->count() }}
                        </h1>
                    </div>

                    <!-- delete button  -->
                    <div class="flex col-start-2 justify-end gap-3">
                        <form action="/post/{{ $post->id }}" method="POST">
                            @csrf
                            @method('delete')

                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-7">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>

                        <!-- edit button  -->
                        <a href="/post/{{ $post->id }}/edit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-7">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</body>