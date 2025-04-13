<html>

<head>
    <title>PPBI Banda Aceh</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-white text-black">
    <!-- Header -->
    <header class="bg-black text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold">PPBI BANDA ACEH</h1>
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
                        <a class="hover:text-gray-300" href="artikel.php">
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
        </div>
    </header>

    <!-- Main Content -->
    <main class="bg-black text-white py-8">
        <div class="container mx-auto text-center">
            <h2 class="text-orange-500 text-2xl font-bold">TENTANG KAMI</h2>
            <p class="mt-2">Sebuah Web bagi para komunitas maupun para penikmat bonsai</p>
        </div>
    </main>

    <!-- Contact Information -->
    <section class="bg-white py-12">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div>
                <i class="fas fa-map-marker-alt text-orange-500 text-4xl mb-4"></i>
                <h3 class="font-bold">OUR OFFICE LOCATION</h3>
                <p>Jl. Soekarno Hatta Km. 1 No. 2 A, Mibo, Kec. Banda Raya Banda Aceh 23238</p>
            </div>
            <div>
                <i class="fas fa-envelope text-orange-500 text-4xl mb-4"></i>
                <h3 class="font-bold">EMAIL</h3>
                <p>ppbibandaaceh@gmail.com</p>
            </div>
            <div>
                <i class="fas fa-phone text-orange-500 text-4xl mb-4"></i>
                <h3 class="font-bold">PHONE NUMBER</h3>
                <p>089617303182</p>
            </div>
        </div>
    </section>
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