@extends('layouts.neon')

@section('content')
<div class="min-h-screen bg-gray-50">
  <!-- Header -->
  <header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8 flex justify-between items-center">
      <h1 class="text-3xl font-bold text-gray-900">
        <span class="text-blue-600">News</span> Manager
      </h1>
      <div class="flex items-center space-x-4">
        <a href="{{ route('admin.berita.create') }}" 
           class="flex items-center space-x-2 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white px-5 py-2.5 rounded-lg shadow-md hover:shadow-lg transition-all">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
          </svg>
          <span>Tambah Berita</span>
        </a>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">

    <!-- News Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">

      @if($beritas->isEmpty())
      <div class="p-12 text-center">
        <div class="mx-auto h-24 w-24 text-gray-300">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linecap="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
          </svg>
        </div>
        <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada berita yang tersedia</h3>
        <p class="mt-1 text-sm text-gray-500">Tambahkan berita terlebih dahulu</p>
        <div class="mt-6">
          <a href="{{ route('admin.berita.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Tambah Berita
          </a>
        </div>
      </div>
      @else
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Article</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Media</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Link</th>
              <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($beritas as $berita)
            <tr class="hover:bg-gray-50 transition-colors duration-150">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10 rounded-lg bg-blue-50 flex items-center justify-center mr-4">
                    <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                  </div>
                  <div>
                    <div class="text-sm font-medium text-gray-900">{{ $berita->judul_berita }}</div>
                    <div class="text-sm text-gray-500 break-words whitespace-normal max-w-[300px]">
                      {{ Str::limit($berita->deskripsi_berita, 100) }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Published
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                @if ($berita->foto_berita)
                <div class="h-10 w-10 rounded-md overflow-hidden border border-gray-200 cursor-pointer hover:ring-2 hover:ring-blue-500 transition-all"
                     onclick="previewMedia('{{ asset('storage/' . $berita->foto_berita) }}', '{{ $berita->judul_berita }}')">
                  <img class="h-full w-full object-cover" 
                       src="{{ asset('storage/' . $berita->foto_berita) }}" 
                       alt="Thumbnail">
                </div>
                @else
                <span class="text-gray-400 text-sm">No media</span>
                @endif
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                @if($berita->link_berita)
                <a href="{{ $berita->link_berita }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                  <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                  </svg>
                  View
                </a>
                @else
                <span class="text-gray-400 text-sm">No link</span>
                @endif
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex justify-end space-x-2">
                  <a href="{{ route('admin.berita.edit', $berita->id_berita) }}" class="text-blue-600 hover:text-blue-900 px-3 py-1.5 rounded-md flex items-center transition-colors">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit
                  </a>
                  <form action="{{ route('admin.berita.destroy', $berita->id_berita) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-900 px-3 py-1.5 rounded-md flex items-center transition-colors">
                      <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                      </svg>
                      Delete
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endif

      <!-- Pagination -->
      @if($beritas->hasPages())
      <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between bg-gray-50">
        <div class="flex-1 flex justify-between sm:hidden">
          @if($beritas->onFirstPage())
          <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white opacity-50 cursor-not-allowed">
            Previous
          </span>
          @else
          <a href="{{ $beritas->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
            Previous
          </a>
          @endif

          @if($beritas->hasMorePages())
          <a href="{{ $beritas->nextPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
            Next
          </a>
          @else
          <span class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white opacity-50 cursor-not-allowed">
            Next
          </span>
          @endif
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
          <div>
            <p class="text-sm text-gray-700">
              Showing <span class="font-medium">{{ $beritas->firstItem() }}</span> to <span class="font-medium">{{ $beritas->lastItem() }}</span> of <span class="font-medium">{{ $beritas->total() }}</span> results
            </p>
          </div>
          <div>
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
              {{ $beritas->links() }}
            </nav>
          </div>
        </div>
      </div>
      @endif
    </div>

    <!-- Modal Preview -->
    <div id="mediaPreviewModal" class="hidden fixed inset-0 bg-black bg-opacity-75 z-50 flex items-center justify-center p-4 transition-opacity duration-300">
      <div class="relative max-w-4xl w-full bg-white rounded-lg shadow-xl overflow-hidden">
        <div class="flex justify-between items-center bg-gray-100 px-4 py-3 border-b">
          <h3 id="modalTitle" class="text-lg font-medium text-gray-900"></h3>
          <button id="closeModal" class="text-gray-500 hover:text-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
        <div class="p-4">
          <img id="modalImage" src="" alt="Preview" class="w-full h-auto max-h-[70vh] object-contain mx-auto rounded">
        </div>
      </div>
    </div>

  </main>
</div>

<style>
  /* Custom scrollbar */
  ::-webkit-scrollbar {
    width: 8px;
    height: 8px;
  }
  
  ::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
  }
  
  ::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 10px;
  }
  
  ::-webkit-scrollbar-thumb:hover {
    background: #a1a1a1;
  }
  
  /* Line clamping */
  .line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  
  /* Smooth transitions */
  .transition-colors {
    transition-property: background-color, border-color, color, fill, stroke;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 150ms;
  }
  
  /* Custom shadows */
  .shadow-sm {
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  }
  
  /* Custom border radius */
  .rounded-xl {
    border-radius: 12px;
  }

  /* Modal Animation */
  #mediaPreviewModal {
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  #mediaPreviewModal:not(.hidden) {
    opacity: 1;
  }

  #modalImage {
    animation: fadeIn 0.3s ease;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
  }
</style>

<script>
  function previewMedia(imageUrl, title = '') {
    const modal = document.getElementById('mediaPreviewModal');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    
    modalImage.src = imageUrl;
    modalTitle.textContent = title || 'Image Preview';
    modal.classList.remove('hidden');
    
    // Close modal when clicking X
    document.getElementById('closeModal').onclick = () => {
      modal.classList.add('hidden');
    };
    
    // Close when clicking outside image
    modal.onclick = (e) => {
      if (e.target === modal) {
        modal.classList.add('hidden');
      }
    };
  }

  // Close with ESC key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      document.getElementById('mediaPreviewModal').classList.add('hidden');
    }
  });
</script>
@endsection