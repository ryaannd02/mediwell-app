<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Dokter - MediWell</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

  <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
    <!-- Header -->
    <div class="text-center mb-6">
      <i class="bi bi-heart-pulse text-5xl text-cyan-700"></i>
      <h1 class="text-2xl font-bold text-cyan-900 mt-2">Login Dokter</h1>
      <p class="text-gray-500 text-sm">Silakan masuk untuk melanjutkan</p>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ url('/login/dokter') }}" class="space-y-4">
      @csrf

      <!-- Email -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" placeholder="Email"
               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-600 focus:border-cyan-600">
      </div>

      <!-- Password -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" name="password" placeholder="Password"
               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-600 focus:border-cyan-600">
      </div>

      <!-- Tombol -->
      <button type="submit"
              class="w-full bg-cyan-600 text-white py-2 rounded-lg font-semibold hover:bg-cyan-700 transition">
        Login Dokter
      </button>
    </form>
  </div>

</body>
</html>