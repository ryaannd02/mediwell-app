@extends('layouts.toko')

@section('content')
<h1 class="text-2xl font-bold text-teal-600 mb-6">Tambah Produk</h1>

<form method="POST" action="{{ route('toko.products.store') }}" enctype="multipart/form-data">
  @csrf
  <div>
    <label>Nama Produk</label>
    <input type="text" name="name" class="w-full border rounded p-2" required>
  </div>
  <div>
    <label>Harga</label>
    <input type="number" name="price" class="w-full border rounded p-2" required>
  </div>
  <div>
    <label>Stok</label>
    <input type="number" name="stock" class="w-full border rounded p-2" required>
  </div>
  <div>
    <label>Foto Produk</label>
    <input type="file" name="photo" class="w-full border rounded p-2">
  </div>
  <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection