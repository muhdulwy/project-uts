@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <!-- Structure Header -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-white mb-4">Struktur Organisasi</h1>
        <p class="text-lg text-gray-300 max-w-2xl mx-auto">Pengurus PPBI Banda Aceh Periode 2023-2026</p>
    </div>

    <!-- Organizational Chart -->
    <div class="bg-white bg-opacity-90 backdrop-blur-sm rounded-xl shadow-lg p-8">
        <!-- Level 1 - Ketua -->
        <div class="flex justify-center mb-8">
            <div class="text-center">
                <div class="w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-yellow-500 mb-3">
                    <img src="{{ asset('image/ketua.jpg') }}" alt="Ketua PPBI" class="w-full h-full object-cover">
                </div>
                <h3 class="text-xl font-bold">Tgk. Muhammad Abdullah</h3>
                <p class="text-green-600 font-medium">Ketua Umum</p>
            </div>
        </div>

        <!-- Level 2 - Wakil & Sekretaris -->
        <div class="flex justify-center gap-12 mb-8">
            <div class="text-center">
                <div class="w-24 h-24 mx-auto rounded-full overflow-hidden border-4 border-blue-500 mb-3">
                    <img src="{{ asset('image/wakil.jpg') }}" alt="Wakil Ketua" class="w-full h-full object-cover">
                </div>
                <h3 class="text-lg font-bold">Drs. Ahmad Yusuf</h3>
                <p class="text-blue-600">Wakil Ketua</p>
            </div>
            <div class="text-center">
                <div class="w-24 h-24 mx-auto rounded-full overflow-hidden border-4 border-blue-500 mb-3">
                    <img src="{{ asset('image/sekretaris.jpg') }}" alt="Sekretaris" class="w-full h-full object-cover">
                </div>
                <h3 class="text-lg font-bold">Cut Sarah, S.Pd</h3>
                <p class="text-blue-600">Sekretaris</p>
            </div>
        </div>

        <!-- Level 3 - Bendahara dan Divisi -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Bendahara -->
            <div class="text-center">
                <div class="w-20 h-20 mx-auto rounded-full overflow-hidden border-4 border-purple-500 mb-2">
                    <img src="{{ asset('image/bendahara.jpg') }}" alt="Bendahara" class="w-full h-full object-cover">
                </div>
                <h3 class="font-bold">Ir. Muhammad Rizal</h3>
                <p class="text-purple-600 text-sm">Bendahara</p>
            </div>
            
            <!-- Divisi Pendidikan -->
            <div class="text-center">
                <div class="w-20 h-20 mx-auto rounded-full overflow-hidden border-4 border-purple-500 mb-2">
                    <img src="{{ asset('image/div_pendidikan.jpg') }}" alt="Divisi Pendidikan" class="w-full h-full object-cover">
                </div>
                <h3 class="font-bold">Dr. Fatimah Zahra, M.Pd</h3>
                <p class="text-purple-600 text-sm">Koordinator Pendidikan</p>
            </div>
            
            <!-- Divisi Acara -->
            <div class="text-center">
                <div class="w-20 h-20 mx-auto rounded-full overflow-hidden border-4 border-purple-500 mb-2">
                    <img src="{{ asset('image/div_acara.jpg') }}" alt="Divisi Acara" class="w-full h-full object-cover">
                </div>
                <h3 class="font-bold">Teuku Farhan, S.E.</h3>
                <p class="text-purple-600 text-sm">Koordinator Acara</p>
            </div>
        </div>

        <!-- Level 4 - Anggota -->
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach([
                ['name' => 'Nurul Hidayati', 'position' => 'Anggota'],
                ['name' => 'Abdul Gani', 'position' => 'Anggota'],
                ['name' => 'Siti Aisyah', 'position' => 'Anggota'],
                ['name' => 'Muhammad Iqbal', 'position' => 'Anggota'],
                ['name' => 'Cut Nadia', 'position' => 'Anggota'],
                ['name' => 'Teuku Faisal', 'position' => 'Anggota']
            ] as $member)
            <div class="text-center">
                <div class="w-16 h-16 mx-auto rounded-full overflow-hidden border-4 border-gray-300 mb-2">
                    <img src="{{ asset('image/default_avatar.jpg') }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover">
                </div>
                <h3 class="text-sm font-bold">{{ $member['name'] }}</h3>
                <p class="text-gray-600 text-xs">{{ $member['position'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    /* Custom styling for organization chart */
    .org-level-1 {
        border-color: #f59e0b;
    }
    .org-level-2 {
        border-color: #3b82f6;
    }
    .org-level-3 {
        border-color: #8b5cf6;
    }
    .org-level-4 {
        border-color: #9ca3af;
    }
    
    /* Responsive adjustments */
    @media (max-width: 640px) {
        .flex.justify-center.gap-12 {
            flex-direction: column;
            gap: 2rem;
        }
    }
</style>
@endsection