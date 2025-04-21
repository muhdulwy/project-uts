<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>PPBIBANDAACEH</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #4a7c59;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #3a6148;
        }
        
        /* Smooth transitions */
        .transition-smooth {
            transition: all 0.3s ease-in-out;
        }
        
        /* Header shadow animation */
        @keyframes shadowDrop {
            0% { box-shadow: 0 0 0 rgba(0,0,0,0); }
            100% { box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
        }
        
        .header-shadow {
            animation: shadowDrop 0.5s ease-out forwards;
        }
    </style>
</head>

<body class="bg-gray-100 font-poppins min-h-screen" style="background: url('{{ asset('image/bonsai.jpg') }}') no-repeat center center fixed; background-size: cover;">

    <!-- Background overlay -->
    <div class="fixed inset-0 bg-black opacity-50 -z-10"></div>

    <!-- Header -->
    <header class="relative z-50 bg-white bg-opacity-90 backdrop-blur-sm header-shadow">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-x-4">
                <img alt="Logo of PPBI Banda Aceh" class="h-16 w-auto transition-smooth hover:scale-105" src="{{ asset('image/logo.png') }}" />
                <a class="text-gray-800 text-2xl font-bold leading-tight hover:text-green-700 transition-smooth" href="/">
                    PPBI <br /> BANDA ACEH
                </a>
            </div>

            <nav class="hidden md:block">
                <ul class="flex space-x-6">
                    <li>
                        <a class="text-gray-700 hover:text-green-600 font-medium transition-smooth relative group" href="/">
                            Beranda
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                    </li>
                    <li class="relative">
                        <a id="profilButton" class="text-gray-700 hover:text-green-600 font-medium transition-smooth cursor-pointer relative group">
                            Profil <i class="fas fa-caret-down ml-1"></i>
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                        <ul id="profilMenu" class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-xl overflow-hidden hidden z-50">
                            <li><a class="block px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-700 transition-smooth border-b border-gray-100" href="/anggota"><i class="fas fa-users mr-2"></i> Anggota</a></li>
                            <li><a class="block px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-700 transition-smooth" href="/struktur"><i class="fas fa-sitemap mr-2"></i> Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="text-gray-700 hover:text-green-600 font-medium transition-smooth relative group" href="/berita">
                            Berita
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                    </li>
                    <li>
                        <a class="text-gray-700 hover:text-green-600 font-medium transition-smooth relative group" href="/galeri">
                            Galeri
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                    </li>
                    <li>
                        <a class="text-gray-700 hover:text-green-600 font-medium transition-smooth relative group" href="/testimonial">
                            Testimonial
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                    </li>
                    <li>
                        <a class="text-gray-700 hover:text-green-600 font-medium transition-smooth relative group" href="/tentang">
                            Tentang Kami
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                    </li>
                    @guest
                        <li>
                            <a class="text-white bg-green-600 hover:bg-green-700 px-4 py-2 rounded-lg font-medium transition-smooth shadow-md hover:shadow-lg" href="/login">
                                <i class="fas fa-sign-in-alt mr-2"></i> Login
                            </a>
                        </li>
                    @else
                        <li class="relative group">
                            <a class="text-gray-700 hover:text-green-600 font-medium transition-smooth cursor-pointer flex items-center">
                                <span class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center mr-2 text-green-700">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </span>
                                {{ Auth::user()->name }}
                                <i class="fas fa-caret-down ml-1"></i>
                            </a>
                            <ul class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl overflow-hidden hidden z-50">
                                <li>
                                    <a class="block px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-700 transition-smooth" 
                                       href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </nav>
            
            <!-- Mobile menu button -->
            <button id="mobileMenuButton" class="md:hidden text-gray-700 focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
        
        <!-- Mobile menu -->
        <div id="mobileMenu" class="md:hidden hidden bg-white border-t border-gray-200">
            <div class="container mx-auto px-6 py-4">
                <ul class="space-y-4">
                    <li><a class="block text-gray-700 hover:text-green-600 font-medium" href="/">Beranda</a></li>
                    <li>
                        <a id="mobileProfilButton" class="block text-gray-700 hover:text-green-600 font-medium cursor-pointer flex justify-between items-center">
                            Profil <i class="fas fa-caret-down"></i>
                        </a>
                        <ul id="mobileProfilMenu" class="pl-4 mt-2 hidden space-y-2">
                            <li><a class="block text-gray-600 hover:text-green-600" href="/anggota">Anggota</a></li>
                            <li><a class="block text-gray-600 hover:text-green-600" href="/struktur">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <li><a class="block text-gray-700 hover:text-green-600 font-medium" href="/berita">Berita</a></li>
                    <li><a class="block text-gray-700 hover:text-green-600 font-medium" href="/galeri">Galeri</a></li>
                    <li><a class="block text-gray-700 hover:text-green-600 font-medium" href="/testimonial">Testimonial</a></li>
                    <li><a class="block text-gray-700 hover:text-green-600 font-medium" href="/tentang">Tentang Kami</a></li>
                    @guest
                        <li><a class="block text-green-600 font-medium" href="/login">Login</a></li>
                    @else
                        <li>
                            <a class="block text-gray-700 hover:text-green-600 font-medium" 
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout ({{ Auth::user()->name }})
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="relative z-10 py-8 container mx-auto px-4 sm:px-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 relative z-10">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center gap-x-4 mb-4">
                        <img alt="Logo of PPBI Banda Aceh" class="h-14 w-auto" src="{{ asset('image/logo.png') }}" />
                        <span class="text-xl font-bold">PPBI BANDA ACEH</span>
                    </div>
                    <p class="text-gray-400">Komunitas pecinta dan pengembang seni bonsai di Banda Aceh.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a class="text-gray-400 hover:text-white transition-smooth" href="/">Beranda</a></li>
                        <li><a class="text-gray-400 hover:text-white transition-smooth" href="/anggota">Anggota</a></li>
                        <li><a class="text-gray-400 hover:text-white transition-smooth" href="/berita">Berita</a></li>
                        <li><a class="text-gray-400 hover:text-white transition-smooth" href="/galeri">Galeri</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak Kami</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center"><i class="fas fa-map-marker-alt mr-3 text-green-500"></i> Jl. Tgk. Imum Lueng Bata, Banda Aceh</li>
                        <li class="flex items-center"><i class="fas fa-phone-alt mr-3 text-green-500"></i> +62 812 3456 7890</li>
                        <li class="flex items-center"><i class="fas fa-envelope mr-3 text-green-500"></i> info@ppbibandaaceh.com</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Media Sosial</h3>
                    <div class="flex space-x-4 mb-6">
                        <a class="w-10 h-10 rounded-full bg-gray-800 hover:bg-green-600 flex items-center justify-center text-white transition-smooth" href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="w-10 h-10 rounded-full bg-gray-800 hover:bg-green-600 flex items-center justify-center text-white transition-smooth" href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="w-10 h-10 rounded-full bg-gray-800 hover:bg-green-600 flex items-center justify-center text-white transition-smooth" href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a class="w-10 h-10 rounded-full bg-gray-800 hover:bg-green-600 flex items-center justify-center text-white transition-smooth" href="#">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                    <p class="text-gray-400">Ikuti kami untuk update terbaru</p>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-500">
                <p>Copyright © 2024 PPBI Banda Aceh. All Rights Reserved. Made by Aneuk Ti Uinar</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Desktop profile menu
            const profilButton = document.getElementById("profilButton");
            const profilMenu = document.getElementById("profilMenu");
            
            // Mobile menu toggle
            const mobileMenuButton = document.getElementById("mobileMenuButton");
            const mobileMenu = document.getElementById("mobileMenu");
            
            // Mobile profile menu
            const mobileProfilButton = document.getElementById("mobileProfilButton");
            const mobileProfilMenu = document.getElementById("mobileProfilMenu");
            
            // Desktop profile menu toggle
            if (profilButton) {
                profilButton.addEventListener("click", function (event) {
                    event.preventDefault();
                    profilMenu.classList.toggle("hidden");
                });
            }
            
            // Mobile menu toggle
            if (mobileMenuButton) {
                mobileMenuButton.addEventListener("click", function () {
                    mobileMenu.classList.toggle("hidden");
                });
            }
            
            // Mobile profile menu toggle
            if (mobileProfilButton) {
                mobileProfilButton.addEventListener("click", function (event) {
                    event.preventDefault();
                    mobileProfilMenu.classList.toggle("hidden");
                });
            }
            
            // Close menus when clicking outside
            document.addEventListener("click", function (event) {
                if (profilButton && !profilButton.contains(event.target) && profilMenu && !profilMenu.contains(event.target)) {
                    profilMenu.classList.add("hidden");
                }
                
                if (mobileProfilButton && !mobileProfilButton.contains(event.target) && mobileProfilMenu && !mobileProfilMenu.contains(event.target)) {
                    mobileProfilMenu.classList.add("hidden");
                }
            });
            
            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>