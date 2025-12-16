<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            My Claims
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- CLAIMS YOU REQUESTED --}}
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-bold mb-4 text-gray-700">
                    Claims You Requested
                </h3>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700">
                            <th class="p-3">Item</th>
                            <th class="p-3">Type</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Requested At</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($myClaims as $claim)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3">
                                    {{ optional($claim->item)->title }}
                                </td>

                                <td class="p-3">
                                    <span class="px-3 py-1 rounded bg-blue-100 text-blue-700 text-sm">
                                        {{ ucfirst($claim->type) }}
                                    </span>
                                </td>

                                <td class="p-3">
                                    <span class="px-3 py-1 rounded bg-yellow-100 text-yellow-800 text-sm">
                                        {{ ucfirst($claim->status) }}
                                    </span>
                                </td>

                                <td class="p-3">
                                    {{ $claim->created_at->format('Y-m-d') }}
                                </td>
                                <td>
                                    <form action="{{ route('claims.destroy', $claim->id) }}" method="POST" onsubmit="return confirm('Delete this claim request?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:text-red-800">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center p-6 text-gray-500">
                                    You have not made any claims.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- ✅ Pagination for "My Claims" --}}
                @if ($myClaims instanceof \Illuminate\Pagination\LengthAwarePaginator && $myClaims->hasPages())
                    <div class="mt-6">
                        {{ $myClaims->appends(request()->query())->links() }}
                    </div>
                @endif
            </div>

            {{-- CLAIMS ON YOUR ITEMS --}}
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-bold mb-4 text-gray-700">
                    Claims On Your Items
                </h3>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700">
                            <th class="p-3">Item</th>
                            <th class="p-3">Type</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Requested At</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($claimsOnMyItems as $claim)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3">
                                    {{ optional($claim->item)->title }}
                                </td>

                                <td class="p-3">
                                    <span class="px-3 py-1 rounded bg-blue-100 text-blue-700 text-sm">
                                        {{ ucfirst($claim->type) }}
                                    </span>
                                </td>

                                <td class="p-3">
                                    <span class="px-3 py-1 rounded bg-yellow-100 text-yellow-800 text-sm">
                                        {{ ucfirst($claim->status) }}
                                    </span>
                                </td>

                                <td class="p-3">
                                    {{ $claim->created_at->format('Y-m-d') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center p-6 text-gray-500">
                                    No one has claimed your items yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- ✅ Pagination for "Claims On My Items" --}}
                @if ($claimsOnMyItems instanceof \Illuminate\Pagination\LengthAwarePaginator && $claimsOnMyItems->hasPages())
                    <div class="mt-6">
                        {{ $claimsOnMyItems->appends(request()->query())->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
