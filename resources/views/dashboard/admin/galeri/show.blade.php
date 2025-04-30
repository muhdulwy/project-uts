@extends('layouts.neon')

@section('content')
<div class="h-screen flex flex-col bg-gray-50">
  <!-- Fixed Header -->
  <header class="bg-white shadow-sm flex-shrink-0">
    <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8 flex justify-between items-center">
      <h1 class="text-xl md:text-2xl font-bold text-gray-900">
        <span class="text-blue-600">Detail</span> Bonsai
      </h1>
      <a href="{{ route('admin.galeri.index') }}" 
         class="flex items-center space-x-1 bg-gradient-to-r from-gray-600 to-gray-500 hover:from-gray-700 hover:to-gray-600 text-white px-3 py-1.5 text-sm rounded-lg shadow hover:shadow-md transition-all">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        <span class="hidden sm:inline">Kembali</span>
      </a>
    </div>
  </header>

  <!-- Scrollable Content -->
  <main class="flex-1 overflow-y-auto py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
      <!-- Bonsai Card -->
      <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="md:flex">
          <!-- Image Section -->
          <div class="md:w-1/2 p-4 sm:p-6">
            <div class="aspect-w-4 aspect-h-3 rounded-lg overflow-hidden border border-gray-200 bg-gray-100">
              <img class="w-full h-full object-cover" 
                   src="{{ asset('storage/' . $galeri->foto_bonsai) }}" 
                   alt="{{ $galeri->nama_bonsai }}"
                   onerror="this.src='{{ asset('images/default-bonsai.jpg') }}'">
            </div>
          </div>
          
          <!-- Details Section -->
          <div class="md:w-1/2 p-4 sm:p-6">
            <div class="space-y-4">
              <div>
                <h2 class="text-xl md:text-2xl font-bold text-gray-900">{{ $galeri->nama_bonsai }}</h2>
                <p class="text-gray-600 italic">{{ $galeri->nama_latin_bonsai ?? 'Nama latin tidak tersedia' }}</p>
              </div>
              
              <!-- Rating -->
              <div class="flex items-center">
                <div class="flex items-center">
                  @for($i = 1; $i <= 5; $i++)
                    @if($i <= floor($averageRating))
                      <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                      </svg>
                    @elseif($i == ceil($averageRating) && $averageRating - floor($averageRating) >= 0.5)
                      <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <defs>
                          <linearGradient id="half-star" x1="0" x2="100%" y1="0" y2="0">
                            <stop offset="50%" stop-color="currentColor"></stop>
                            <stop offset="50%" stop-color="#D1D5DB"></stop>
                          </linearGradient>
                        </defs>
                        <path fill="url(#half-star)" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                      </svg>
                    @else
                      <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                      </svg>
                    @endif
                  @endfor
                </div>
                <span class="ml-2 text-gray-600">
                  {{ number_format($averageRating, 1) }} ({{ $galeri->ratings->count() }} ulasan)
                </span>
              </div>
              
              <!-- Details List -->
              <div class="space-y-3">
                <div class="flex items-start">
                  <svg class="flex-shrink-0 h-5 w-5 text-blue-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                  </svg>
                  <div class="ml-3">
                    <p class="text-sm text-gray-500">Pemilik</p>
                    <p class="text-sm font-medium text-gray-900">{{ $galeri->user->name }}</p>
                  </div>
                </div>
                
                <div class="flex items-start">
                  <svg class="flex-shrink-0 h-5 w-5 text-blue-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                  </svg>
                  <div class="ml-3">
                    <p class="text-sm text-gray-500">Ukuran</p>
                    <p class="text-sm font-medium text-gray-900">{{ $galeri->ukuran_bonsai }}</p>
                  </div>
                </div>
                
                @if($galeri->penghargaan_bonsai)
                <div class="flex items-start">
                  <svg class="flex-shrink-0 h-5 w-5 text-blue-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                  </svg>
                  <div class="ml-3">
                    <p class="text-sm text-gray-500">Penghargaan</p>
                    <p class="text-sm font-medium text-gray-900">{{ $galeri->penghargaan_bonsai }}</p>
                  </div>
                </div>
                @endif
              </div>
              
              <!-- Action Buttons -->
              <div class="flex space-x-3 pt-4">
                <a href="{{ route('admin.galeri.edit', $galeri->id_galeri) }}" 
                   class="flex-1 flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                  </svg>
                  Edit
                </a>
                <form action="{{ route('admin.galeri.destroy', $galeri->id_galeri) }}" method="POST" class="flex-1">
                  @csrf
                  @method('DELETE')
                  <button type="submit" 
                          class="w-full flex items-center justify-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                          onclick="return confirm('Apakah Anda yakin ingin menghapus bonsai ini?')">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    Hapus
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Ratings Section -->
      <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="p-4 sm:p-6">
          <h3 class="text-lg font-medium text-gray-900 mb-4">Rating & Ulasan</h3>
          
          @if($galeri->ratings->isEmpty())
          <div class="text-center py-8">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
            </svg>
            <p class="mt-2 text-sm text-gray-500">Belum ada rating untuk bonsai ini</p>
          </div>
          @else
          <div class="space-y-6 max-h-96 overflow-y-auto pr-2">
            @foreach($galeri->ratings as $rating)
            <div class="border-b border-gray-200 pb-6 last:border-0 last:pb-0">
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-600 font-medium">{{ substr($rating->user->name, 0, 1) }}</span>
                  </div>
                  <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">{{ $rating->user->name }}</p>
                    <div class="flex items-center">
                      @for($i = 1; $i <= 5; $i++)
                        @if($i <= $rating->nilai_rating)
                          <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                          </svg>
                        @else
                          <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                          </svg>
                        @endif
                      @endfor
                    </div>
                  </div>
                </div>
                <p class="text-sm text-gray-500">{{ $rating->created_at->diffForHumans() }}</p>
              </div>
              @if($rating->komentar)
              <div class="mt-3 pl-13">
                <p class="text-sm text-gray-700">{{ $rating->komentar }}</p>
              </div>
              @endif
            </div>
            @endforeach
          </div>
          @endif
        </div>
      </div>
    </div>
  </main>
</div>
@endsection