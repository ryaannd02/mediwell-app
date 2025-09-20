<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Toko Kesehatan - MediWell</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Navbar -->
  @include('partials.navbar')

  <!-- Konten utama -->
  <main class="max-w-7xl mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold text-cyan-900 mb-6">Toko Kesehatan</h1>

    @if($products->count())
      <div class="grid md:grid-cols-3 gap-6">
        @foreach($products as $product)
          <div class="bg-white rounded-xl shadow p-6">
            @if($product->photo)
              <img src="{{ asset('storage/'.$product->photo) }}" 
                  alt="{{ $product->name }}" 
                  class="w-full h-40 object-cover rounded mb-4">
            @else
              <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-500 mb-4">
                No Image
              </div>
            @endif

            <h3 class="font-semibold text-lg">{{ $product->name }}</h3>
            <p class="text-cyan-700 font-bold">
              Rp {{ number_format($product->price,0,',','.') }}
            </p>
            <p class="text-sm {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
              Stok: {{ $product->stock }}
            </p>

            <form action="{{ route('masyarakat.order', $product) }}" method="POST" class="mt-3">
              @csrf
              <button type="submit"
                      class="w-full bg-cyan-600 text-white px-4 py-2 rounded hover:bg-cyan-700">
                Beli
              </button>
            </form>
          </div>
        @endforeach
      </div>
    @else
      <div class="bg-white rounded-xl shadow p-10 text-center text-slate-600">
        <i class="bi bi-bag text-5xl text-cyan-700 mb-4"></i>
        <p class="text-lg font-medium">Belum ada produk ditampilkan.</p>
        <p class="text-sm text-slate-500 mt-2">
          Produk akan ditambahkan oleh role <span class="font-semibold">Toko</span>.
        </p>
      </div>
    @endif
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