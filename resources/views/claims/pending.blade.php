<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">Pending Claims (Requires Your Action)</h2>
    </x-slot>

    <div class="max-w-5xl mx-auto mt-6 bg-white shadow p-6 rounded">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-3">Item</th>
                    <th class="border p-3">From User</th>
                    <th class="border p-3">Type</th>
                    <th class="border p-3">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($claims as $claim)
                    <tr>
                        <td class="border p-3">{{ $claim->item->title }}</td>
                        <td class="border p-3">{{ $claim->user->name }}</td>
                        <td class="border p-3">{{ ucfirst($claim->type) }}</td>
                        <td class="border p-3">
                            <a href="{{ route('claims.show', $claim->id) }}" class="text-blue-600">
                                Review
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-6 text-gray-500">
                            No pending claims.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if($claims->hasPages())
            <div class="mt-6">
                {{ $claims->appends(request()->query())->links() }}
            </div>
        @endif

    </div>
</x-app-layout>
