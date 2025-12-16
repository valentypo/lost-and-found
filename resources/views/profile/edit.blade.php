<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold leading-tight">
            {{ __('Profile Settings') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-blue-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Update Profile Info -->
            <div class="bg-white border border-blue-100 rounded-xl shadow-sm">
                <div class="px-6 py-4 border-b border-blue-100">
                    <h3 class="text-lg font-semibold">
                        Profile Information
                    </h3>
                    <p class="text-sm text-gray-500">
                        Update your name and email address
                    </p>
                </div>

                <div class="p-6">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-white border border-blue-100 rounded-xl shadow-sm">
                <div class="px-6 py-4 border-b border-blue-100">
                    <h3 class="text-lg font-semibold">
                        Change Password
                    </h3>
                    <p class="text-sm text-gray-500">
                        Make sure your password is secure
                    </p>
                </div>

                <div class="p-6">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Delete Account -->
            <div class="bg-white border border-red-200 rounded-xl shadow-sm">
                <div class="px-6 py-4 border-b border-red-200">
                    <h3 class="text-lg font-semibold text-red-600">
                        Delete Account
                    </h3>
                    <p class="text-sm text-red-500">
                        This action is permanent and cannot be undone
                    </p>
                </div>

                <div class="p-6">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>