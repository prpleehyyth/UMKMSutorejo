<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with('umkm')->findOrFail($id);
        return view('guest.products.show', compact('product'));
    }
}
