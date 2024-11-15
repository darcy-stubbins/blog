<body>
    @section('navbar')
    <nav class="flex grid grid-cols-3 gap-4 justify-center py-5 px-6 bg-rose-200">
        <div class="flex col-start-2 justify-center">
            <!-- home -->
            <a href="/post"
                class="text-4xl {{ Route::current()->getName() == 'post.index' ? 'text-rose-600' : 'text-white' }} hover:text-rose-500 p-5"><svg
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
                    <path
                        d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                    <path
                        d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                </svg>
            </a>
            <!-- create -->
            <a href="/post/create"
                class="text-4xl {{ Route::current()->getName() == 'post.create' ? 'text-rose-600' : 'text-white' }} hover:text-rose-500 p-5"><svg
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
                    <path
                        d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        <div class="flex col-start-3 justify-end pr-20">
            <!-- profile -->
            <div class="relative inline-block text-left dropdown">
                <button
                    class="transition duration-150 ease-in-out text-4xl {{ Route::current()->getName() == 'profile.edit' || Route::current()->getName() == 'profile.show' ? 'text-rose-600' : 'text-white' }} hover:text-rose-500 p-5"
                    type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-117">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
                        <path fill-rule="evenodd"
                            d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <!-- hidden dropdown  -->
                <div class="hidden dropdown-menu">
                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                        aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                        <div class="px-4 py-3">
                            <div class="text-sm">Signed in as {{ Auth::user()->name }}</div>
                        </div>
                        <div class="py-1">
                            <!-- Profile -->
                            <a href="{{ route('profile.show') }}"
                                class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm text-left"
                                role="menuitem">Profile</a>
                            <!--Settings -->
                            <a href="{{ route('profile.edit') }}"
                                class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm text-left"
                                role="menuitem">Settings</a>
                            <!-- log out -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm text-left"
                                    href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <style>
                .dropdown:focus-within .dropdown-menu {
                    /* @apply block; */
                    display: block;
                }
            </style>
        </div>
    </nav>
    @endsection
</body>