<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pesanan Berhasil - MediWell</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

  @include('partials.navbar')

    <main class="max-w-3xl mx-auto px-6 py-12 text-center">
    <h1 class="text-3xl font-bold text-green-700 mb-6">Pesanan Berhasil 🎉</h1>

    <div class="bg-white rounded-xl shadow p-8">
        @if($product->photo)
        <img src="{{ asset('storage/'.$product->photo) }}" 
            alt="{{ $product->name }}" 
            class="w-40 h-40 object-cover mx-auto rounded mb-4">
        @endif

        <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
        <p class="text-cyan-700 font-bold">
        Rp {{ number_format($product->price,0,',','.') }}
        </p>

        <p class="mt-4 text-gray-700">Silakan lanjutkan pemesanan melalui WhatsApp.</p>

        <a href="https://wa.me/{{ $whatsappNumber }}?text=Halo,%20saya%20ingin%20memesan%20{{ urlencode($product->name) }}%20seharga%20Rp%20{{ number_format($product->price,0,',','.') }}"
        target="_blank"
        class="mt-6 inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
        Lanjutkan ke WhatsApp
        </a>
    </div>

    <a href="{{ route('masyarakat.products') }}" 
        class="mt-6 inline-block text-cyan-700 hover:underline">
        ← Kembali ke Toko Kesehatan
    </a>
    </main>

</body>
</html>