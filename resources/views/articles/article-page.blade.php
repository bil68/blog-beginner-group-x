@extends('layouts.home')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        @if ($article->image)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $article->image)) }}"
                                alt="Article Image" class="w-full h-96 object-cover rounded mb-4">
                        @endif
                        <h3 class="font-semibold text-lg">Tags:</h3>
                        <ul>
                            @foreach ($tags as $tag)
                                #{{ $tag->name }}
                            @endforeach
                        </ul>
                        <h3 class="text-3xl font-bold mb-4">{{ $article->title }}</h3>
                        <p class="text-gray-600">{{ $article->full_text }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
