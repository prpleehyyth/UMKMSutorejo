<x-app-layout>
    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">Tambah Produk</h2>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block">Nama Produk</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block">Deskripsi</label>
                <textarea name="description" class="w-full border rounded px-3 py-2"></textarea>
            </div>

            <div class="mb-4">
                <label class="block">Harga Estimasi</label>
                <input type="number" name="estimated_price" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block">Gambar Produk</label>
                <input type="file" name="image_url" accept="image/*">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>