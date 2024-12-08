<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('articles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create
                        Article</a>

                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">#</th>
                                <th class="border px-4 py-2">Title</th>
                                <th class="border px-4 py-2">Category</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td class="border px-4 py-2">{{ $article->id }}</td>
                                    <td class="border px-4 py-2">{{ $article->title }}</td>
                                    <td class="border px-4 py-2">{{ $article->category->name }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('articles.edit', $article) }}" class="text-blue-500">Edit</a>
                                        |
                                        <form action="{{ route('articles.destroy', $article) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
