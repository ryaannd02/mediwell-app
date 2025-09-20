<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class TokoController extends Controller
{
    public function dashboard()
    {
        $productsQuery = Product::where('toko_user_id', auth()->id());

        $totalProducts = $productsQuery->count();
        $totalStock    = $productsQuery->sum('stock');
        $outOfStock    = $productsQuery->where('stock', 0)->count();
        $latestProducts= $productsQuery->latest()->take(3)->get();

        return view('toko.dashboard', compact(
            'totalProducts',
            'totalStock',
            'outOfStock',
            'latestProducts'
        ));
    }

}
