<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Toko - MediWell</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

  <div class="bg-white shadow-lg rounded-xl w-full max-w-md p-8">
    <!-- Logo -->
    <div class="flex flex-col items-center mb-6">
      <img src="{{ asset('images/mediwell.png') }}" alt="Logo MediWell" class="h-12 w-auto mb-2">
      <h1 class="text-2xl font-bold text-teal-600">Login Toko</h1>
      <p class="text-sm text-gray-500">Masuk sebagai pemilik toko kesehatan</p>
    </div>

    <!-- Form Login -->
    <form method="POST" action="{{ url('/login/toko') }}" class="space-y-5">
      @csrf

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" required
          class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500 focus:outline-none border-gray-300"
          placeholder="email@toko.com">
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" required
          class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500 focus:outline-none border-gray-300"
          placeholder="••••••••">
      </div>

      <!-- Tombol Login -->
      <button type="submit"
        class="w-full bg-teal-600 text-white py-2 rounded-lg font-semibold hover:bg-teal-700 transition">
        Login Toko
      </button>
    </form>

  </div>

</body>
</html>