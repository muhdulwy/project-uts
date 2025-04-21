@extends('layouts.app')
@section('content')
<h1 class="text-white text-3xl font-bold mb-8">Daftar Anggota</h1>

<div class="grid md:grid-cols-4 gap-6">
    @foreach ($users as $user)
        <div class="bg-white rounded-xl shadow-md text-center p-4">
            <img src="{{ asset('storage/' . $user->foto_anggota) }}" alt="{{ $user->name }}"
                class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
            <h2 class="font-semibold text-lg">{{ $user->name }}</h2>
            <p class="text-gray-600 text-sm">{{ $user->email }}</p>
            {{-- <span class="text-xs inline-block mt-2 px-2 py-1 bg-blue-100 text-blue-600 rounded-full capitalize">
                {{ $user->role }}
            </span> --}}
        </div>
    @endforeach
</div>
@endsection
