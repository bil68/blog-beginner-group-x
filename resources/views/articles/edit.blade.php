<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('articles.update', $article->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Title</label>
                            <input type="text" name="title" id="title"
                                class="w-full border-gray-300 rounded-md shadow-sm"
                                value="{{ old('title', $article->title) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="category_id" class="block text-gray-700">Category</label>
                            <select name="category_id" id="category_id"
                                class="w-full border-gray-300 rounded-md shadow-sm" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $article->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="tags" class="block text-gray-700">Tags</label>
                            <select name="tags[]" id="tags" class="w-full border-gray-300 rounded-md shadow-sm"
                                multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        @if ($article->tags->contains($tag->id)) selected @endif>
                                        {{ $tag->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700">Image</label>
                            <input type="file" name="image" id="image"
                                class="w-full border-gray-300 rounded-md shadow-sm">
                            @if ($article->image)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($article->image) }}" alt="Article Image"
                                        class="w-32 h-32 object-cover rounded">
                                </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="full_text" class="block text-gray-700">Full Text</label>
                            <textarea name="full_text" id="full_text" rows="5" class="w-full border-gray-300 rounded-md shadow-sm">{{ old('full_text', $article->full_text) }}</textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
