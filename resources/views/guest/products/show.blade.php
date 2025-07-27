<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }} - Detail Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 bg-white p-6 rounded shadow">

            @if($product->image_url)
            <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded mb-6">
            @endif

            <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>

            <p class="text-blue-700 font-semibold text-xl mb-4">
                Rp {{ number_format($product->estimated_price, 0, ',', '.') }}
            </p>

            <p class="text-gray-700 mb-6">
                {{ $product->description }}
            </p>

            <p class="text-sm text-gray-500">
                Diproduksi oleh:
                <a href="{{ route('guest.umkm.show', $product->umkm->id) }}" class="text-blue-600 hover:underline">
                    {{ $product->umkm->name }}
                </a>
            </p>

            <div class="mt-6">
                <a href="{{ route('guest.umkm.show', $product->umkm->id) }}" class="text-sm text-blue-600 hover:underline">
                    ← Kembali ke UMKM
                </a>
            </div>
        </div>
    </section>

</body>

</html>