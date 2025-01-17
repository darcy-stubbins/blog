<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

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
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="flex justify-center">
                    <h1 class="font-bold text-3xl pb-10">
                        Login
                    </h1>
                </div>

                <div class="flex justify-center">
                    <div class="space-y-3 w-full">
                        <div class="relative">
                            <!-- Email Address -->
                            <x-text-input id="email"
                                class="peer py-3 pe-0 ps-8 block w-full bg-transparent border-t-transparent border-b-2 border-x-transparent border-b-gray-300 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-blue-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none"
                                type="email" name="email" placeholder="Enter email" :value="old('email')" required
                                autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            <div
                                class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                <svg class="shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="relative">
                            <x-text-input id="password"
                                class="peer py-3 pe-0 ps-8 block w-full bg-transparent border-t-transparent border-b-2 border-x-transparent border-b-gray-300 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-blue-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Enter password" type="password" name="password" required
                                autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <div
                                class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                <svg class="shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 18v3c0 .6.4 1 1 1h4v-3h3v-3h2l1.4-1.4a6.5 6.5 0 1 0-4-4Z"></path>
                                    <circle cx="16.5" cy="7.5" r=".5"></circle>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- forgot password -->
                <div class="flex justify-end pt-3">
                    @if (Route::has('password.request'))
                        <a class="underline text-gray-600 hover:text-gray-900 text-sm"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- login button -->
                <div class="flex justify-center py-5">
                    <button
                        class="px-3 py-2 text-center w-1/2 rounded-full bg-rose-600 hover:bg-rose-700 text-white font-bold">
                        Login
                    </button>
                </div>

                <!-- register here -->
                <div class="inline-flex gap-2 items-start justify-start mt-4">
                    <h3 class="text-gray-600 text-sm">
                        Dont have an account?
                    </h3>
                    <a href="/register" class="underline text-gray-600 hover:text-gray-900 text-sm">
                        Register here
                    </a>
                </div>

            </form>
        </div>
    </div>


</body>