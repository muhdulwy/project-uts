<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPBI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 font-roboto">
    <!-- Header Section -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <a href="{{ route('index') }}" class="text-2xl font-bold text-gray-800">PPBI <br> BANDA ACEH</a>
            <nav class="hidden md:flex space-x-6">
                <a href="{{ route('index') }}" class="text-gray-600 hover:text-gray-800">Beranda</a>
                <div class="relative group">
                    <button class="text-gray-600 hover:text-gray-800">Profil <i class="fas fa-caret-down"></i></button>
                    <div class="absolute hidden group-hover:block bg-white shadow-lg mt-2 rounded-md">
                        <a href="{{ route('artikel2') }}"
                            class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Anggota</a>
                        <a href="{{ route('struktur') }}"
                            class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Struktur Organisasi</a>
                    </div>
                </div>
                <a href="{{ route('berita') }}" class="text-gray-600 hover:text-gray-800">Berita</a>
                <a href="{{ route('galeri') }}" class="text-gray-600 hover:text-gray-800">Galeri</a>
                <a href="{{ route('testimonial') }}" class="text-gray-600 hover:text-gray-800">Testimonial</a>
                <a href="{{ route('tentang') }}" class="text-gray-600 hover:text-gray-800">Tentang Kami</a>
                @if (!Auth::check())
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">Login</a>
                @else
                    <a href="{{ route('logout') }}" class="text-gray-600 hover:text-gray-800">Logout
                        ({{ Auth::user()->name }})</a>
                @endif
            </nav>
            <button class="md:hidden text-gray-600 focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>

    <!-- Intro Section -->
    <section id="intro" class="bg-gray-200 py-12">
        <div class="container mx-auto text-center">
            <h6 class="text-2xl font-bold text-green-600">BERITA SEPUTAR PPBI KOTA BANDA ACEH</h6>
            <p class="text-gray-600 mt-4">Berita terkini seputar Perkumpulan Penggemar Bonsai Indonesia di Kota Banda
                Aceh</p>
        </div>
    </section>

    <!-- Artikel Section -->
    <section id="services" class="py-12">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($beritas as $berita)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="{{ asset('public/beritas' . $berita->image) }}" alt="{{ $berita->judul }}"
                            class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h4 class="text-lg font-bold">{{ $berita->judul }}</h4>
                            <p class="text-gray-600 mt-2">{{ $berita->deskripsi }}</p>
                            <a href="{{ $berita->url }}" class="text-blue-500 hover:underline mt-4 block">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Add Article Section -->
    @if (Auth::check() && Auth::user()->is_admin)
        <section class="py-12 bg-gray-200">
            <div class="container mx-auto">
                <h6 class="text-2xl font-bold text-center">Tambah Berita</h6>
                <form method="post" action="{{ route('artikel.store') }}" enctype="multipart/form-data" class="mt-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="judul" class="block text-gray-700">Judul</label>
                            <input type="text" name="judul" id="judul"
                                class="w-full mt-2 p-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="keterangan" class="block text-gray-700">Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan"
                                class="w-full mt-2 p-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="url" class="block text-gray-700">Alamat URL</label>
                            <input type="text" name="url" id="url"
                                class="w-full mt-2 p-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="foto" class="block text-gray-700">Foto</label>
                            <input type="file" name="foto" id="foto"
                                class="w-full mt-2 p-2 border border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mt-6 text-center">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan</button>
                        <a href="{{ route('artikel') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md ml-2">Batal</a>
                    </div>
                </form>
            </div>
        </section>

        <!-- Article Data Control Section -->
        <section class="py-12">
            <div class="container mx-auto">
                <h6 class="text-2xl font-bold text-center">Data Artikel</h6>
                <div class="overflow-x-auto mt-6">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Gambar</th>
                                <th class="py-2 px-4 border-b">Judul</th>
                                <th class="py-2 px-4 border-b">Keterangan</th>
                                <th class="py-2 px-4 border-b">Alamat URL</th>
                                <th class="py-2 px-4 border-b" colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td class="py-2 px-4 border-b text-center">
                                        <img src="{{ asset('images/foto/' . $article->foto) }}" alt="{{ $article->judul }}"
                                            class="w-32 h-16 object-cover mx-auto">
                                    </td>
                                    <td class="py-2 px-4 border-b">{{ $article->judul }}</td>
                                    <td class="py-2 px-4 border-b">{{ $article->keterangan }}</td>
                                    <td class="py-2 px-4 border-b">{{ $article->url }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('artikel.edit', $article->id) }}"
                                            class="text-blue-500 hover:underline">Ubah</a>
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        <form action="{{ route('artikel.destroy', $article->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    @endif

    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <div class="flex justify-center space-x-6 mb-4">
                <a href="#" class="text-white hover:text-gray-400"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white hover:text-gray-400"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white hover:text-gray-400"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="text-white hover:text-gray-400"><i class="fab fa-google-plus"></i></a>
            </div>
            <p>Copyright © 2024 www.ppbikotabandaaceh.com All Rights Reserved. Made by Aneuk Ti Uinar</p>
        </div>
    </footer>
</body>

</html>