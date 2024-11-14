<div>
    <!-- headers -->
    <div>
        <h3 class="font-bold text-2xl text-gray-900">
            Profile Information
        </h3>

        <p class="mt-1 text-sm text-gray-700">
            Update your account's profile information and email address.
        </p>
    </div>

    <!-- form to update the users info  -->
    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <!-- chnage name -->
        <div class="p-2 pt-5">
            <label for="name" class="text-gray-700 text-sm">
                Name
            </label>
            <x-text-input id="name" name="name" type="text"
                class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-50"
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- change email -->
        <div class="p-2">
            <label for="email" class="text-gray-700 text-sm">
                Email
            </label>
            <x-text-input id="email" name="email" type="email"
                class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-50"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />


            <!-- email verification  -->
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <div class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </div>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- save button  -->
        <div class="flex items-center gap-3 p-2">
            <button class="px-3 py-2 text-center bg-rose-600 hover:bg-rose-700 text-white rounded-lg">
                Save
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</div>