<x-app-layout>
    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">{{ $product->name }}</h2>

        @if ($product->image_url)
        <img src="{{ asset('storage/' . $product->image_url) }}" class="w-full h-60 object-cover mb-4 rounded">
        @endif

        <p class="mb-4 text-gray-700">{{ $product->description }}</p>

        <p class="text-xl font-semibold text-blue-600 mb-4">Rp {{ number_format($product->estimated_price ?? 0) }}</p>

        <a href="{{ route('products.edit', $product) }}" class="bg-yellow-600 text-white px-4 py-2 rounded">Edit</a>
        <a href="{{ route('products.index') }}" class="ml-2 text-blue-600 underline">Kembali</a>
    </div>
</x-app-layout>