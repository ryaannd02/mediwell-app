<?php
namespace App\Http\Controllers;

use App\Models\Product;

class MasyarakatController extends Controller
{
    public function products()
    {
        $products = Product::where('stock','>',0)->latest()->get();
        return view('masyarakat.products', compact('products'));
    }

    public function order(Product $product)
    {
        // Pastikan stok masih ada
        if ($product->stock <= 0) {
            return redirect()->route('masyarakat.products')
                ->with('error', 'Stok produk habis.');
        }

        // Kurangi stok 1
        $product->decrement('stock', 1);

        // Nomor WhatsApp toko (ganti sesuai kebutuhan)
        $whatsappNumber = '6282310140064'; // format internasional tanpa +

        return view('masyarakat.order-success', compact('product','whatsappNumber'));
    }
}