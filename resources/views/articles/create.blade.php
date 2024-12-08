<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Title</label>
                            <input type="text" name="title" id="title"
                                class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="category_id" class="block text-gray-700">Category</label>
                            <select name="category_id" id="category_id"
                                class="w-full border-gray-300 rounded-md shadow-sm" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="tags" class="block text-gray-700">Tags</label>
                            <select name="tags[]" id="tags" class="w-full border-gray-300 rounded-md shadow-sm"
                                multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700">Image</label>
                            <input type="file" name="image" id="image"
                                class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label for="full_text" class="block text-gray-700">Full Text</label>
                            <textarea name="full_text" id="full_text" rows="5" class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
