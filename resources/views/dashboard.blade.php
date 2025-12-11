<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Card -->
            <div class="bg-white shadow-lg sm:rounded-lg p-6 flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">Welcome, {{ Auth::user()->name }}!</h3>
                    <p class="mt-2 text-gray-600">You are logged in and ready to manage Lost & Found items.</p>
                </div>
                <div class="text-gray-400 text-6xl">👋</div>
            </div>

            <!-- Quick Links / Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Lost Items Card -->
                <div class="bg-white shadow-md rounded-lg p-5 hover:shadow-xl transition">
                    <h4 class="text-lg font-medium text-gray-700">Lost Items</h4>
                    <p class="mt-2 text-gray-500">Manage and track lost items reported by users.</p>
                    <a href="#" class="mt-4 inline-block text-blue-600 hover:underline">View Lost Items →</a>
                </div>

                <!-- Found Items Card -->
                <div class="bg-white shadow-md rounded-lg p-5 hover:shadow-xl transition">
                    <h4 class="text-lg font-medium text-gray-700">Found Items</h4>
                    <p class="mt-2 text-gray-500">Check items that have been found and reported.</p>
                    <a href="#" class="mt-4 inline-block text-blue-600 hover:underline">View Found Items →</a>
                </div>

                <!-- Optional Additional Card -->
                <div class="bg-white shadow-md rounded-lg p-5 hover:shadow-xl transition">
                    <h4 class="text-lg font-medium text-gray-700">Profile</h4>
                    <p class="mt-2 text-gray-500">Update your profile and account settings.</p>
                    <a href="{{ route('profile.edit') }}" class="mt-4 inline-block text-blue-600 hover:underline">Edit Profile →</a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
