<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800">Claim Details</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white p-6 shadow rounded-lg mt-6">

        <h3 class="text-xl font-semibold mb-4">{{ $claim->item->title }}</h3>

        <p><strong>Requested By:</strong> {{ $claim->user->name }}</p>
        <p><strong>Type:</strong> {{ ucfirst($claim->type) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($claim->status) }}</p>

        <div class="mt-4">
            <img src="{{ asset('storage/' . $claim->item->photo) }}"
                 class="w-48 h-48 object-cover rounded">
        </div>

        <div class="mt-6">

            @if(auth()->id() == $claim->owner_id && $claim->status == 'pending')
                <form action="{{ route('claims.approve', $claim->id) }}" method="POST" class="inline-block">
                    @csrf
                    <button class="bg-green-600 text-white px-4 py-2 rounded">
                        Approve Claim
                    </button>
                </form>

                <form action="{{ route('claims.reject', $claim->id) }}" method="POST" class="inline-block ml-2">
                    @csrf
                    <button class="bg-red-600 text-white px-4 py-2 rounded">
                        Reject Claim
                    </button>
                </form>
            @endif

        </div>
    </div>
</x-app-layout>
