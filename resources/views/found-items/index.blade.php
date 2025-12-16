<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800">
            Found Items
        </h2>
    </x-slot>

    <div x-data="{ open: false, imgSrc: '' }" class="py-10 bg-gray-50 min-h-screen">

        <div class="max-w-6xl mx-auto bg-white p-6 shadow rounded-lg">

            <a href="{{ route('found-items.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
                + Add Found Item
            </a>

            <!-- FILTER BAR -->
            <form method="GET" action="{{ route('found-items.index') }}"
                class="mb-6 bg-gray-100 p-4 rounded-lg shadow flex flex-col md:flex-row md:items-end gap-4">

                <!-- Search -->
                <div class="flex-1">
                    <label class="block text-sm font-semibold mb-1">Search</label>
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search by item name or description"
                        class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Location -->
                <div class="flex-1">
                    <label class="block text-sm font-semibold mb-1">Location</label>
                    <input type="text" name="location" value="{{ request('location') }}"
                        placeholder="Filter by location"
                        class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Found Date -->
                <div class="flex-1">
                    <label class="block text-sm font-semibold mb-1">Found Date</label>
                    <input type="date" name="found_date" value="{{ request('found_date') }}"
                        class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Buttons -->
                <div class="flex gap-2">
                    <button
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Apply Filter
                    </button>

                    <a href="{{ route('found-items.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                        Reset
                    </a>
                </div>

            </form>


            <!-- ---------------- ITEMS TABLE ---------------- -->
            <table class="w-full mt-4 border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="border p-3">Photo</th>
                        <th class="border p-3">Title</th>
                        <th class="border p-3">Location</th>
                        <th class="border p-3">Found Date</th>
                        <th class="border p-3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <!-- photo -->
                            <td class="border p-3">
                                @if($item->photo)
                                    <img src="{{ asset('storage/' . $item->photo) }}"
                                        class="w-20 h-20 object-cover rounded cursor-pointer hover:opacity-70"
                                        @click="open = true; imgSrc='{{ asset('storage/' . $item->photo) }}'">
                                @else
                                    <span class="text-gray-500">No Photo</span>
                                @endif
                            </td>

                            <td class="border p-3">{{ $item->title }}</td>
                            <td class="border p-3">{{ $item->location }}</td>
                            <td class="border p-3">{{ $item->found_date }}</td>

                            <td class="border p-3 space-y-2">

                            {{-- owner actions --}}
                            @if ($item->user_id === auth()->id())
                                <a href="{{ route('found-items.edit', $item->id) }}" class="text-blue-600">Edit</a>

                                <form action="{{ route('found-items.destroy', $item->id) }}"
                                    method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 ml-2"
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
                                    <span class="text-gray-500 text-sm italic">
                                        Claim already requested
                                    </span>
                                @else
                                    <form action="{{ route('claim.store') }}" method="POST" class="inline-block">
                                        @csrf
                                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                                        <input type="hidden" name="owner_id" value="{{ $item->user_id }}">
                                        <input type="hidden" name="type" value="found">

                                        <button class="bg-green-600 text-white px-3 py-1 rounded">
                                            Request Claim
                                        </button>
                                    </form>
                                @endif
                            @endif

                        </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500">
                                No found items yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

        <!-- IMAGE MODAL  -->
        <div x-show="open"
            class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center p-4"
            @click.self="open = false">

            <img :src="imgSrc" class="max-w-full max-h-full rounded shadow-lg">
        </div>

    </div>
</x-app-layout>
