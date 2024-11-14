<div>
    <!-- headers  -->
    <div>
        <h3 class="font-bold text-2xl text-gray-900">
            Update Password
        </h3>

        <p class="mt-1 text-sm text-gray-700">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </div>

    <!-- form to update the users password  -->
    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="p-2 pt-5">
            <label for="update_password_current_password" class="text-gray-700 text-sm">
                Current Password
            </label>
            <!-- text input component -->
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-50"
                autocomplete="current-password" />
            <!-- error message component -->
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="p-2">
            <label for="update_password_password" class="text-gray-700 text-sm">
                New Password
            </label>
            <!-- text input component -->
            <x-text-input id="update_password_password" name="password" type="password"
                class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-50"
                autocomplete="new-password" />
            <!-- error message component -->
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="p-2">
            <label for="update_password_password_confirmation" class="text-gray-700 text-sm">
                Confirm Password
            </label>
            <!-- text input component -->
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-50"
                autocomplete="new-password" />
            <!-- error message component -->
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-3 p-2">
            <!-- save button  -->
            <button class="px-3 py-2 text-center bg-rose-600 hover:bg-rose-700 text-white rounded-lg">
                Save
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</div>