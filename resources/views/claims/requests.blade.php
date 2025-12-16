<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800">Claim Requests</h2>
    </x-slot>

    <div class="max-w-5xl mx-auto bg-white p-6 shadow mt-6 rounded-lg">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-3 border">Item</th>
                    <th class="p-3 border">Claimer</th>
                    <th class="p-3 border">Type</th>
                    <th class="p-3 border">Requested At</th>
                    <th class="p-3 border">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($claims as $claim)
                    <tr>
                        <td class="border p-3">{{ $claim->item->title }}</td>
                        <td class="border p-3">{{ $claim->claimer->name }}</td>
                        <td class="border p-3">{{ ucfirst($claim->type) }}</td>
                        <td class="border p-3">{{ $claim->created_at->format('Y-m-d') }}</td>

                        <td class="border p-3 space-x-2">
                            <form action="{{ route('claim.approve', $claim->id) }}" method="POST" class="inline">
                                @csrf
                                <button class="bg-green-600 text-white px-3 py-1 rounded">
                                    Approve
                                </button>
                            </form>

                            <form action="{{ route('claim.reject', $claim->id) }}" method="POST" class="inline">
                                @csrf
                                <button class="bg-red-600 text-white px-3 py-1 rounded">
                                    Reject
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-500">
                            No claim requests.
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
