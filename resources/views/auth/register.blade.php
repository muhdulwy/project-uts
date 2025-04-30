@extends('layouts.auth', ['title' => 'Register - Akun'])
@section('content')
    <div class="flex justify-center items-center h-screen px-6">
        <div class="p-6 max-w-sm w-full bg-white shadow-md rounded-md">
            <div class="flex justify-center items-center">
                <span class="text-gray-700 font-semibold text-2xl">DAFTAR AKUN BARU</span>
            </div>
            
            @if (session('status'))
                <div class="bg-green-500 p-3 rounded-md shadow-sm mt-3">
                    {{ session('status') }}
                </div>
            @endif
            
            <form class="mt-4" action="{{ route('register') }}" method="POST">
                @csrf
                
                <!-- Nama Lengkap -->
                <label class="block">
                    <span class="text-gray-700 text-sm">Nama Lengkap</span>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="form-input mt-1 block w-full rounded-md focus:outline-none" 
                        placeholder="Nama Lengkap" required autofocus>
                    @error('name')
                        <div class="inline-flex max-w-sm w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                    @enderror
                </label>
                
                <!-- Email -->
                <label class="block mt-3">
                    <span class="text-gray-700 text-sm">Email</span>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-input mt-1 block w-full rounded-md focus:outline-none" 
                        placeholder="Alamat Email" required>
                    @error('email')
                        <div class="inline-flex max-w-sm w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                    @enderror
                </label>
                
                <!-- Password -->
                <label class="block mt-3">
                    <span class="text-gray-700 text-sm">Password</span>
                    <input type="password" name="password" 
                        class="form-input mt-1 block w-full rounded-md focus:outline-none" 
                        placeholder="Password" required>
                    @error('password')
                        <div class="inline-flex max-w-sm w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                    @enderror
                </label>
                
                <!-- Konfirmasi Password -->
                <label class="block mt-3">
                    <span class="text-gray-700 text-sm">Konfirmasi Password</span>
                    <input type="password" name="password_confirmation" 
                        class="form-input mt-1 block w-full rounded-md focus:outline-none" 
                        placeholder="Ulangi Password" required>
                </label>
                
                <div class="mt-2 text-center text-sm text-gray-600">
                    <p>Sudah punya akun? <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500 transition-colors duration-200">Login disini</a></p>
                </div>
                
                <div class="mt-6">
                    <button type="submit"
                        class="py-2 px-4 text-center bg-green-600 rounded-md w-full text-white text-sm hover:bg-green-500 focus:outline-none">
                        DAFTAR SEKARANG
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection