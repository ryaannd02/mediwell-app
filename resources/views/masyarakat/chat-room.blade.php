<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Chat dengan Dokter - MediWell</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body class="bg-gray-50 text-gray-800 h-screen flex flex-col">

  <!-- Header Chat -->
  <header class="bg-white shadow p-4 flex items-center justify-between">
    <div class="flex items-center gap-3">
      <div class="w-10 h-10 rounded-full bg-cyan-100 flex items-center justify-center">
        <i class="bi bi-person-circle text-cyan-700 text-xl"></i>
      </div>
      <div>
        <h2 class="font-semibold text-gray-800">{{ $doctor->name }}</h2>
        <p class="text-sm text-gray-500">{{ $doctor->specialist ?? 'Dokter Umum' }}</p>
      </div>
    </div>
    <a href="{{ route('doctors.index') }}" class="text-sm text-cyan-700 hover:underline">← Kembali</a>
  </header>

  <!-- Body Chat -->
  <main id="chat-body" class="flex-1 bg-white overflow-y-auto p-4 space-y-4 border-t">
    {{-- Pesan akan muncul di sini --}}
    @forelse($messages as $message)
      <div class="flex {{ $message->sender_id == $doctor->id ? 'items-start gap-2' : 'items-start gap-2 justify-end' }}">
        @if($message->sender_id == $doctor->id)
          <div class="w-8 h-8 rounded-full bg-cyan-100 flex items-center justify-center">
            <i class="bi bi-person-circle text-cyan-700"></i>
          </div>
          <div class="bg-gray-100 px-3 py-2 rounded-lg max-w-md break-words">
            <p class="text-sm text-gray-800">{{ $message->message }}</p>
          </div>
        @else
          <div class="bg-cyan-600 text-white px-3 py-2 rounded-lg max-w-md break-words">
            <p class="text-sm">{{ $message->message }}</p>
          </div>
        @endif
      </div>
    @empty
      <p class="text-gray-400 text-center">Belum ada pesan. Mulai percakapan dengan dokter.</p>
    @endforelse
  </main>

  <!-- Input Chat -->
  <form action="{{ route('masyarakat.chat.send', $doctor->id) }}" method="POST" class="p-4 bg-white border-t flex gap-2">
    @csrf
    <input type="text" name="message" placeholder="Ketik pesan..."
           class="flex-1 border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-600">
    <button type="submit"
            class="bg-cyan-600 text-white px-4 py-2 rounded-lg hover:bg-cyan-700">
      Kirim
    </button>
  </form>

  <!-- Auto-scroll ke bawah -->
  <script>
    const chatBody = document.getElementById('chat-body');
    chatBody.scrollTop = chatBody.scrollHeight;
  </script>

</body>
</html>