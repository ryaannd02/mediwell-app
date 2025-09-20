<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('toko_user_id', auth()->id())->get();
        return view('toko.products.index', compact('products'));
    }

    public function create()
    {
        return view('toko.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required',
            'stock' => 'required|integer|min:0',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Normalisasi harga
        $price = (int) str_replace(['.', ','], '', $request->price);

        $path = $request->hasFile('photo')
            ? $request->file('photo')->store('products','public')
            : null;

        Product::create([
            'toko_user_id' => auth()->id(),
            'name'         => $request->name,
            'price'        => $price,
            'stock'        => $request->stock,
            'photo'        => $path,
        ]);

        return redirect()->route('toko.products.index')->with('success','Produk berhasil ditambahkan');
    }

    public function edit(Product $product)
    {
        if ($product->toko_user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        return view('toko.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->toko_user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required',
            'stock' => 'required|integer|min:0',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Normalisasi harga
        $price = (int) str_replace(['.', ','], '', $request->price);

        $path = $product->photo;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('products','public');
        }

        $product->update([
            'name'  => $request->name,
            'price' => $price,
            'stock' => $request->stock,
            'photo' => $path,
        ]);

        return redirect()->route('toko.products.index')->with('success','Produk berhasil diupdate');
    }

    public function destroy(Product $product)
    {
        if ($product->toko_user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $product->delete();
        return redirect()->route('toko.products.index')->with('success','Produk berhasil dihapus');
    }
}