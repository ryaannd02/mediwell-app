@extends('layouts.toko')

@section('content')
<div class="max-w-7xl mx-auto p-6 space-y-6">

  <!-- Judul -->
  <h1 class="text-2xl font-bold text-teal-600">Dashboard Toko</h1>

  <!-- Statistik Ringkas -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
    <div class="bg-white p-6 rounded-lg shadow">
      <p class="text-gray-500">Total Produk</p>
      <h2 class="text-3xl font-bold text-teal-600">{{ $totalProducts }}</h2>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
      <p class="text-gray-500">Stok Keseluruhan</p>
      <h2 class="text-3xl font-bold text-teal-600">{{ $totalStock }}</h2>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
      <p class="text-gray-500">Produk Habis</p>
      <h2 class="text-3xl font-bold text-red-600">{{ $outOfStock }}</h2>
    </div>
  </div>

<!-- Aksi Cepat -->
<div class="flex gap-4 mt-6">
  <a href="{{ route('toko.products.create') }}" 
     class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">
    + Tambah Produk
  </a>
  <a href="{{ route('toko.products.index') }}" 
     class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
    Lihat Semua Produk
  </a>
</div>



</div>
@endsection