@extends('layouts.toko')

@section('content')
<h1 class="text-2xl font-bold text-teal-600 mb-6">Edit Produk</h1>

<form method="POST" action="{{ route('toko.products.update', $product) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

  <div>
    <label>Nama Produk</label>
    <input type="text" name="name" value="{{ $product->name }}" class="w-full border rounded p-2" required>
  </div>
  <div>
    <label>Harga</label>
    <input type="number" name="price" value="{{ $product->price }}" class="w-full border rounded p-2" required>
  </div>
  <div>
    <label>Stok</label>
    <input type="number" name="stock" value="{{ $product->stock }}" class="w-full border rounded p-2" required>
  </div>
  <div>
    <label>Foto Produk</label>
    @if($product->photo)
      <img src="{{ asset('storage/'.$product->photo) }}" class="h-20 mb-2">
    @endif
    <input type="file" name="photo" class="w-full border rounded p-2">
  </div>
  <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection