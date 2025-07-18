<!-- resources/views/user/products/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Daftar Produk UMKM</h2>
    </x-slot>

    <div class="py-6 px-4 max-w-7xl mx-auto">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Produk</a>

            <table class="mt-4 w-full text-sm text-left">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>{{ Str::limit($product->description, 50) }}</td>
                        <td>
                            @if($product->photo)
                            <img src="{{ asset('storage/' . $product->photo) }}" class="w-16 h-16 object-cover">
                            @endif
                        </td>
                        <td class="flex gap-1">
                            <a href="{{ route('products.show', $product) }}" class="text-blue-600 hover:underline">Lihat</a>
                            <a href="{{ route('products.edit', $product) }}" class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>


<!-- resources/views/user/products/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Tambah Produk</h2>
    </x-slot>

    <div class="py-6 px-4 max-w-2xl mx-auto">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block font-medium">Nama Produk</label>
                    <input type="text" name="name" id="name" class="w-full border-gray-300 rounded" required>
                </div>

                <div class="mb-4">
                    <label for="price" class="block font-medium">Harga</label>
                    <input type="number" name="price" id="price" class="w-full border-gray-300 rounded" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block font-medium">Deskripsi</label>
                    <textarea name="description" id="description" rows="4" class="w-full border-gray-300 rounded"></textarea>
                </div>

                <div class="mb-4">
                    <label for="photo" class="block font-medium">Foto Produk</label>
                    <input type="file" name="photo" id="photo" class="w-full">
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('products.index') }}" class="px-4 py-2 text-gray-600">Batal</a>
                    <button type="submit" class="ml-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>