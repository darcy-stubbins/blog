<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

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
        <div class="mt-20 border rounded-lg shadow bg-rose-50 p-10 w-1/3">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="flex justify-center">
                    <h1 class="font-bold text-3xl pb-10">
                        Sign up
                    </h1>
                </div>

                <!-- Name -->
                <div class="">
                    <x-text-input id="name"
                        class="peer py-3 pe-0 block w-full bg-transparent border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-blue-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none"
                        placeholder="Name" type="text" name="name" :value="old('name')" required autofocus
                        autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="">
                    <x-text-input id="email"
                        class="peer py-3 pe-0 block w-full bg-transparent border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-blue-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none"
                        placeholder="Email" type="email" name="email" :value="old('email')" required
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="">
                    <x-text-input id="password"
                        class="peer py-3 pe-0 block w-full bg-transparent border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-blue-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none"
                        placeholder="Password" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="">
                    <x-text-input id="password_confirmation"
                        class="peer py-3 pe-0 block w-full bg-transparent border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-blue-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none"
                        placeholder="Confirm Password" type="password" name="password_confirmation" required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex justify-center py-5">
                    <!-- Register account button  -->
                    <button
                        class="px-3 py-2 text-center w-1/2 rounded-full bg-rose-600 hover:bg-rose-700 text-white font-bold">
                        Create account
                    </button>
                </div>

                <!-- sign in here  -->
                <div class="flex items-center gap-2 justify-end mt-4">
                    <h3 class="text-gray-600 text-sm">
                        Already have an account?
                    </h3>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        Sign in
                    </a>

                </div>
            </form>
        </div>
    </div>
</body>