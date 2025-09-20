<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register Masyarakat - MediWell</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">

  <div class="flex w-full max-w-5xl bg-white rounded-xl shadow-lg overflow-hidden">
    <!-- Panel kiri -->
    <div class="hidden md:flex w-1/2 bg-gradient-to-br from-teal-600 to-cyan-600 items-center justify-center p-8">
      <div class="text-center text-white">
        <h2 class="text-3xl font-bold mb-4">Buat Akun Baru ✨</h2>
        <p class="text-sm text-cyan-100">Gabung MediWell dan dapatkan akses ke artikel kesehatan, chat dokter, dan toko kesehatan.</p>
      </div>
    </div>

    <!-- Panel kanan -->
    <div class="w-full md:w-1/2 p-10">
      <h1 class="text-2xl font-bold text-teal-600 mb-6">Registrasi Masyarakat</h1>

      {{-- Pesan sukses --}}
      @if(session('success'))
        <p class="text-green-600 text-sm mb-4">{{ session('success') }}</p>
      @endif

      {{-- Error validasi --}}
      @if($errors->any())
        <ul class="text-red-600 text-sm mb-4">
          @foreach($errors->all() as $error)
            <li>• {{ $error }}</li>
          @endforeach
        </ul>
      @endif

      <form method="POST" action="{{ url('/register') }}" class="space-y-5">
        @csrf

        <div>
          <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
          <div class="relative mt-1">
            <i class="bi bi-person absolute left-3 top-3 text-gray-400"></i>
            <input type="text" name="name" value="{{ old('name') }}" required
              class="w-full pl-10 pr-3 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500 border-gray-300">
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <div class="relative mt-1">
            <i class="bi bi-envelope absolute left-3 top-3 text-gray-400"></i>
            <input type="email" name="email" value="{{ old('email') }}" required
              class="w-full pl-10 pr-3 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500 border-gray-300">
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Password</label>
          <div class="relative mt-1">
            <i class="bi bi-lock absolute left-3 top-3 text-gray-400"></i>
            <input type="password" name="password" required
              class="w-full pl-10 pr-3 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500 border-gray-300">
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
          <div class="relative mt-1">
            <i class="bi bi-lock-fill absolute left-3 top-3 text-gray-400"></i>
            <input type="password" name="password_confirmation" required
              class="w-full pl-10 pr-3 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500 border-gray-300">
          </div>
        </div>

        <button type="submit"
          class="w-full bg-teal-600 text-white py-2 rounded-lg font-semibold hover:bg-teal-700 transition">
          Daftar
        </button>
      </form>

      <p class="text-sm text-center mt-6 text-gray-600">
        Sudah punya akun?
        <a href="{{ url('/login') }}" class="text-teal-600 hover:underline">Login di sini</a>
      </p>
    </div>
  </div>

</body>
</html>