@extends('layouts.neon')

@section('content')
<div class="flex flex-col min-h-screen bg-gray-50">
  <!-- Header (Fixed) -->
  <header class="bg-white shadow-sm sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-4 py-3 sm:px-6 lg:px-8 flex justify-between items-center">
      <h1 class="text-lg md:text-xl font-bold text-gray-900">
        <span class="text-blue-600">Tambah</span> Bonsai Baru
      </h1>
      <a href="{{ route('admin.galeri.index') }}" 
         class="flex items-center space-x-1 bg-gradient-to-r from-gray-600 to-gray-500 hover:from-gray-700 hover:to-gray-600 text-white px-3 py-1 text-sm rounded-lg shadow hover:shadow-md transition-all">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        <span class="hidden sm:inline">Kembali</span>
      </a>
    </div>
  </header>

  <!-- Scrollable Content Area -->
  <div class="flex-1 overflow-y-auto">
    <main class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8">
      <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 p-4 sm:p-6">
          @csrf
          
          <!-- Foto Bonsai -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Foto Bonsai*</label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md cursor-pointer hover:border-blue-400 transition duration-150" id="upload-container">
              <div class="space-y-1 text-center">
                <svg class="mx-auto h-10 w-10 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                  <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <div class="flex flex-col sm:flex-row justify-center text-sm text-gray-600">
                  <label class="relative cursor-pointer rounded-md font-medium text-blue-600 hover:text-blue-500">
                    <span>Upload file</span>
                    <input id="file-upload" name="foto_bonsai" type="file" class="sr-only" accept="image/*" required>
                  </label>
                  <p class="pl-1">atau drag and drop</p>
                </div>
                <p class="text-xs text-gray-500">
                  PNG, JPG, JPEG (maks. 2MB)
                </p>
              </div>
            </div>
            <div id="image-preview" class="mt-2 hidden">
              <img id="preview-image" src="#" alt="Preview" class="max-h-40 rounded-md border">
              <button type="button" id="remove-image" class="mt-2 text-red-600 text-sm flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                Hapus Gambar
              </button>
            </div>
          </div>

          <!-- Nama Bonsai -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Bonsai*</label>
            <input type="text" name="nama_bonsai" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                   placeholder="Masukkan nama bonsai" required>
          </div>

          <!-- Nama Latin Bonsai -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Latin Bonsai*</label>
            <input type="text" name="nama_latin_bonsai" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                   placeholder="Masukkan nama latin bonsai" required>
          </div>

          <!-- Ukuran Bonsai -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Ukuran Bonsai*</label>
            <input type="text" name="ukuran_bonsai" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                   placeholder="Contoh: 30 cm" required>
          </div>

          <!-- Pemilik Bonsai -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Pemilik Bonsai*</label>
            <select name="id_user" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm" required>
              <option value="">Pilih Pemilik</option>
              @foreach($anggota as $member)
                <option value="{{ $member->id_user }}">{{ $member->name }}</option>
              @endforeach
            </select>
          </div>

          <!-- Penghargaan Bonsai -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Penghargaan Bonsai</label>
            <input type="text" name="penghargaan_bonsai" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                   placeholder="Masukkan penghargaan yang dimiliki">
          </div>

          <!-- Submit Button -->
          <div class="pt-2">
            <button type="submit" 
                    class="w-full flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
              <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
              </svg>
              Simpan Bonsai
            </button>
          </div>
        </form>
      </div>
    </main>
  </div>
</div>

<script>
  // File upload preview functionality
  const fileUpload = document.getElementById('file-upload');
  const uploadContainer = document.getElementById('upload-container');
  const imagePreview = document.getElementById('image-preview');
  const previewImage = document.getElementById('preview-image');
  const removeImage = document.getElementById('remove-image');

  fileUpload.addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
      // Validate file size (max 2MB)
      if (file.size > 2 * 1024 * 1024) {
        alert('Ukuran file maksimal 2MB');
        return;
      }
      
      const reader = new FileReader();
      reader.onload = function(e) {
        previewImage.src = e.target.result;
        uploadContainer.classList.add('hidden');
        imagePreview.classList.remove('hidden');
      }
      reader.readAsDataURL(file);
    }
  });

  // Drag and drop functionality
  ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    uploadContainer.addEventListener(eventName, preventDefaults, false);
  });

  function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
  }

  ['dragenter', 'dragover'].forEach(eventName => {
    uploadContainer.addEventListener(eventName, highlight, false);
  });

  ['dragleave', 'drop'].forEach(eventName => {
    uploadContainer.addEventListener(eventName, unhighlight, false);
  });

  function highlight() {
    uploadContainer.classList.add('border-blue-500', 'bg-blue-50');
  }

  function unhighlight() {
    uploadContainer.classList.remove('border-blue-500', 'bg-blue-50');
  }

  uploadContainer.addEventListener('drop', handleDrop, false);

  function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
    fileUpload.files = files;
    const event = new Event('change');
    fileUpload.dispatchEvent(event);
  }

  // Remove image functionality
  removeImage.addEventListener('click', function() {
    fileUpload.value = '';
    previewImage.src = '#';
    imagePreview.classList.add('hidden');
    uploadContainer.classList.remove('hidden');
  });
</script>
@endsection