@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <!-- Testimonial Header -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-white mb-4">Testimonial Anggota</h1>
        <p class="text-lg text-gray-300 max-w-2xl mx-auto">Pendapat dan saran dari anggota PPBI Banda Aceh</p>
    </div>

    <!-- Testimonial Form (for logged in users) -->
    @auth
    <div class="bg-white bg-opacity-90 backdrop-blur-sm rounded-xl shadow-lg p-6 mb-12">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Berikan Testimonial Anda</h2>
        <form action="{{ route('testimonial') }}" method="POST">
            @csrf
            <div class="mb-4">
                <textarea name="saran_masukan" rows="4" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Bagikan pengalaman atau saran Anda..." required></textarea>
                @error('saran_masukan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" 
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                Kirim Testimonial
            </button>
        </form>
    </div>
    @else
    <div class="bg-white bg-opacity-90 backdrop-blur-sm rounded-xl shadow-lg p-6 mb-12 text-center">
        <p class="text-gray-700 mb-4">Ingin berbagi testimonial?</p>
        <a href="{{ route('login') }}" 
           class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-medium inline-block transition-colors">
            Login untuk Memberikan Testimonial
        </a>
    </div>
    @endauth

    <!-- Testimonials List -->
    <div class="space-y-6">
        @foreach ($testimonials as $testimonial)
        <div class="bg-white bg-opacity-90 backdrop-blur-sm rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-[1.02]">
            <div class="p-6">
                <div class="flex items-center gap-x-4 mb-4">
                    <div class="bg-green-100 text-green-800 font-bold rounded-full h-12 w-12 flex items-center justify-center text-lg">
                        {{ strtoupper(substr($testimonial->user->name, 0, 1)) }}
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">{{ $testimonial->user->name }}</h3>
                        <p class="text-sm text-gray-500">
                            {{ $testimonial->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
                <div class="pl-16">
                    <p class="text-gray-700">{{ $testimonial->saran_masukan }}</p>
                </div>
            </div>
        </div>
        @endforeach

        @if($testimonials->isEmpty())
        <div class="bg-white bg-opacity-90 backdrop-blur-sm rounded-xl shadow-lg p-8 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada testimonial</h3>
            <p class="mt-1 text-sm text-gray-500">Jadilah yang pertama memberikan testimonial!</p>
        </div>
        @endif
    </div>
</div>
@endsection