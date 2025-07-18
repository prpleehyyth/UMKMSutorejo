<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('umkm_id', Auth::user()->umkm->id)->latest()->get();
        return view('user.products.index', compact('products'));
    }

    public function create()
    {
        return view('user.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'estimated_price' => 'nullable|numeric',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('products', 'public');
            $validated['image_url'] = $path;
        }

        $validated['umkm_id'] = Auth::user()->umkm->id;

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Product $product)
    {
        $this->authorizeProduct($product);
        return view('user.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $this->authorizeProduct($product);
        return view('user.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorizeProduct($product);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'estimated_price' => 'nullable|numeric',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('products', 'public');
            $validated['image_url'] = $path;
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $this->authorizeProduct($product);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }

    private function authorizeProduct(Product $product)
    {
        if ($product->umkm_id !== Auth::user()->umkm->id) {
            abort(403);
        }
    }
}
