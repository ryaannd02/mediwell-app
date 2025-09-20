<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Chat dengan Pasien - MediWell</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 h-screen flex flex-col">

  <header class="bg-white shadow p-4 flex items-center justify-between">
    <h2 class="font-semibold text-gray-800">
      Chat dengan {{ $conversation->masyarakat->name }}
    </h2>
    <a href="{{ route('dokter.dashboard') }}" class="text-sm text-cyan-700 hover:underline">← Kembali</a>
  </header>

  <main id="chat-body" class="flex-1 bg-white overflow-y-auto p-4 space-y-4 border-t">
    @forelse($messages as $message)
      <div class="flex {{ $message->sender_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
        <div class="{{ $message->sender_id == auth()->id() ? 'bg-cyan-600 text-white' : 'bg-gray-100 text-gray-800' }} px-3 py-2 rounded-lg max-w-md break-words">
          <p class="text-sm">{{ $message->message }}</p>
        </div>
      </div>
    @empty
      <p class="text-gray-400 text-center">Belum ada pesan.</p>
    @endforelse
  </main>

  <form action="{{ route('dokter.chat.send', $conversation->id) }}" method="POST" class="p-4 bg-white border-t flex gap-2">
    @csrf
    <input type="text" name="message" placeholder="Ketik pesan..."
           class="flex-1 border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-600">
    <button type="submit"
            class="bg-cyan-600 text-white px-4 py-2 rounded-lg hover:bg-cyan-700">
      Kirim
    </button>
  </form>

  <script>
    const chatBody = document.getElementById('chat-body');
    chatBody.scrollTop = chatBody.scrollHeight;
  </script>
</body>
</html>