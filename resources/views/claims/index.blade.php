<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            My Claims
        </h2>
    </x-slot>

    <div class="py-10 bg-blue-50 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- CLAIMS YOU REQUESTED --}}
            <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-blue-100">
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-6 border-b border-blue-200">
                    <div class="flex items-center space-x-3">
                        <div class="bg-blue-600 rounded-lg p-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Claims You Requested</h3>
                            <p class="text-sm text-gray-600 mt-1">Track the status of your claim requests</p>
                        </div>
                    </div>
                </div>

                <!-- Desktop Table -->
                <div class="hidden lg:block overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 text-gray-700 border-b border-blue-100">
                                <th class="p-4 text-left font-semibold">Item</th>
                                <th class="p-4 text-left font-semibold">Type</th>
                                <th class="p-4 text-left font-semibold">Status</th>
                                <th class="p-4 text-left font-semibold">Requested At</th>
                                <th class="p-4 text-left font-semibold">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-blue-100">
                            @forelse ($myClaims as $claim)
                                <tr class="hover:bg-blue-50 transition-colors duration-200">
                                    <td class="p-4 font-medium text-gray-800">
                                        {{ optional($claim->item)->title }}
                                    </td>

                                    <td class="p-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                            {{ $claim->type === 'found' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                            {{ ucfirst($claim->type) }}
                                        </span>
                                    </td>

                                    <td class="p-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                            {{ $claim->status === 'approved' ? 'bg-green-100 text-green-700' : '' }}
                                            {{ $claim->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                            {{ $claim->status === 'rejected' ? 'bg-red-100 text-red-700' : '' }}
                                            {{ $claim->status === 'finished' ? 'bg-gray-100 text-gray-700' : '' }}">
                                            {{ ucfirst($claim->status) }}
                                        </span>
                                    </td>

                                    <td class="p-4">
                                        <div class="space-y-2">
                                            <div class="text-gray-600 text-sm">
                                                {{ $claim->created_at->format('M d, Y') }}
                                            </div>

                                            @if ($claim->status === 'approved' && optional($claim->item)->contact_number)
                                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $claim->item->contact_number) }}"
                                                target="_blank"
                                                class="inline-flex items-center bg-green-600 text-white px-3 py-1.5 rounded-lg text-sm hover:bg-green-700 hover:shadow-md transition-all duration-300 font-medium space-x-1">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                                    </svg>
                                                    <span>Contact Owner</span>
                                                </a>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="p-4">
                                        <form action="{{ route('claims.destroy', $claim->id) }}" method="POST" onsubmit="return confirm('Delete this claim request?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-700 font-medium hover:underline transition-colors duration-200">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-12">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                            </svg>
                                            <p class="text-gray-500 text-lg font-medium">No claims yet</p>
                                            <p class="text-gray-400 text-sm mt-1">You haven't made any claim requests</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Cards -->
                <div class="lg:hidden p-4 space-y-4">
                    @forelse ($myClaims as $claim)
                        <div class="bg-gradient-to-br from-blue-50 to-white p-4 rounded-lg border border-blue-200 shadow-sm">
                            <div class="space-y-3">
                                <!-- Item Title -->
                                <div>
                                    <div class="text-xs text-gray-500 mb-1">Item</div>
                                    <div class="font-semibold text-gray-800">{{ optional($claim->item)->title }}</div>
                                </div>

                                <!-- Type & Status -->
                                <div class="flex gap-2">
                                    <div>
                                        <div class="text-xs text-gray-500 mb-1">Type</div>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                            {{ $claim->type === 'found' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                            {{ ucfirst($claim->type) }}
                                        </span>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500 mb-1">Status</div>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                            {{ $claim->status === 'approved' ? 'bg-green-100 text-green-700' : '' }}
                                            {{ $claim->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                            {{ $claim->status === 'rejected' ? 'bg-red-100 text-red-700' : '' }}
                                            {{ $claim->status === 'finished' ? 'bg-gray-100 text-gray-700' : '' }}">
                                            {{ ucfirst($claim->status) }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Date -->
                                <div>
                                    <div class="text-xs text-gray-500 mb-1">Requested At</div>
                                    <div class="text-sm text-gray-600">{{ $claim->created_at->format('M d, Y') }}</div>
                                </div>

                                <!-- Contact Button -->
                                @if ($claim->status === 'approved' && optional($claim->item)->contact_number)
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $claim->item->contact_number) }}"
                                    target="_blank"
                                    class="block text-center bg-green-600 text-white px-4 py-2.5 rounded-lg text-sm hover:bg-green-700 transition-all duration-300 font-medium">
                                        <div class="flex items-center justify-center space-x-2">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                            </svg>
                                            <span>Contact Owner via WhatsApp</span>
                                        </div>
                                    </a>
                                @endif

                                <!-- Delete Button -->
                                <form action="{{ route('claims.destroy', $claim->id) }}" method="POST" onsubmit="return confirm('Delete this claim request?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-all duration-300 font-medium">
                                        Delete Claim
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p class="text-gray-500 text-lg font-medium">No claims yet</p>
                            <p class="text-gray-400 text-sm mt-1">You haven't made any claim requests</p>
                        </div>
                    @endforelse
                </div>

                {{-- Pagination for "My Claims" --}}
                @if ($myClaims instanceof \Illuminate\Pagination\LengthAwarePaginator && $myClaims->hasPages())
                    <div class="p-4 border-t border-blue-100">
                        {{ $myClaims->appends(request()->query())->links() }}
                    </div>
                @endif
            </div>

            {{-- CLAIMS ON YOUR ITEMS --}}
            <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-blue-100">
                <!-- Header -->
                <div class="bg-gradient-to-r from-purple-50 to-purple-100 p-6 border-b border-purple-200">
                    <div class="flex items-center space-x-3">
                        <div class="bg-purple-600 rounded-lg p-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Claims On Your Items</h3>
                            <p class="text-sm text-gray-600 mt-1">Manage claim requests from others</p>
                        </div>
                    </div>
                </div>

                <!-- Desktop Table -->
                <div class="hidden lg:block overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 text-gray-700 border-b border-blue-100">
                                <th class="p-4 text-left font-semibold">Item</th>
                                <th class="p-4 text-left font-semibold">Type</th>
                                <th class="p-4 text-left font-semibold">Status</th>
                                <th class="p-4 text-left font-semibold">Requested At</th>
                                <th class="p-4 text-left font-semibold">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-blue-100">
                            @forelse ($claimsOnMyItems as $claim)
                                <tr class="hover:bg-blue-50 transition-colors duration-200">
                                    <td class="p-4 font-medium text-gray-800">
                                        {{ optional($claim->item)->title }}
                                    </td>

                                    <td class="p-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                            {{ $claim->type === 'found' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                            {{ ucfirst($claim->type) }}
                                        </span>
                                    </td>

                                    <td class="p-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                            {{ $claim->status === 'approved' ? 'bg-green-100 text-green-700' : '' }}
                                            {{ $claim->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                            {{ $claim->status === 'rejected' ? 'bg-red-100 text-red-700' : '' }}
                                            {{ $claim->status === 'finished' ? 'bg-gray-100 text-gray-700' : '' }}">
                                            {{ ucfirst($claim->status) }}
                                        </span>
                                    </td>

                                    <td class="p-4 text-gray-600 text-sm">
                                        {{ $claim->created_at->format('M d, Y') }}
                                    </td>

                                    <td class="p-4">
                                        <div class="flex flex-wrap gap-2">
                                            @if ($claim->status === 'pending')
                                                <form action="{{ route('claim.approve', $claim->id) }}"
                                                    method="POST"
                                                    class="inline">
                                                    @csrf
                                                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 hover:shadow-md transition-all duration-300 font-medium">
                                                        Accept
                                                    </button>
                                                </form>

                                                <form action="{{ route('claim.reject', $claim->id) }}"
                                                    method="POST"
                                                    class="inline">
                                                    @csrf
                                                    <button class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700 hover:shadow-md transition-all duration-300 font-medium">
                                                        Reject
                                                    </button>
                                                </form>
                                            @endif

                                            @if ($claim->status === 'approved')
                                                <form action="{{ route('claim.finish', $claim->id) }}"
                                                    method="POST"
                                                    class="inline">
                                                    @csrf
                                                    <button class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 hover:shadow-md transition-all duration-300 font-medium">
                                                        Finish Process
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-12">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                            </svg>
                                            <p class="text-gray-500 text-lg font-medium">No claims yet</p>
                                            <p class="text-gray-400 text-sm mt-1">No one has claimed your items yet</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Cards -->
                <div class="lg:hidden p-4 space-y-4">
                    @forelse ($claimsOnMyItems as $claim)
                        <div class="bg-gradient-to-br from-purple-50 to-white p-4 rounded-lg border border-purple-200 shadow-sm">
                            <div class="space-y-3">
                                <!-- Item Title -->
                                <div>
                                    <div class="text-xs text-gray-500 mb-1">Item</div>
                                    <div class="font-semibold text-gray-800">{{ optional($claim->item)->title }}</div>
                                </div>

                                <!-- Type & Status -->
                                <div class="flex gap-2">
                                    <div>
                                        <div class="text-xs text-gray-500 mb-1">Type</div>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                            {{ $claim->type === 'found' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                            {{ ucfirst($claim->type) }}
                                        </span>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500 mb-1">Status</div>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                            {{ $claim->status === 'approved' ? 'bg-green-100 text-green-700' : '' }}
                                            {{ $claim->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                            {{ $claim->status === 'rejected' ? 'bg-red-100 text-red-700' : '' }}
                                            {{ $claim->status === 'finished' ? 'bg-gray-100 text-gray-700' : '' }}">
                                            {{ ucfirst($claim->status) }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Date -->
                                <div>
                                    <div class="text-xs text-gray-500 mb-1">Requested At</div>
                                    <div class="text-sm text-gray-600">{{ $claim->created_at->format('M d, Y') }}</div>
                                </div>

                                <!-- Action Buttons -->
                                @if ($claim->status === 'pending')
                                    <div class="flex gap-2 pt-2">
                                        <form action="{{ route('claim.approve', $claim->id) }}"
                                            method="POST"
                                            class="flex-1">
                                            @csrf
                                            <button class="w-full bg-blue-600 text-white px-4 py-2.5 rounded-lg text-sm hover:bg-blue-700 transition-all duration-300 font-medium">
                                                Accept
                                            </button>
                                        </form>

                                        <form action="{{ route('claim.reject', $claim->id) }}"
                                            method="POST"
                                            class="flex-1">
                                            @csrf
                                            <button class="w-full bg-red-600 text-white px-4 py-2.5 rounded-lg text-sm hover:bg-red-700 transition-all duration-300 font-medium">
                                                Reject
                                            </button>
                                        </form>
                                    </div>
                                @endif

                                @if ($claim->status === 'approved')
                                    <form action="{{ route('claim.finish', $claim->id) }}"
                                        method="POST"
                                        class="pt-2">
                                        @csrf
                                        <button class="w-full bg-green-600 text-white px-4 py-2.5 rounded-lg text-sm hover:bg-green-700 transition-all duration-300 font-medium">
                                            Finish Process
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            <p class="text-gray-500 text-lg font-medium">No claims yet</p>
                            <p class="text-gray-400 text-sm mt-1">No one has claimed your items yet</p>
                        </div>
                    @endforelse
                </div>

                {{-- Pagination for "Claims On My Items" --}}
                @if ($claimsOnMyItems instanceof \Illuminate\Pagination\LengthAwarePaginator && $claimsOnMyItems->hasPages())
                    <div class="p-4 border-t border-blue-100">
                        {{ $claimsOnMyItems->appends(request()->query())->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>