<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Toko - MediWell</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Navbar khusus toko -->
  <nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <div class="flex items-center space-x-2">
        <img src="{{ asset('images/mediwell.png') }}" alt="Logo MediWell" class="h-10 w-auto">
        <h1 class="text-2xl font-bold text-teal-600">MediWell Toko</h1>
      </div>
      <ul class="flex items-center space-x-6">
        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="hover:text-red-600">Logout</button>
          </form>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Konten -->
  <main class="max-w-7xl mx-auto p-6">
    @yield('content')
  </main>

</body>
</html>