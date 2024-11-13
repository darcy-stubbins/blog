<div>
    <!-- headers -->
    <div>
        <div class="text-lg font-medium text-gray-900">
            Profile Information
        </div>

        <p class="mt-1 text-sm text-gray-600">
            Update your account's profile information and email address.
        </p>
    </div>

    <!-- form to update the users info  -->
    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="p-2 pt-5">
            <label for="name">
                Name
            </label>
            <!-- text input component -->
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <!-- error message component -->
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="p-2">
            <label for="email">
                Email
            </label>
            <!-- text input component -->
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <!-- error message component -->
            <x-input-error class="mt-2" :messages="$errors->get('email')" />


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

        <div class="flex items-center gap-3 p-2">
            <!-- save button  -->
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