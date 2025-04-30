@extends('layouts.neon')

@section('content')
<div class="min-h-screen bg-gray-50 flex flex-col">
  <!-- Header -->
  <header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold text-gray-900">
        <span class="text-blue-600">Admin</span> Dashboard
      </h1>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8 flex-1 overflow-y-auto">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
      <!-- galeri Card -->
      <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-blue-500">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-500">Total Galeri</p>
            <p class="text-3xl font-semibold text-gray-900 mt-1">{{ $stats['galeri_count'] }}</p>
          </div>
          <div class="bg-blue-100 p-3 rounded-full">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </div>
        </div>
      </div>

      <!-- Testimonial Card -->
      <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-green-500">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-500">Total Testimonial</p>
            <p class="text-3xl font-semibold text-gray-900 mt-1">{{ $stats['testimonial_count'] }}</p>
          </div>
          <div class="bg-green-100 p-3 rounded-full">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
            </svg>
          </div>
        </div>
      </div>

      <!-- Members Card -->
      <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-purple-500">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-500">Total Members</p>
            <p class="text-3xl font-semibold text-gray-900 mt-1">{{ $stats['member_count'] }}</p>
          </div>
          <div class="bg-purple-100 p-3 rounded-full">
            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
          </div>
        </div>
      </div>

      <!-- Admins Card -->
      <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-red-500">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-500">Total Admins</p>
            <p class="text-3xl font-semibold text-gray-900 mt-1">{{ $stats['admin_count'] }}</p>
          </div>
          <div class="bg-red-100 p-3 rounded-full">
            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
        </div>
      </div>
    </div>

    <!-- Management Section -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
      <a href="{{ route('admin.galeri.index') }}" class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow border-l-4 border-blue-500">
        <div class="flex items-center space-x-4">
          <div class="bg-blue-100 p-3 rounded-full">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </div>
          <div>
            <h3 class="text-lg font-medium text-gray-900">Galeri Management</h3>
            <p class="text-sm text-gray-500 mt-1">Manage all galeri images</p>
          </div>
        </div>
      </a>

      <a href="{{ route('admin.testimoni.index') }}" class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow border-l-4 border-green-500">
        <div class="flex items-center space-x-4">
          <div class="bg-green-100 p-3 rounded-full">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
            </svg>
          </div>
          <div>
            <h3 class="text-lg font-medium text-gray-900">Testimonial Management</h3>
            <p class="text-sm text-gray-500 mt-1">View and manage testimonials</p>
          </div>
        </div>
      </a>

      <a href="{{ route('admin.anggota.index') }}" class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow border-l-4 border-purple-500">
        <div class="flex items-center space-x-4">
          <div class="bg-purple-100 p-3 rounded-full">
            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
          </div>
          <div>
            <h3 class="text-lg font-medium text-gray-900">User Management</h3>
            <p class="text-sm text-gray-500 mt-1">Manage all users</p>
          </div>
        </div>
      </a>

      <a href="{{ route('admin.berita.index') }}" class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow border-l-4 border-orange-500">
        <div class="flex items-center space-x-4">
          <div class="bg-orange-100 p-3 rounded-full">
            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
          </div>
          <div>
            <h3 class="text-lg font-medium text-gray-900">Article Management</h3>
            <p class="text-sm text-gray-500 mt-1">Manage all articles</p>
          </div>
        </div>
      </a>
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
  
  .transition-shadow {
    transition-property: box-shadow;
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

  /* Flex layout for scrolling */
  .flex-1 {
    flex: 1 1 0%;
  }

  .overflow-y-auto {
    overflow-y: auto;
  }
</style>
@endsection