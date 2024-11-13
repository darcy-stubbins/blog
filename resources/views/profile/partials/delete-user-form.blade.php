<div>
    <!-- headers  -->
    <div>
        <div class="text-lg font-medium text-gray-900">
            Delete Account
        </div>

        <p class="mt-1 text-sm text-gray-600">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting
            your account, please download any data or information that you wish to retain.
        </p>
        <button id="openDeleteUserFormButton" type="submit" class="bg-red-500 my-2">
            Delete Account
        </button>

        <!-- form to delete the users account  -->
        <form method="post" id="deleteUserForm" action="{{ route('profile.destroy') }}" class="p-6 h-0 overflow-hidden">
            @csrf
            @method('delete')

            <div class="mt-6">
                <!-- text input component -->
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}" />
                <!-- error message component -->
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <button type="submit" class="bg-red-500 my-2">
                Delete Account
            </button>
        </form>
    </div>
</div>