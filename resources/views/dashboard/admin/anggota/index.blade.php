@extends('layouts.neon')

@section('content')
<div class="min-h-screen bg-gray-50">
  <!-- Header -->
  <header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8 flex justify-between items-center">
      <h1 class="text-3xl font-bold text-gray-900">
        <span class="text-blue-600">Data</span> Anggota
      </h1>
      <div class="flex items-center space-x-4">
        <a href="{{ route('admin.anggota.create') }}" 
           class="flex items-center space-x-2 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white px-5 py-2.5 rounded-lg shadow-md hover:shadow-lg transition-all">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
          </svg>
          <span>Tambah Anggota</span>
        </a>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">

    <!-- Members Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">

      @if($anggota->isEmpty())
      <div class="p-12 text-center">
        <div class="mx-auto h-24 w-24 text-gray-300">
          <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
        </div>
        <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada anggota</h3>
        <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan anggota baru</p>
        <div class="mt-6">
          <a href="{{ route('admin.anggota.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Tambah Anggota
          </a>
        </div>
      </div>
      @else
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Anggota</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
              <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($anggota as $member)
            <tr class="hover:bg-gray-50 transition-colors duration-150">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-50 flex items-center justify-center mr-4">
                    @if($member->foto_anggota)
                      <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('storage/' . $member->foto_anggota) }}" alt="Foto Anggota">
                    @else
                      <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                      </svg>
                    @endif
                  </div>
                  <div>
                    <div class="text-sm font-medium text-gray-900">{{ $member->name }}</div>
                    <div class="text-sm text-gray-500">Anggota</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $member->email }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                @if($member->foto_anggota)
                <div class="h-10 w-10 rounded-full overflow-hidden border border-gray-200">
                  <img class="h-full w-full object-cover" src="{{ asset('storage/' . $member->foto_anggota) }}" alt="">
                </div>
                @else
                <span class="text-gray-400 text-sm">Tidak ada foto</span>
                @endif
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex justify-end space-x-2">
                  <a href="{{ route('admin.anggota.edit', $member->id_user) }}" class="text-blue-600 hover:text-blue-900 px-3 py-1.5 rounded-md flex items-center transition-colors">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit
                  </a>
                  <form action="{{ route('admin.anggota.destroy', $member->id_user) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-900 px-3 py-1.5 rounded-md flex items-center transition-colors">
                      <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                      </svg>
                      Hapus
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
</style>
@endsection