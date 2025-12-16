<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800">
            Found Items
        </h2>
    </x-slot>

    <div x-data="{ open: false, imgSrc: '' }" class="py-10 bg-blue-50 min-h-screen">

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Card with Add Button -->
            <div class="bg-white shadow-sm rounded-xl p-6 mb-6 border border-blue-100">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex items-center space-x-3">
                        <div class="bg-green-100 rounded-lg p-3">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Found Items Registry</h3>
                            <p class="text-sm text-gray-600 mt-1">Browse items waiting to be reunited with their owners</p>
                        </div>
                    </div>
                    <a href="{{ route('found-items.create') }}"
                        class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 hover:shadow-md transition-all duration-300 font-medium flex items-center justify-center space-x-2 whitespace-nowrap">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Add Found Item</span>
                    </a>
                </div>
            </div>

            <!-- FILTER BAR -->
            <form method="GET" action="{{ route('found-items.index') }}"
                class="mb-6 bg-white shadow-sm rounded-xl p-6 border border-blue-100">
                
                <div class="mb-4 pb-4 border-b border-blue-100">
                    <h4 class="text-lg font-semibold text-gray-800 flex items-center space-x-2">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        <span>Filter Items</span>
                    </h4>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <!-- Search -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Search</label>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search by item name or description"
                            class="w-full px-4 py-3 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300 hover:border-blue-300">
                    </div>

                    <!-- Location -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Location</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <input type="text" name="location" value="{{ request('location') }}"
                                placeholder="Filter by location"
                                class="w-full pl-10 pr-4 py-3 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300 hover:border-blue-300">
                        </div>
                    </div>

                    <!-- Found Date -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Found Date</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <input type="date" name="found_date" value="{{ request('found_date') }}"
                                class="w-full pl-10 pr-4 py-3 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300 hover:border-blue-300">
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-blue-100">
                    <button type="submit"
                        class="flex-1 sm:flex-none bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 hover:shadow-md transition-all duration-300 font-medium flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        <span>Apply Filter</span>
                    </button>

                    <a href="{{ route('found-items.index') }}"
                        class="flex-1 sm:flex-none bg-gray-100 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-200 border border-gray-300 transition-all duration-300 font-medium flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        <span>Reset</span>
                    </a>
                </div>

            </form>


            <!-- ---------------- ITEMS TABLE (Desktop) ---------------- -->
            <div class="hidden lg:block bg-white shadow-sm rounded-xl overflow-hidden border border-blue-100">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-blue-50 to-blue-100 text-left">
                            <th class="p-4 font-semibold text-gray-700">Photo</th>
                            <th class="p-4 font-semibold text-gray-700">Title</th>
                            <th class="p-4 font-semibold text-gray-700">Description</th>
                            <th class="p-4 font-semibold text-gray-700">Location</th>
                            <th class="p-4 font-semibold text-gray-700">Found Date</th>
                            <th class="p-4 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-blue-100">
                        @forelse ($items as $item)
                            <tr class="hover:bg-blue-50 transition-colors duration-200">
                                <!-- photo -->
                                <td class="p-4">
                                    @if($item->photo)
                                        <img src="{{ asset('storage/' . $item->photo) }}"
                                            class="w-20 h-20 object-cover rounded-lg cursor-pointer hover:opacity-70 transition-opacity duration-200 border-2 border-blue-200 hover:border-blue-400"
                                            @click="open = true; imgSrc='{{ asset('storage/' . $item->photo) }}'">
                                    @else
                                        <div class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center border-2 border-dashed border-gray-300">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </td>

                                <td class="p-4 font-medium text-gray-800">{{ $item->title }}</td>
                                <td class="p-4 text-gray-600 max-w-xs">
                                    <p class="line-clamp-2 text-sm">{{ $item->description }}</p>
                                </td>
                                <td class="p-4 text-gray-600">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        </svg>
                                        <span>{{ $item->location }}</span>
                                    </div>
                                </td>
                                <td class="p-4 text-gray-600">{{ $item->found_date }}</td>

                                <td class="p-4">
                                    <div class="flex flex-wrap gap-2">
                                        {{-- owner actions --}}
                                        @if ($item->user_id === auth()->id())
                                            <a href="{{ route('found-items.edit', $item->id) }}" 
                                                class="text-blue-600 hover:text-blue-700 font-medium hover:underline transition-colors duration-200">
                                                Edit
                                            </a>

                                            <form action="{{ route('found-items.destroy', $item->id) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600 hover:text-red-700 font-medium hover:underline transition-colors duration-200"
                                                        onclick="return confirm('Delete this item?')">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif

                                        {{-- non-owner claim --}}
                                        @php
                                            $alreadyClaimed = \App\Models\Claim::where('claimer_id', auth()->id())
                                                ->where('item_id', $item->id)
                                                ->where('type', 'found')
                                                ->whereIn('status', ['pending', 'approved'])
                                                ->exists();
                                        @endphp

                                        @if ($item->user_id !== auth()->id())
                                            @if ($alreadyClaimed)
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600 border border-gray-300">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    Claim Requested
                                                </span>
                                            @else
                                                <form action="{{ route('claim.store') }}" method="POST" class="inline-block">
                                                    @csrf
                                                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="owner_id" value="{{ $item->user_id }}">
                                                    <input type="hidden" name="type" value="found">

                                                    <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 hover:shadow-md transition-all duration-300 font-medium flex items-center space-x-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                        <span>Request Claim</span>
                                                    </button>
                                                </form>
                                            @endif
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-12">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                        </svg>
                                        <p class="text-gray-500 text-lg font-medium">No found items yet</p>
                                        <p class="text-gray-400 text-sm mt-1">Items reported as found will appear here</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- ---------------- ITEMS CARDS (Mobile/Tablet) ---------------- -->
            <div class="lg:hidden space-y-4">
                @forelse ($items as $item)
                    <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-blue-100 hover:shadow-md transition-shadow duration-300">
                        <!-- Image Section -->
                        @if($item->photo)
                            <div class="relative">
                                <img src="{{ asset('storage/' . $item->photo) }}"
                                    class="w-full h-48 object-cover cursor-pointer"
                                    @click="open = true; imgSrc='{{ asset('storage/' . $item->photo) }}'">
                                <div class="absolute top-3 right-3 bg-white rounded-full p-2 shadow-lg">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                    </svg>
                                </div>
                            </div>
                        @else
                            <div class="w-full h-48 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                <svg class="w-16 h-16 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif

                        <!-- Content Section -->
                        <div class="p-4 space-y-3">
                            <!-- Title -->
                            <h3 class="text-lg font-semibold text-gray-800">{{ $item->title }}</h3>

                            <!-- Description -->
                            <p class="text-sm text-gray-600 line-clamp-3">{{ $item->description }}</p>

                            <!-- Location and Date -->
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center space-x-2 text-gray-600">
                                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    </svg>
                                    <span>{{ $item->location }}</span>
                                </div>
                                <div class="flex items-center space-x-2 text-gray-600">
                                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>{{ $item->found_date }}</span>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="pt-3 border-t border-blue-100">
                                {{-- owner actions --}}
                                @if ($item->user_id === auth()->id())
                                    <div class="flex gap-2">
                                        <a href="{{ route('found-items.edit', $item->id) }}" 
                                            class="flex-1 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300 font-medium text-center">
                                            Edit
                                        </a>

                                        <form action="{{ route('found-items.destroy', $item->id) }}"
                                            method="POST" class="flex-1">
                                            @csrf
                                            @method('DELETE')
                                            <button class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-all duration-300 font-medium"
                                                    onclick="return confirm('Delete this item?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif

                                {{-- non-owner claim --}}
                                @php
                                    $alreadyClaimed = \App\Models\Claim::where('claimer_id', auth()->id())
                                        ->where('item_id', $item->id)
                                        ->where('type', 'found')
                                        ->whereIn('status', ['pending', 'approved'])
                                        ->exists();
                                @endphp

                                @if ($item->user_id !== auth()->id())
                                    @if ($alreadyClaimed)
                                        <div class="flex items-center justify-center px-4 py-3 rounded-lg bg-gray-100 border border-gray-300">
                                            <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-gray-600 font-medium">Claim Already Requested</span>
                                        </div>
                                    @else
                                        <form action="{{ route('claim.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                                            <input type="hidden" name="owner_id" value="{{ $item->user_id }}">
                                            <input type="hidden" name="type" value="found">

                                            <button class="w-full bg-green-600 text-white px-4 py-3 rounded-lg hover:bg-green-700 hover:shadow-md transition-all duration-300 font-medium flex items-center justify-center space-x-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span>Request Claim</span>
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white shadow-sm rounded-xl p-12 border border-blue-100 text-center">
                        <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <p class="text-gray-500 text-lg font-medium">No found items yet</p>
                        <p class="text-gray-400 text-sm mt-2">Items reported as found will appear here</p>
                    </div>
                @endforelse
            </div>

        </div>

        <!-- IMAGE MODAL -->
        <div x-show="open"
            x-cloak
            class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center p-4 z-50 transition-opacity"
            @click.self="open = false"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">

            <div class="relative max-w-5xl w-full">
                <button @click="open = false" 
                    class="absolute -top-10 right-0 text-white hover:text-gray-300 transition-colors duration-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <img :src="imgSrc" class="max-w-full max-h-[85vh] mx-auto rounded-lg shadow-2xl">
            </div>
        </div>

    </div>
</x-app-layout>