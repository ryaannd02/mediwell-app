<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Dokter - MediWell</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

@include('partials.navbar-dokter')

  <main class="max-w-6xl mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold text-cyan-900 mb-6">Dashboard Dokter</h1>

    <div class="bg-white rounded-xl shadow p-6">

      @if($conversations->count())
        <ul class="divide-y divide-gray-200">
          @foreach($conversations as $conversation)
            <li class="py-3 flex items-center justify-between">
              <div>
                <p class="font-medium text-gray-800">
                  {{ $conversation->masyarakat->name }}
                </p>
                <p class="text-sm text-gray-500">
                  {{ Str::limit($conversation->last_message, 50) }}
                </p>
              </div>
                <a href="{{ route('dokter.chat.room', $conversation->id) }}"
                  class="text-cyan-600 hover:underline">
                  Buka Chat →
                </a>
            </li>
          @endforeach
        </ul>
      @else
        <div class="text-center text-gray-500 py-10">
          <p class="text-lg font-medium">Belum ada chat</p>
          <p class="text-sm">Percakapan dengan pasien akan muncul di sini.</p>
        </div>
      @endif
    </div>
  </main>

</body>
</html>