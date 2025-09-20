@extends('layouts.toko')

@section('content')
<div class="flex justify-between items-center mb-6">
  <h1 class="text-2xl font-bold text-teal-600">Daftar Produk</h1>
<a href="{{ route('toko.products.create') }}" class="bg-teal-600 text-white px-4 py-2 rounded">
    + Tambah Produk
</a>
</div>

@if(session('success'))
  <p class="text-green-600 mb-4">{{ session('success') }}</p>
@endif

<div class="grid md:grid-cols-3 gap-6">
  @forelse($products as $product)
    <div class="bg-white p-4 rounded shadow">
        @if($product->photo)
        <img src="{{ asset('storage/'.$product->photo) }}" 
            alt="{{ $product->name }}" 
            class="w-full h-40 object-cover mb-2 rounded">
        @else
        <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-500">
            No Image
        </div>
        @endif
      <h3 class="font-bold">{{ $product->name }}</h3>
      <p>Rp {{ number_format($product->price,0,',','.') }}</p>
      <p>Stok: {{ $product->stock }}</p>
        <div class="flex gap-2 mt-2">
        <a href="{{ route('toko.products.edit',$product) }}" 
            class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>

        <form method="POST" action="{{ route('toko.products.destroy',$product) }}">
            @csrf @method('DELETE')
            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded">Hapus</button>
        </form>
        </div>
    </div>
  @empty
    <p class="text-gray-600">Belum ada produk.</p>
  @endforelse
</div>
@endsection