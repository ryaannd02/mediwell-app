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

<!-- Modal Profile -->
<div id="profileModal" class="hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl max-w-sm w-full p-6 text-center relative">
        <!-- Tombol Close -->
        <button id="closeProfile" class="absolute top-3 right-3 text-slate-500 hover:text-red-500">✕</button>

        <!-- Foto Profil Default -->
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

<!-- Script toggle modal -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const profileBtn = document.getElementById('profileBtn');
        const profileModal = document.getElementById('profileModal');
        const closeProfile = document.getElementById('closeProfile');

        if (profileBtn && profileModal && closeProfile) {
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
        }
    });
</script>