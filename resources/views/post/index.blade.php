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

                        <div class="grid grid-cols-2 gap-2">
                            <div class="col-start-1 col-span-1">
                                <h1 class="font-bold text-3xl text-gray-900">
                                    {{ $post->blog_title }}
                                </h1>

                                <h3 class="mt-1 text-gray-700">
                                    Posted by:
                                    <a href="/profile/{{ $post->user->id }}" class="text-blue-700 underline">
                                        {{ $post->user->name ?? 'Cant Find Author' }}
                                    </a>
                                </h3>
                            </div>

                            <!-- 'like' button  -->
                            <form action="{{$likedPosts->contains($post->id) ? '/like/' . $post->id : '/like'}}"
                                method="POST">
                                @csrf

                                @if ($likedPosts->contains($post->id))
                                    @method('delete')
                                @endif

                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="flex col-start-2 justify-end m-auto items-center pr-5 pt-5 gap-1">
                                    <button>
                                        @if ($likedPosts->contains($post->id))
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                class="size-7">
                                                <path
                                                    d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-7">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                                            </svg>
                                        @endif
                                    </button>
                                    <h3 class="font-bold text-lg">
                                        {{ $post->likes->count() }}
                                    </h3>
                                </div>
                            </form>
                        </div>

                        <hr class="h-px my-6 bg-gray-300 border-0">

                        <div class="flex justify-center mt-10">
                            <p>{!! $post->blog_content !!}</p>
                        </div>

                        <!-- comment section  -->
                        <div class="flex justify-center mt-10 mx-20">
                            <textarea id="message" rows="4"
                                class="w-full shadow appearance-none border rounded-lg w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Write a comment here"></textarea>
                        </div>

                        <!-- 'close' button -->
                        <div class="flex justify-center py-3 pt-5">
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