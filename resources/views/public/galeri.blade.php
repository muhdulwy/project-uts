@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <!-- Gallery Header -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-white mb-4">Galeri Bonsai</h1>
        <p class="text-lg text-gray-300 max-w-2xl mx-auto">Koleksi bonsai indah dari anggota PPBI Banda Aceh</p>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($galeris as $galeri)
        <div class="bg-white bg-opacity-90 backdrop-blur-sm rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
            <!-- Bonsai Image -->
            <div class="relative overflow-hidden h-64">
                <img src="{{ asset('storage/' . $galeri->foto_bonsai) }}" alt="{{ $galeri->nama_bonsai }}" 
                     class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                
                <!-- Awards Badge -->
                @if ($galeri->penghargaan_bonsai)
                <div class="absolute top-4 right-4 bg-yellow-400 text-black px-3 py-1 rounded-full text-xs font-bold shadow-md">
                    🏆 {{ $galeri->penghargaan_bonsai }}
                </div>
                @endif
            </div>

            <!-- Bonsai Details -->
            <div class="p-6">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">{{ $galeri->nama_bonsai }}</h2>
                        @if($galeri->nama_latin_bonsai)
                        <p class="text-sm text-gray-600 italic">({{ $galeri->nama_latin_bonsai }})</p>
                        @endif
                    </div>
                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">{{ $galeri->ukuran_bonsai }}</span>
                </div>

                <!-- Owner Info -->
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 rounded-full bg-green-200 flex items-center justify-center text-green-800 font-bold mr-2">
                        {{ substr($galeri->user->name, 0, 1) }}
                    </div>
                    <span class="text-sm text-gray-700">{{ $galeri->user->name }}</span>
                </div>

                <!-- Rating Section -->
                <div class="border-t border-gray-200 pt-4">
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <div class="text-yellow-400 mr-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= floor($galeri->ratings->avg('rating')))
                                        <i class="fas fa-star"></i>
                                    @elseif ($i - 0.5 <= $galeri->ratings->avg('rating'))
                                        <i class="fas fa-star-half-alt"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <span class="text-sm text-gray-700 ml-1">
                                {{ number_format($galeri->ratings->avg('rating') ?? 0, 1) }} ({{ $galeri->ratings->count() }} rating)
                            </span>
                        </div>
                    </div>

                    @auth
                    <!-- Rating Form (only for logged in users) -->
                    <form action="{{ route('rating.store') }}" method="POST" class="mt-2">
                        @csrf
                        <input type="hidden" name="id_galeri" value="{{ $galeri->id_galeri }}">
                        
                        <div class="flex items-center">
                            <div class="rating-stars flex">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input type="radio" id="star{{ $i }}-{{ $galeri->id_galeri }}" name="rating" value="{{ $i }}" 
                                           class="hidden" {{ optional($galeri->ratings->where('id_user', auth()->id())->first())->rating == $i ? 'checked' : '' }}>
                                    <label for="star{{ $i }}-{{ $galeri->id_galeri }}" class="text-2xl cursor-pointer text-gray-300 hover:text-yellow-400 transition-colors">
                                        <i class="fas fa-star"></i>
                                    </label>
                                @endfor
                            </div>
                            <button type="submit" class="ml-2 text-xs bg-green-600 hover:bg-green-700 text-white px-2 py-1 rounded transition-colors">
                                Kirim
                            </button>
                        </div>
                    </form>
                    @else
                    <div class="text-sm text-gray-500 mt-2">
                        <a href="{{ route('login') }}" class="text-green-600 hover:underline">Login</a> untuk memberikan rating
                    </div>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .rating-stars input:checked ~ label {
        color: #fbbf24;
    }
    .rating-stars label:hover,
    .rating-stars label:hover ~ label {
        color: #fbbf24;
    }
</style>
@endsection