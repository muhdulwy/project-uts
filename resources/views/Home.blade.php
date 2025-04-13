<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        PPBIBANDAACEH
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
</head>

<body class="bg-gray-100 font-roboto">
    <!-- Header -->
    <section class="relative bg-cover bg-center min-h-screen"
        style="background-image: url('{{ asset('image/bonsai.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50">
        </div>
        <header class="relative z-10">
            <div class="container mx-auto p-6 flex justify-between items-center">

                <div class="flex items-center gap-x-4">
                    <img alt="Logo of PPBI Banda Aceh" class="h-16 w-auto" src="{{ asset('image/logo.png') }}" />
                    <a class="text-white text-2xl font-bold leading-tight" href="index.php">
                        PPBI <br /> BANDA ACEH
                    </a>
                </div>

                <nav class="space-x-4">
                    <ul class="flex space-x-4 text-white">
                        <li>
                            <a class="hover:text-gray-300" href="index.php">
                                Beranda
                            </a>
                        </li>
                        <li class="relative">
                            <a id="profilButton" class="hover:text-gray-300 cursor-pointer">
                                Profil
                                <i class="fas fa-caret-down"></i>
                            </a>
                            <ul id="profilMenu"
                                class="absolute left-0 mt-2 w-48 bg-white text-gray-800 rounded shadow-lg hidden">
                                <li>
                                    <a class="block px-4 py-2 hover:bg-gray-200" href="/anggota">
                                        Anggota
                                    </a>
                                </li>
                                <li>
                                    <a class="block px-4 py-2 hover:bg-gray-200" href="/struktur">
                                        Struktur Organisasi
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="hover:text-gray-300" href="/berita">
                                Berita
                            </a>
                        </li>
                        <li>
                            <a class="hover:text-gray-300" href="galeri.php">
                                Galeri
                            </a>
                        </li>
                        <li>
                            <a class="hover:text-gray-300" href="/testimonial">
                                Testimonial
                            </a>
                        </li>
                        <li>
                            <a class="hover:text-gray-300" href="/tentang">
                                Tentang Kami
                            </a>
                        </li>
                        <?php if (!isset($_SESSION['login'])) { ?>
                        <li>
                            <a class="hover:text-gray-300" href="/login">
                                Login
                            </a>
                        </li>
                        <?php } else { ?>
                        <li>
                            <a class="hover:text-gray-300" href="akunuser.php?logoutSubmit=1">
                                Logout (
                                <?= $_SESSION['namauser']; ?>
                                )
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
                <button class="text-white md:hidden">
                    <i class="fas fa-bars">
                    </i>
                </button>
            </div>
        </header>

    </section>
    <!-- Intro -->
    <section class="py-16 bg-gray-800 text-white text-center" id="intro">
        <div class="container mx-auto">
            <h3 class="text-3xl font-bold mb-4">
                SELAMAT DATANG
            </h3>
            <p class="text-lg">
                Sebuah website yang menjadikan tempatnya para penggemar bonsai yang ada di daerah kota banda aceh
            </p>
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8">
        <div class="container mx-auto text-center">
            <div class="flex justify-center space-x-6 mb-4">
                <a class="hover:text-gray-400" href="#">
                    <i class="fab fa-facebook">
                    </i>
                </a>
                <a class="hover:text-gray-400" href="#">
                    <i class="fab fa-twitter">
                    </i>
                </a>
                <a class="hover:text-gray-400" href="#">
                    <i class="fab fa-linkedin">
                    </i>
                </a>
                <a class="hover:text-gray-400" href="#">
                    <i class="fab fa-google-plus">
                    </i>
                </a>
            </div>
            <p>
                Copyright © 2024 www.ppbikotabandaaceh.com All Rights Reserved. Made by Aneuk Ti Uinar
            </p>
        </div>
    </footer>
    <!-- Scripts -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const profilButton = document.getElementById("profilButton");
            const profilMenu = document.getElementById("profilMenu");

            profilButton.addEventListener("click", function (event) {
                event.preventDefault();
                profilMenu.classList.toggle("hidden");
            });

            // Menutup dropdown jika klik di luar menu
            document.addEventListener("click", function (event) {
                if (!profilButton.contains(event.target) && !profilMenu.contains(event.target)) {
                    profilMenu.classList.add("hidden");
                }
            });
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
    </script>
</body>

</html>