<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl">Add Lost Item</h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('lost-items.store') }}" 
              method="POST" 
              enctype="multipart/form-data"
              class="space-y-4">

            @csrf

            <div>
                <label class="block">Title</label>
                <input type="text" name="title" class="w-full border rounded">
            </div>

            <div>
                <label class="block">Description</label>
                <textarea name="description" class="w-full border rounded"></textarea>
            </div>

            <div>
                <label class="block">Location</label>
                <input type="text" name="location" class="w-full border rounded">
            </div>

            <div>
                <label class="block">Lost Date</label>
                <input type="date" name="lost_date" class="w-full border rounded">
            </div>

            <div>
                <label class="block">Photo</label>
                <input type="file" name="photo">
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Save
            </button>

        </form>
    </div>
</x-app-layout>
