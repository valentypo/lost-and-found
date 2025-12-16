<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800">
            Found Items
        </h2>
    </x-slot>

    <div x-data="{ open: false, imgSrc: '' }" class="py-10 bg-gray-50 min-h-screen">

        <div class="max-w-6xl mx-auto bg-white p-6 shadow rounded-lg">

            <a href="{{ route('found-items.create') }}"
               class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">
                + Add Found Item
            </a>

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

                            <td class="border p-3">
                                <a href="{{ route('found-items.edit', $item->id) }}" class="text-blue-600">Edit</a> |

                                <form action="{{ route('found-items.destroy', $item->id) }}"
                                      method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600" onclick="return confirm('Delete this item?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500">No found items yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

        <!-- FULL SCREEN IMAGE MODAL -->
        <div x-show="open"
             class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center p-4"
             @click.self="open = false">

            <img :src="imgSrc" class="max-w-full max-h-full rounded shadow-lg">
        </div>

    </div>
</x-app-layout>
