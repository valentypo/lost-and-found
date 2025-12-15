<x-app-layout>

    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            Edit Lost Item
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-md rounded-lg p-6">
                
                <form method="POST" 
                      action="{{ route('lost-items.update', $lostItem->id) }}" 
                      enctype="multipart/form-data"
                      class="space-y-5">

                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div>
                        <label class="block font-medium">Title</label>
                        <input type="text" name="title" value="{{ $lostItem->title }}"
                               class="w-full border-gray-300 rounded mt-1">
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block font-medium">Description</label>
                        <textarea name="description" rows="3"
                                  class="w-full border-gray-300 rounded mt-1">{{ $lostItem->description }}</textarea>
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="block font-medium">Location</label>
                        <input type="text" name="location" value="{{ $lostItem->location }}"
                               class="w-full border-gray-300 rounded mt-1">
                    </div>

                    <!-- Lost Date -->
                    <div>
                        <label class="block font-medium">Lost Date</label>
                        <input type="date" name="lost_date"
                               value="{{ $lostItem->lost_date }}"
                               class="w-full border-gray-300 rounded mt-1">
                    </div>

                    <!-- Current Photo -->
                    <div>
                        <label class="block font-medium mb-1">Current Photo</label>

                        @if ($lostItem->photo)
                            <img src="{{ asset('storage/'.$lostItem->photo) }}" 
                                 class="w-32 h-32 object-cover rounded border">
                        @else
                            <p class="text-gray-500">No photo uploaded.</p>
                        @endif
                    </div>

                    <!-- Change Photo -->
                    <div>
                        <label class="block font-medium">Change Photo</label>
                        <input type="file" name="photo" class="mt-1">
                    </div>

                    <!-- Submit -->
                    <div class="pt-4">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Update Item
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>
