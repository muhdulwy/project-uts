@extends('layouts.app')
@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Hero Section -->
    <div class="text-center py-16">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Seni Bonsai: Keindahan dalam Kesederhanaan</h1>
        <p class="text-xl text-gray-200 max-w-3xl mx-auto" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">
            Menyelami dunia miniatur pohon yang memikat hati dan menenangkan jiwa
        </p>
    </div>

    <!-- Main Content -->
    <div class="bg-white bg-opacity-90 rounded-lg shadow-xl overflow-hidden mb-12">
        <!-- What is Bonsai -->
        <div class="p-8 md:p-12">
            <div class="flex flex-col md:flex-row gap-8 items-center">
                <div class="md:w-1/2">
                    <img src="https://images.unsplash.com/photo-1599598177991-ec67b5c37318" alt="Bonsai Tree" class="rounded-lg shadow-md w-full h-auto object-cover">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Apa Itu Bonsai?</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Bonsai adalah seni kuno menanam pohon dalam pot dangkal yang berasal dari Jepang. Kata "bonsai" sendiri berarti "tanaman dalam pot". Seni ini bertujuan untuk menciptakan representasi miniatur dari pohon yang tumbuh alami, tetapi dalam skala yang jauh lebih kecil.
                    </p>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                        <p class="text-yellow-700 italic">"Bonsai bukan hanya tentang menanam pohon kecil, tapi tentang menangkap esensi alam dalam bentuk miniatur."</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Benefits Section -->
        <div class="bg-gray-50 p-8 md:p-12">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Manfaat Memelihara Bonsai</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <div class="text-green-600 text-4xl mb-4">
                        <i class="fas fa-spa"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Terapi Relaksasi</h3>
                    <p class="text-gray-600">Merawat bonsai dapat mengurangi stres dan meningkatkan kesehatan mental melalui interaksi dengan alam.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <div class="text-green-600 text-4xl mb-4">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Kreativitas</h3>
                    <p class="text-gray-600">Membentuk bonsai mengasah kreativitas dan kesabaran dalam menciptakan karya seni hidup.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <div class="text-green-600 text-4xl mb-4">
                        <i class="fas fa-tree"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Lingkungan</h3>
                    <p class="text-gray-600">Bonsai membantu meningkatkan kualitas udara dan menambah keindahan ruang hidup Anda.</p>
                </div>
            </div>
        </div>

        <!-- Bonsai Types -->
        <div class="p-8 md:p-12">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Jenis-Jenis Bonsai Populer</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="group relative overflow-hidden rounded-lg shadow-md">
                    <img src="https://images.unsplash.com/photo-1597484661643-2f5fef640dd1" alt="Juniper Bonsai" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-70"></div>
                    <div class="absolute bottom-0 left-0 p-4">
                        <h3 class="text-white text-xl font-semibold">Juniper</h3>
                        <p class="text-gray-200">Klasik dan tahan banting</p>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-lg shadow-md">
                    <img src="https://images.unsplash.com/photo-1599598177991-ec67b5c37318" alt="Maple Bonsai" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-70"></div>
                    <div class="absolute bottom-0 left-0 p-4">
                        <h3 class="text-white text-xl font-semibold">Maple</h3>
                        <p class="text-gray-200">Daun indah berubah warna</p>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-lg shadow-md">
                    <img src="https://images.unsplash.com/photo-1597484661643-2f5fef640dd1" alt="Pine Bonsai" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-70"></div>
                    <div class="absolute bottom-0 left-0 p-4">
                        <h3 class="text-white text-xl font-semibold">Pinus</h3>
                        <p class="text-gray-200">Kokoh dengan jarum hijau</p>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-lg shadow-md">
                    <img src="https://images.unsplash.com/photo-1599598177991-ec67b5c37318" alt="Ficus Bonsai" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-70"></div>
                    <div class="absolute bottom-0 left-0 p-4">
                        <h3 class="text-white text-xl font-semibold">Ficus</h3>
                        <p class="text-gray-200">Ideal untuk pemula</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Care Tips -->
        <div class="bg-green-50 p-8 md:p-12">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Tips Merawat Bonsai</h2>
            <div class="max-w-4xl mx-auto">
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-green-700 mb-3 flex items-center">
                        <span class="bg-green-100 p-2 rounded-full mr-3">
                            <i class="fas fa-tint text-green-600"></i>
                        </span>
                        Penyiraman yang Tepat
                    </h3>
                    <p class="text-gray-600 pl-12">
                        Siram bonsai ketika permukaan tanah mulai kering. Gunakan air yang cukup untuk membasahi seluruh media tanam, tetapi hindari genangan air. Frekuensi penyiraman bervariasi tergantung jenis pohon, ukuran pot, dan kondisi lingkungan.
                    </p>
                </div>
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-green-700 mb-3 flex items-center">
                        <span class="bg-green-100 p-2 rounded-full mr-3">
                            <i class="fas fa-sun text-green-600"></i>
                        </span>
                        Pencahayaan Optimal
                    </h3>
                    <p class="text-gray-600 pl-12">
                        Kebanyakan bonsai membutuhkan sinar matahari langsung selama 4-6 jam sehari. Namun, beberapa jenis membutuhkan perlindungan dari terik matahari siang. Kenali kebutuhan spesies bonsai Anda untuk memberikan pencahayaan yang tepat.
                    </p>
                </div>
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-green-700 mb-3 flex items-center">
                        <span class="bg-green-100 p-2 rounded-full mr-3">
                            <i class="fas fa-cut text-green-600"></i>
                        </span>
                        Pemangkasan Rutin
                    </h3>
                    <p class="text-gray-600 pl-12">
                        Pemangkasan penting untuk mempertahankan bentuk dan kesehatan bonsai. Pangkas ranting yang tidak diinginkan dan pertahankan struktur dasar pohon. Pemangkasan akar juga diperlukan saat repotting untuk menjaga keseimbangan antara bagian atas dan bawah tanah.
                    </p>
                </div>
            </div>
        </div>

        <!-- Gallery Preview -->
        <div class="p-8 md:p-12">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Galeri Bonsai Anggota PPBI Banda Aceh</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="https://images.unsplash.com/photo-1597484661643-2f5fef640dd1" alt="Bonsai 1" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="https://images.unsplash.com/photo-1599598177991-ec67b5c37318" alt="Bonsai 2" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="https://images.unsplash.com/photo-1597484661643-2f5fef640dd1" alt="Bonsai 3" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="https://images.unsplash.com/photo-1599598177991-ec67b5c37318" alt="Bonsai 4" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="https://images.unsplash.com/photo-1597484661643-2f5fef640dd1" alt="Bonsai 5" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="https://images.unsplash.com/photo-1599598177991-ec67b5c37318" alt="Bonsai 6" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="/galeri" class="inline-block px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors shadow-md">
                    Lihat Galeri Lengkap <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="bg-green-700 text-white rounded-lg shadow-xl p-8 md:p-12 my-12 text-center">
        <h2 class="text-3xl font-bold mb-4">Bergabunglah dengan Komunitas Bonsai Kami</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Dapatkan pengetahuan, berbagi pengalaman, dan kembangkan passion Anda dalam seni bonsai bersama PPBI Banda Aceh.</p>
        <a href="/anggota" class="inline-block px-8 py-3 bg-white text-green-700 font-semibold rounded-lg hover:bg-gray-100 transition-colors shadow-lg">
            Daftar Sekarang
        </a>
    </div>
</div>
@endsection
