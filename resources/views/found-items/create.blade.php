<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800">Add Found Item</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white p-6 mt-6 shadow rounded-lg">

        <form action="{{ route('found-items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="font-semibold">Title</label>
            <input type="text" name="title" class="w-full border p-2 rounded mb-4">

            <label class="font-semibold">Description</label>
            <textarea name="description" class="w-full border p-2 rounded mb-4"></textarea>

            <label class="font-semibold">Location Found</label>
            <input type="text" name="location" class="w-full border p-2 rounded mb-4">

            <label class="font-semibold">Found Date</label>
            <input type="date" name="found_date" class="w-full border p-2 rounded mb-4">

            <label class="font-semibold">Photo</label>
            <input type="file" name="photo" class="mb-4">
            <br>
            <label class="font-semibold">WhatsApp Contact Number</label>
            <input type="text" name="contact_number" placeholder="08xxxxxxxxxx" class="w-full border p-2 rounded mb-4">

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Save
            </button>
        </form>

    </div>
</x-app-layout>

