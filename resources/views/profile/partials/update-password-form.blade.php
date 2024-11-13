<div>
    <!-- headers  -->
    <div>
        <div class="text-lg font-medium text-gray-900">
            Update Password
        </div>

        <p class="mt-1 text-sm text-gray-600">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </div>

    <!-- form to update the users password  -->
    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="p-2 pt-5">
            <label for="update_password_current_password">
                Current Password
            </label>
            <!-- text input component -->
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                class="mt-1 block w-full" autocomplete="current-password" />
            <!-- error message component -->
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="p-2">
            <label for="update_password_password">
                New Password
            </label>
            <!-- text input component -->
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full"
                autocomplete="new-password" />
            <!-- error message component -->
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="p-2">
            <label for="update_password_password_confirmation">
                Confirm Password
            </label>
            <!-- text input component -->
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full" autocomplete="new-password" />
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