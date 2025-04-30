@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <!-- News Header -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-white mb-4">Berita Terbaru</h1>
        <p class="text-lg text-gray-300 max-w-2xl mx-auto">Informasi terkini seputar kegiatan PPBI Banda Aceh</p>
    </div>

    <!-- News Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($beritas as $berita)
        <div class="bg-white bg-opacity-90 backdrop-blur-sm rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-[1.02]">
            <!-- News Image -->
            <div class="relative h-48 w-full overflow-hidden">
                <img src="{{ asset('storage/' . $berita->foto_berita) }}" alt="{{ $berita->judul_berita }}" 
                     class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
            </div>

            <!-- News Content -->
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-3">{{ $berita->judul_berita }}</h2>
                <p class="text-gray-600 mb-4 line-clamp-3">
                    {{ Str::limit($berita->deskripsi_berita, 300) }}
                </p>
                
                <div class="flex justify-between items-center">
                    @if($berita->link_berita)
                    <a href="{{ $berita->link_berita }}" target="_blank" 
                       class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                        Baca Sumber
                    </a>
                    @endif
                    
                    <button class="view-detail-btn text-green-600 hover:text-green-800 text-sm font-medium flex items-center"
                            data-title="{{ $berita->judul_berita }}"
                            data-content="{{ $berita->deskripsi_berita }}"
                            data-image="{{ asset('storage/' . $berita->foto_berita) }}">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        Lihat Detail
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- News Modal -->
<div id="newsModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-white p-4 border-b flex justify-between items-center">
            <h3 id="modalTitle" class="text-xl font-bold"></h3>
            <button onclick="closeNewsModal()" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <img id="modalImage" src="" alt="" class="w-full h-64 object-cover rounded-lg mb-6">
            <p id="modalContent" class="text-gray-700 whitespace-pre-line"></p>
        </div>
    </div>
</div>

<script>
    // Initialize modal functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Add click event to all detail buttons
        document.querySelectorAll('.view-detail-btn').forEach(button => {
            button.addEventListener('click', function() {
                const title = this.getAttribute('data-title');
                const content = this.getAttribute('data-content');
                const imageUrl = this.getAttribute('data-image');
                
                openNewsModal(title, content, imageUrl);
            });
        });
    });

    function openNewsModal(title, content, imageUrl) {
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalContent').textContent = content;
        document.getElementById('modalImage').src = imageUrl;
        document.getElementById('newsModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeNewsModal() {
        document.getElementById('newsModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside content
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('newsModal');
        if (event.target === modal) {
            closeNewsModal();
        }
    });

    // Close with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeNewsModal();
        }
    });
</script>

<style>
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    /* Smooth transitions for modal */
    #newsModal {
        transition: opacity 0.3s ease;
        opacity: 0;
    }
    
    #newsModal:not(.hidden) {
        opacity: 1;
    }
</style>
@endsection