<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Welcome Card -->
            <div class="bg-white shadow-sm rounded-xl p-8 border-l-4 border-blue-400 flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">Welcome back, {{ Auth::user()->name }}!</h3>
                    <p class="mt-2 text-gray-600 text-lg">You are logged in and ready to manage Lost & Found items.</p>
                </div>
                <div class="text-blue-400 text-7xl">👋</div>
            </div>

            <!-- Quick Links / Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Lost Items Card -->
                <div class="bg-white shadow-sm rounded-xl p-6 border border-blue-100 hover:shadow-md hover:border-blue-300 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-blue-100 rounded-lg p-3">
                            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Lost Items</h4>
                    <p class="text-gray-600 mb-4 text-sm">Manage and track lost items reported by users.</p>
                    <a href="{{ route('lost-items.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors">
                        View Lost Items 
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Found Items Card -->
                <div class="bg-white shadow-sm rounded-xl p-6 border border-blue-100 hover:shadow-md hover:border-blue-300 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-blue-100 rounded-lg p-3">
                            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Found Items</h4>
                    <p class="text-gray-600 mb-4 text-sm">Check items that have been found and reported.</p>
                    <a href="{{ route('found-items.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors">
                        View Found Items 
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Claims Card -->
                <div class="bg-white shadow-sm rounded-xl p-6 border border-blue-100 hover:shadow-md hover:border-blue-300 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-blue-100 rounded-lg p-3">
                            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Claims</h4>
                    <p class="text-gray-600 mb-4 text-sm">Request, review, and track item ownership claims.</p>
                    <a href="{{ route('claims.index') }}"
                        class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors">
                        Go to Claims 
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Profile Card -->
                <div class="bg-white shadow-sm rounded-xl p-6 border border-blue-100 hover:shadow-md hover:border-blue-300 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-blue-100 rounded-lg p-3">
                            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Profile</h4>
                    <p class="text-gray-600 mb-4 text-sm">Update your profile and account settings.</p>
                    <a href="{{ route('profile.edit') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors">
                        Edit Profile 
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>