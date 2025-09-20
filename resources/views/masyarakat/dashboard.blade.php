<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Masyarakat - MediWell</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        
        <!-- Logo + Nama -->
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/mediwell.png') }}" alt="Logo MediWell" class="h-10 w-auto">
            <h1 class="text-2xl font-bold text-teal-600">MediWell</h1>
        </div>

        <!-- Menu -->
        <ul class="flex items-center space-x-6">
            <li><a href="/masyarakat/dashboard" class="hover:text-teal-600">Beranda</a></li>
            <li><a href="#artikel" class="hover:text-teal-600">Artikel Kesehatan</a></li>
            <li><a href="{{ route('doctors.index') }}" class="hover:text-teal-600">Chat dengan Dokter</a></li>
            <li><a href="{{ route('masyarakat.products') }}" class="hover:text-teal-600">Toko Kesehatan</a></li>
            <!-- Ikon Profile -->
            <li>
                <button id="profileBtn"
                    class="flex items-center justify-center w-10 h-10 rounded-full border border-slate-300 hover:border-cyan-600 transition">
                    <i class="bi bi-person-circle text-cyan-800 text-xl"></i>
                </button>
            </li>
        </ul>
    </div>
</nav>

<section class="py-20">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center gap-10">
        
        <!-- Kolom teks -->
        <div class="md:w-1/2 space-y-6">
            <h2 class="text-4xl font-bold leading-snug text-gray-800">
                Semua tenaga medis di MediWell dipastikan memenuhi standar regulasi dan etika layanan
            </h2>
            <p class="text-lg text-gray-600">
                Punya pertanyaan terkait kondisi kesehatan kamu? Konsultasikan dengan tenaga medis kami yang sudah terverifikasi dan terpercaya.
            </p>
            <a href="/doctors" 
               class="inline-block bg-teal-600 text-white px-8 py-3 rounded-lg font-semibold shadow hover:bg-teal-700 transition">
                Mulai Konsultasi
            </a>
        </div>

        <!-- Kolom gambar -->
        <div class="md:w-1/2 flex justify-center">
            <img src="{{ asset('images/dokter.png') }}" 
                 alt="Ilustrasi Dokter"
                 class="w-96 h-auto object-contain">
        </div>
    </div>
</section>

    <!-- Mengapa Memilih Kami -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h3 class="text-2xl font-bold mb-10">Mengapa Memilih Kami?</h3>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="text-4xl mb-4">🩺</div>
                    <h4 class="font-semibold mb-2">Dokter Terpercaya</h4>
                    <p>Konsultasi dengan dokter yang sudah terverifikasi dan berpengalaman.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="text-4xl mb-4">📚</div>
                    <h4 class="font-semibold mb-2">Artikel Kesehatan</h4>
                    <p>Dapatkan informasi kesehatan terpercaya dan mudah dipahami.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="text-4xl mb-4">🏥</div>
                    <h4 class="font-semibold mb-2">Toko Kesehatan</h4>
                    <p>Belanja produk kesehatan lengkap dan aman di MediWell Store.</p>
                </div>
            </div>
        </div>
    </section>

<!-- Artikel Kesehatan -->
<section id="artikel" class="py-16">
    <div class="max-w-7xl mx-auto px-6">
        <h3 class="text-2xl font-bold mb-6">Artikel Kesehatan</h3>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h4 class="text-xl font-semibold mb-2">Pentingnya Menjaga Kesehatan Sejak Dini</h4>
            <p class="text-gray-600 mb-4">
                Menjaga kesehatan sejak dini sangat penting untuk mencegah penyakit di masa depan.
                Mulailah dengan pola makan sehat, olahraga teratur, dan istirahat cukup.
            </p>
            <!-- Ganti href dengan link eksternal -->
            <a href="https://www.zenyum.com/id-id/blog/pentingnya-menjaga-kesehatan-sejak-usia-muda-dan-tips-mudah-mewujudkannya/"
               target="_blank"
               class="text-teal-600 font-semibold hover:underline">
               Baca Selengkapnya →
            </a>
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer class="bg-teal-600 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
            <p>&copy; 2025 MediWell. All rights reserved.</p>
            <ul class="flex space-x-6 mt-4 md:mt-0">
                <li><a href="/masyarakat/dashboard" class="hover:underline">Beranda</a></li>
                <li><a href="/articles" class="hover:underline">Artikel</a></li>
                <li><a href="/doctors" class="hover:underline">Chat</a></li>
                <li><a href="/products" class="hover:underline">Toko</a></li>
                <li><a href="/about" class="hover:underline">Tentang Kami</a></li>
            </ul>
        </div>
    </footer>

    <!-- Modal Profile -->
    <!-- Modal Profile -->
    <div id="profileModal" class="hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-xl max-w-sm w-full p-6 text-center relative">
            <!-- Tombol Close -->
            <button id="closeProfile" class="absolute top-3 right-3 text-slate-500 hover:text-red-500">✕</button>

            <!-- Foto Profil Default (Bootstrap Icon) -->
            <div class="flex justify-center text-cyan-700 text-7xl">
                <i class="bi bi-person-circle"></i>
            </div>

            <h2 class="mt-4 text-xl font-semibold">Profil</h2>
            <p class="mt-2 font-medium">{{ Auth::user()->name ?? 'Guest' }}</p>
            <p class="text-slate-600">{{ Auth::user()->email ?? 'guest@example.com' }}</p>

            <!-- Tombol Logout -->
            <form method="POST" action="{{ route('logout') }}" class="mt-6">
                @csrf
                <button type="submit"
                    class="w-full bg-red-500 text-white py-2 rounded-full hover:bg-red-600 transition">
                    Logout
                </button>
            </form>
        </div>
    </div>


    <!-- Script untuk toggle modal -->
    <script>
        const profileBtn = document.getElementById('profileBtn');
        const profileModal = document.getElementById('profileModal');
        const closeProfile = document.getElementById('closeProfile');

        profileBtn.addEventListener('click', () => {
            profileModal.classList.remove('hidden');
        });

        closeProfile.addEventListener('click', () => {
            profileModal.classList.add('hidden');
        });

        profileModal.addEventListener('click', (e) => {
            if (e.target === profileModal) {
                profileModal.classList.add('hidden');
            }
        });
    </script>



</body>
</html>