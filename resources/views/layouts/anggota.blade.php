<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/jpg" href="https://i.imgur.com/UyXqJLi.png" />
    <title>{{ $title ?? 'Dashboard PPBI Banda Aceh' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        dark: {
                            800: '#1e293b',
                            900: '#0f172a',
                        },
                        neon: {
                            blue: '#00f5ff',
                            purple: '#a855f7',
                            pink: '#ec4899',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Poppins', 'sans-serif'],
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style type="text/css">
        /* Custom CSS */
        .sidebar {
            background: linear-gradient(135deg, rgba(15,23,42,0.95) 0%, rgba(30,41,59,0.95) 100%);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        
        .nav-item:hover {
            background: rgba(255,255,255,0.05);
            box-shadow: 0 0 15px rgba(14,165,233,0.3);
        }
        
        .nav-item.active {
            background: rgba(14,165,233,0.1);
            border-left: 3px solid #0ea5e9;
        }
        
        .card {
            background: rgba(255,255,255,0.03);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(14,165,233,0.2);
            border-color: rgba(14,165,233,0.3);
        }
        
        .neon-text {
            text-shadow: 0 0 5px #00f5ff, 0 0 10px #00f5ff;
        }
        
        .avatar-ring {
            box-shadow: 0 0 0 3px #0ea5e9, 0 0 0 6px rgba(14,165,233,0.3);
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            .sidebar.open {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="bg-gray-100 font-sans text-gray-800 antialiased">
    <div class="flex h-screen overflow-hidden" x-data="{ sidebarOpen: false }">
        <!-- Mobile sidebar backdrop -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" 
             class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden"></div>

        <!-- Sidebar -->
        <aside class="sidebar fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto py-6 px-4 shadow-xl lg:static lg:left-auto lg:top-auto lg:block lg:w-20 lg:overflow-y-visible lg:px-3 xl:w-64"
               :class="{'open': sidebarOpen}">
            <!-- Logo -->
            <div class="mb-10 flex items-center justify-center space-x-3 px-2">
                <span class="hidden text-xl font-bold text-white xl:block neon-text">PPBI BANDA ACEH</span>
            </div>

            <!-- Navigation -->
            <nav class="mt-2 space-y-1">
                @php
                    $currentRoute = request()->route()->getName();
                @endphp
                
                <a href="{{ route('admin.galeri.index')}}" 
                   class="nav-item group flex items-center rounded-lg py-3 px-4 {{ str_starts_with($currentRoute, 'admin.galeri') ? 'text-white active' : 'text-gray-300 hover:text-white' }}">
                    <i class="fas fa-tachometer-alt text-lg {{ str_starts_with($currentRoute, 'admin.galeri') ? 'text-neon-blue' : '' }}"></i>
                    <span class="ml-3 hidden xl:block">Dashboard</span>
                </a>
            </nav>

            <!-- User Profile -->
            <div class="absolute bottom-6 left-0 right-0 px-4 xl:px-4">
                <div class="flex items-center rounded-lg bg-gray-800 bg-opacity-50 p-3">
                    <div class="avatar-ring h-10 w-10 overflow-hidden rounded-full">
                        <img src="{{ asset('storage/' . auth()->user()->foto_anggota) }}" alt="User avatar" class="h-full w-full object-cover">
                    </div>
                    <div class="ml-3 hidden xl:block">
                        <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-400">{{ auth()->user()->role }}</p>
                    </div>
                   
                    <button class="ml-auto hidden text-gray-400 hover:text-white xl:block">
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                        <form id="logout-form" action="{{route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </button>
                    
                </div>
            </div>
        </aside>

        <!-- Main content -->
        <div class="flex flex-1 flex-col overflow-hidden">
            <!-- Top navigation -->
            <header class="flex items-center justify-between border-b border-gray-200 bg-white py-4 px-6 shadow-sm">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="mr-4 text-gray-500 focus:outline-none lg:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                </div>
                
                {{-- <div class="flex items-center space-x-6">             
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                            <span class="hidden text-sm font-medium text-gray-700 md:block">{{ auth()->user()->name }}</span>
                            <div class="h-8 w-8 overflow-hidden rounded-full">
                                <img src="{{ asset('storage/' . auth()->user()->foto_anggota) }}" alt="User avatar" class="h-full w-full object-cover">
                            </div>
                        </button>
                    </div>
                </div> --}}
            </header>

            <!-- Content -->
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>