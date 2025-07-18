<x-app-layout>
    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">Edit Produk</h2>

        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block">Nama Produk</label>
                <input type="text" name="name" value="{{ $product->name }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block">Deskripsi</label>
                <textarea name="description" class="w-full border rounded px-3 py-2">{{ $product->description }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block">Harga Estimasi</label>
                <input type="number" name="estimated_price" value="{{ $product->estimated_price }}" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block">Gambar Produk (kosongkan jika tidak diganti)</label>
                <input type="file" name="image_url" accept="image/*">
                @if ($product->image_url)
                <img src="{{ asset('storage/' . $product->image_url) }}" class="h-24 mt-2 rounded">
                @endif
            </div>

            <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded">Perbarui</button>
        </form>
    </div>
</x-app-layout>