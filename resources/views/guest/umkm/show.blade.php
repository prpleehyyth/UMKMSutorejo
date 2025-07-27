<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $umkm->name }} - UMKM Kelurahan Sutorejo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 bg-white p-6 rounded-lg shadow-lg">
            {{-- Profil UMKM --}}
            <div class="flex flex-col md:flex-row md:items-center md:space-x-6 mb-6">
                @if($umkm->logo)
                <img src="{{ asset('storage/' . $umkm->logo) }}" alt="Logo {{ $umkm->name }}" class="w-28 h-28 object-cover rounded mx-auto md:mx-0 mb-4 md:mb-0">
                @endif
                <div class="text-center md:text-left">
                    <h1 class="text-3xl font-bold text-blue-900">{{ $umkm->name }}</h1>
                    <p class="text-gray-600 mt-1">{{ $umkm->address }}</p>
                    @if($umkm->google_maps_link)
                    <a href="{{ $umkm->google_maps_link }}" target="_blank" class="inline-block mt-2 text-sm text-blue-600 hover:underline">📍 Lihat Lokasi di Google Maps</a>
                    @endif
                </div>
            </div>

            {{-- Info Tambahan --}}
            <div class="space-y-4 text-gray-700">
                @if($umkm->description)
                <p><span class="font-semibold text-gray-800">Tentang UMKM:</span> {{ $umkm->description }}</p>
                @endif

                @if($umkm->businessType)
                <p><span class="font-semibold text-gray-800">Jenis Usaha:</span> {{ $umkm->businessType->name }}</p>
                @endif

                @if($umkm->halal_certified)
                <p class="text-green-700 font-semibold">✔ UMKM ini memiliki sertifikat halal.</p>
                @endif



            </div>

            {{-- Tombol Kembali --}}
            <div class="mt-8">
                <a href="{{ route('guest.umkm.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">← Kembali ke Daftar UMKM</a>
            </div>
        </div>
    </section>

    {{-- Daftar Produk --}}
    @if($umkm->products->count())
    <section class="pb-16">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk dari {{ $umkm->name }}</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($umkm->products as $product)
                <div class="bg-white rounded-lg shadow-md p-4">
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover rounded mb-3">
                    @endif
                    <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                    <p class="text-sm text-gray-600 mb-2">{{ Str::limit($product->description, 80) }}</p>
                    <p class="font-bold text-blue-700">Rp {{ number_format($product->estimated_price, 0, ',', '.') }}</p>
                    {{-- Link ke detail produk --}}
                    <a href="{{ route('guest.products.show', $product->id) }}" class="inline-block mt-3 text-sm text-blue-600 hover:underline">Lihat Detail</a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

</body>

</html>