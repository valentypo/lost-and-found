<x-app-layout>
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">

        <h1 class="text-2xl font-bold mb-6">Edit Found Item</h1>

        <form action="{{ route('found-items.update', $foundItem->id) }}" 
              method="POST" enctype="multipart/form-data" class="space-y-4">

            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label class="block font-semibold">Title</label>
                <input type="text" name="title" value="{{ $foundItem->title }}"
                       class="w-full border rounded p-2">
            </div>

            <!-- Description -->
            <div>
                <label class="block font-semibold">Description</label>
                <textarea name="description"
                          class="w-full border rounded p-2 h-24">{{ $foundItem->description }}</textarea>
            </div>

            <!-- Location -->
            <div>
                <label class="block font-semibold">Location Found</label>
                <input type="text" name="location" value="{{ $foundItem->location }}"
                       class="w-full border rounded p-2">
            </div>

            <!-- Found Date -->
            <div>
                <label class="block font-semibold">Found Date</label>
                <input type="date" name="found_date" value="{{ $foundItem->found_date }}"
                       class="w-full border rounded p-2">
            </div>

            <!-- Photo -->
            <div>
                <label class="block font-semibold">Current Photo</label>
                
                @if ($foundItem->photo)
                    <img src="{{ asset('storage/'.$foundItem->photo) }}" 
                         class="w-32 h-32 object-cover rounded border">
                @else
                    <p class="text-gray-500">No photo uploaded.</p>
                @endif
            </div>

            <!-- Upload New Photo -->
            <div>
                <label class="block font-semibold">Change Photo</label>
                <input type="file" name="photo" class="block">
            </div>

            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Item
            </button>

        </form>

    </div>
</x-app-layout>


