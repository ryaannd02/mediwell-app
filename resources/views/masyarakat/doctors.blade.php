<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Chat dengan Dokter - MediWell</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body class="bg-white text-slate-900">

  <!-- Navbar -->
  @include('partials.navbar')

  <!-- Konten utama -->
  <main class="max-w-7xl mx-auto px-4 py-12 grid md:grid-cols-2 gap-10">
    
    <!-- Bagian kiri -->
    <div>
      <div class="bg-gradient-to-r from-cyan-50 to-teal-50 rounded-xl p-6 text-center shadow">
        <h2 class="text-xl font-semibold text-cyan-900">
          Silakan jelaskan kondisi dan dapatkan solusi dari dokter terpercaya
        </h2>
      </div>

      <div class="mt-8">
        <h3 class="text-lg font-semibold text-cyan-900 mb-4 flex items-center gap-2">
          <i class="bi bi-list-check text-cyan-700"></i> Cara chat dokter :
        </h3>
        <ul class="space-y-3 text-slate-700">
          <li class="flex items-start gap-2">
            <i class="bi bi-person-badge text-cyan-700"></i>
            Pilih dokter spesialis yang sesuai dengan gejala/penyakitmu
          </li>
          <li class="flex items-start gap-2">
            <i class="bi bi-chat-left-text text-cyan-700"></i>
            Klik chat dokter untuk berkomunikasi
          </li>
          <li class="flex items-start gap-2">
            <i class="bi bi-journal-text text-cyan-700"></i>
            Ceritakan kondisi kamu saat ini
          </li>
          <li class="flex items-start gap-2">
            <i class="bi bi-capsule text-cyan-700"></i>
            Dokter akan merespon dengan solusi & saran obat
          </li>
        </ul>
      </div>
    </div>

    <!-- Bagian kanan -->
    <div>
      <h2 class="text-2xl font-semibold text-cyan-900 mb-6 flex items-center gap-2">
        <i class="bi bi-people-fill text-cyan-700"></i> Rekomendasi Dokter
      </h2>

        @forelse($doctors as $doctor)
          <div class="bg-slate-100 rounded-xl p-6 flex items-center justify-between mb-6 hover:shadow-lg transition">
            <div class="flex items-center gap-4">
              <div class="w-16 h-16 rounded-full bg-cyan-100 flex items-center justify-center">
                <i class="bi bi-person-circle text-cyan-700 text-3xl"></i>
              </div>
              <div>
                <h3 class="text-lg font-semibold text-slate-800">{{ $doctor->name }}</h3>
                <p class="text-sm text-slate-600">Dokter Umum</p>
                <span class="inline-flex items-center mt-2 px-2 py-1 text-xs bg-white rounded border border-slate-300">
                  🩺 Pengalaman tidak tersedia
                </span>
              </div>
            </div>
            <a href="{{ route('masyarakat.chat.room', $doctor->id) }}"
              class="px-4 py-2 rounded bg-cyan-800 text-white hover:bg-cyan-900 transition">
              Chat
            </a>
          </div>
        @empty
          <p class="text-gray-600">Belum ada dokter tersedia.</p>
        @endforelse
      </main>
    </div>
  </main>

  <!-- Footer -->
  <footer class="border-t border-slate-200 bg-white mt-12">
    <div class="max-w-7xl mx-auto px-4 py-6 text-sm text-slate-600 flex items-center justify-between">
      <span>© 2025 MediWell. All rights reserved.</span>
      <a href="{{ url('/masyarakat/dashboard') }}" class="hover:text-cyan-800 transition">Kembali ke Beranda</a>
    </div>
  </footer>

</body>
</html>