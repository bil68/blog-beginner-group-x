@extends('layouts.home')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold mb-4">All Articles</h3>

                    <!-- Filter by Category -->
                    <form action="{{ route('home') }}" method="GET" class="mb-6">
                        <label for="category" class="mr-4">Filter by Category:</label>
                        <select name="category_id" id="category" class="border-gray-300 rounded-md shadow-sm">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request()->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-4">Apply Filter</button>
                    </form>

                    @foreach ($articles as $article)
                        <div class="mb-6 p-4 border-b border-gray-300">
                            <div class="flex">
                                @if ($article->image)
                                    <img src="{{ asset('storage/' . str_replace('public/', '', $article->image)) }}"
                                        alt="Article Image" class="w-32 h-32 object-cover rounded mr-4">
                                @endif

                                <div>
                                    <h4 class="text-xl font-bold">
                                        <a href="{{ route('articles.show', $article->id) }}"
                                            class="text-blue-600 hover:underline">
                                            {{ $article->title }}
                                        </a>
                                    </h4>
                                    <p class="text-gray-600">{{ \Str::limit($article->full_text, 100) }}...</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
