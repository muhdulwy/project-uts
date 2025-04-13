<html>

<head>
    <title>
        PPBI Banda Aceh
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-white text-gray-900">
    <header class="bg-black text-white p-4">
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
    <section class="bg-black text-green-500 text-center py-2">
        <h1>STRUKTUR ORGANISASI PPBI BANDA ACEH</h1>
        <h2 class="text-white">Struktur Organisasi Perkumpulan Penggemar Bonsai Indonesia (PPBI) Kota Banda Aceh
        </h2>
    </section>
    <main class="container mx-auto py-8">
        <h2 class="text-center text-2xl font-semibold mb-8">
            Organisasi PPBI Kota Banda Aceh
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div class="text-center">
                <img alt="Ketua - Foto of FADLI NYAK UMAR" class="mx-auto mb-4" height="200"
                    src="{{ asset('image/farid.jpeg') }}" width="200" />
                <h3 class="text-lg font-semibold">
                    Ketua
                </h3>
                <p>
                    FADLI NYAK UMAR
                </p>
            </div>
            <div class="text-center">
                <img alt="Wakil Ketua - Foto of FADLI" class="mx-auto mb-4" height="200"
                    src="{{ asset('image/fahmi.jpeg') }}" width="200" />
                <h3 class="text-lg font-semibold">
                    Wakil Ketua
                </h3>
                <p>
                    FADLI
                </p>
            </div>
            <div class="text-center">
                <img alt="Sekretaris - Foto of YUSNADI" class="mx-auto mb-4" height="200"
                    src="{{ asset('image/yusnardi.jpeg') }}" width="200" />
                <h3 class="text-lg font-semibold">
                    Sekretaris
                </h3>
                <p>
                    YUSNARDI
                </p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <img alt="Bendahara - Foto of MUNANDI" class="mx-auto mb-4" height="200"
                    src="{{ asset('image/marwan.jpg') }}" width="200" />
                <h3 class="text-lg font-semibold">
                    BENDAHARA
                </h3>
                <p>
                    MARWAN
                </p>
            </div>
            <div class="text-center">
                <img alt="Bidang Pendidikan - Foto of AGUSTIAN LUBIS" class="mx-auto mb-4" height="200"
                    src="{{ asset('image/agustiar.jpg') }}" width="200" />
                <h3 class="text-lg font-semibold">
                    BIDANG PENDIDIKAN
                </h3>
                <p>
                    AGUSTIAR LUBIS
                </p>
            </div>
            <div class="text-center">
                <img alt="Bidang Humas - Foto of HENDRA SAPUTRA" class="mx-auto mb-4" height="200"
                    src="{{ asset('image/hendra.jpg') }}" width="200" />
                <h3 class="text-lg font-semibold">
                    BIDANG HUMAS
                </h3>
                <p>
                    HENDRA SAPUTRA
                </p>
            </div>
        </div>
    </main>
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