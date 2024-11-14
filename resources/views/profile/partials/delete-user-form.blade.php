<div>
    <!-- headers  -->
    <div>
        <h3 class="font-bold text-2xl text-gray-900">
            Delete Account
        </h3>

        <p class="mt-1 text-sm text-gray-700">
            Once your account is deleted you will not be able to re-activate it.
        </p>

        <!-- delete account button that opens up the password input to confirm  -->
        <div class="py-5">
            <button id="openDeleteUserFormButton" type="submit"
                class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300">
                Delete account
            </button>
        </div>

        <!-- form to delete the users account  -->
        <form method="post" id="deleteUserForm" action="{{ route('profile.destroy') }}" class="h-0 overflow-hidden">
            @csrf
            @method('delete')

            <div class="mt-6">
                <x-text-input id="password" name="password" type="password"
                    class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-50"
                    placeholder="{{ __('Password') }}" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <!-- delete button  -->
            <div class="py-5">
                <button type="submit"
                    class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300">
                    Delete
                </button>
            </div>
        </form>
    </div>
</div>