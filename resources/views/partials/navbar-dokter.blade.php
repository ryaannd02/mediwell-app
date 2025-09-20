<nav class="bg-white border-b border-gray-200 shadow-sm">
  <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
    <!-- Logo -->
    <a href="{{ route('dokter.dashboard') }}" class="flex items-center gap-2 text-cyan-700 font-bold text-xl">
      <img src="{{ asset('images/mediwell.png') }}" alt="MediWell Logo" class="h-8 w-8">
      <span>MediWell Dokter</span>
    </a>

    <!-- Menu -->
    <ul class="flex items-center space-x-6">
      <li>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="hover:text-red-600">Logout</button>
        </form>
      </li>
    </ul>
  </div>
</nav>