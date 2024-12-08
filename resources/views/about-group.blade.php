@extends('layouts.home')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold mb-4">About Our Group</h2>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <!-- Anggota 1 -->
                        <div class="text-center">
                            <img src="{{ Storage::url('user1.jpg') }}" alt="Anggota 1"
                                class="w-32 h-32 rounded-full mx-auto mb-2">
                            <h3 class="font-semibold">Bilal</h3>
                            <p class="text-gray-500">NIM: 235150607111001</p>
                        </div>

                        <!-- Anggota 2 -->
                        <div class="text-center">
                            <img src="{{ Storage::url('user1.jpg') }}" alt="Anggota 2"
                                class="w-32 h-32 rounded-full mx-auto mb-2">
                            <h3 class="font-semibold">Risma Aullia Zairull Ikhrom</h3>
                            <p class="text-gray-500">NIM: 87654321</p>
                        </div>

                        <!-- Anggota 3 -->
                        <div class="text-center">
                            <img src="{{ Storage::url('user1.jpg') }}" alt="Anggota 3"
                                class="w-32 h-32 rounded-full mx-auto mb-2">
                            <h3 class="font-semibold">Dandy Al-Farisi Natanegara</h3>
                            <p class="text-gray-500">NIM: 235150600111012</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
