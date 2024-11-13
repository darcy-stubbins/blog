<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reset Password</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>
    <div class="flex justify-center">
        <div class="mt-20 border rounded-lg shadow bg-rose-50 p-10 w-1/2">

            <!-- back button -->
            <div class="flex justify-end">
                <a href="/login">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
                        <path fill-rule="evenodd"
                            d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>

            <div class="flex justify-center pb-5">
                <h1 class="font-bold text-3xl">
                    Password recovery
                </h1>
            </div>

            <h5 class="text-gray-600 pb-10">
                Forgot your password? No problem. Just let us know your email address and we will email you a password
                reset
                link that
                will allow you to choose a new one.
            </h5>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="pb-5">
                    <x-text-input id="email"
                        class="peer py-3 pe-0 block w-full bg-transparent border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-blue-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none"
                        placeholder="Account email" type="email" name="email" :value="old('email')" required
                        autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-center mt-4">
                    <button class="px-3 py-2 text-center bg-rose-600 hover:bg-rose-700 text-white rounded-full">
                        Email Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>