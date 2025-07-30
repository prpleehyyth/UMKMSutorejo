<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $umkm->name }} - UMKM Kelurahan Sutorejo</title>

    {{-- Tailwind CSS & Konfigurasi Kustom --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#4F46E5', // Warna Indigo-600
                        'darkBlue': '#1E40AF', // Warna Biru-800
                        'off-white': '#f8fafc',
                    },
                    fontFamily: {
                        'sans': ['Lato', 'sans-serif'],
                        'serif': ['Merriweather', 'serif'],
                    }
                }
            }
        }
    </script>

    {{-- Dependencies: Fonts & Icons --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Merriweather:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-off-white font-sans text-slate-700">

    {{-- Navbar --}}
    <nav x-data="{ open: false }" class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ url('/') }}" class="flex items-center space-x-3 flex-shrink-0">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Kelurahan Dukuh Sutorejo" class="w-14 h-14 object-contain">
                    <div>
                        <h1 class="font-serif text-xl font-bold text-slate-800">UMKM</h1>
                        <p class="text-sm text-slate-500">Dukuh Sutorejo</p>
                    </div>
                </a>
                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ url('/') }}" class="font-semibold text-slate-600 hover:text-primary transition-colors">Beranda</a>
                    <a href="{{ route('guest.umkm.index') }}" class="font-semibold text-slate-600 hover:text-primary transition-colors">Galeri UMKM</a>
                    <div class="pl-4 flex items-center space-x-3">
                        <a href="{{ route('login') }}" class="font-semibold text-primary px-5 py-2 rounded-lg hover:bg-indigo-50 transition-colors">Masuk</a>
                        <a href="{{ route('register') }}" class="bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-darkBlue transition-colors">Daftar</a>
                    </div>
                </div>
                <div class="md:hidden flex items-center">
                    <button @click="open = !open" class="text-slate-600 hover:text-primary p-2 rounded-md">
                        <i x-show="!open" class="fas fa-bars text-xl"></i>
                        <i x-show="open" style="display: none;" class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <div x-show="open" x-collapse style="display: none;" class="md:hidden bg-white border-t border-slate-200">
            <div class="px-4 pt-4 pb-6 space-y-3">
                <a href="{{ url('/') }}" class="block px-3 py-2 text-base font-semibold text-slate-700 rounded-md hover:bg-slate-100">Beranda</a>
                <a href="{{ route('guest.umkm.index') }}" class="block px-3 py-2 text-base font-semibold text-slate-700 rounded-md hover:bg-slate-100">Galeri UMKM</a>
                <div class="border-t border-slate-200 pt-4 space-y-3">
                    <a href="{{ route('login') }}" class="block w-full text-center font-semibold text-primary border border-primary px-4 py-2 rounded-lg hover:bg-indigo-50 transition-colors">Masuk</a>
                    <a href="{{ route('register') }}" class="block w-full text-center bg-primary text-white px-4 py-2 rounded-lg font-semibold hover:bg-darkBlue transition-colors">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Header / Profil Utama UMKM --}}
    <header class="py-16 bg-white border-b border-slate-200">
        <div class="max-w-4xl mx-auto px-6">
            <nav class="text-sm mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ url('/') }}" class="text-slate-500 hover:text-primary">Beranda</a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fa-solid fa-chevron-right w-3 h-3 text-slate-400"></i>
                            <span class="ml-1 font-semibold text-slate-800 md:ml-2">{{ $umkm->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="flex flex-col md:flex-row items-center text-center md:text-left gap-8">
                @if($umkm->logo)
                <div class="flex-shrink-0">
                    <img src="{{ asset('storage/' . $umkm->logo) }}" alt="Logo {{ $umkm->name }}"
                        class="w-32 h-32 object-cover rounded-full shadow-md border-4 border-white">
                </div>
                @endif
                <div class="flex-grow">
                    <h1 class="font-serif text-4xl font-bold text-slate-800">{{ $umkm->name }}</h1>
                    <p class="text-slate-500 mt-2 text-base">{{ $umkm->address }}</p>

                    @if($umkm->description)
                    <div x-data="{ expanded: false }" class="mt-3">
                        <div x-show="expanded" x-collapse.min.80px class="text-slate-600 space-y-2">
                            <p>{{ $umkm->description }}</p>
                        </div>
                        <p class="text-slate-600" x-show="!expanded">
                            {{ Str::limit($umkm->description, 150) }}
                        </p>
                        @if(strlen($umkm->description) > 150)
                        <button @click="expanded = !expanded" class="text-primary font-semibold text-sm mt-2 hover:underline">
                            <span x-show="!expanded">Baca Selengkapnya</span>
                            <span x-show="expanded" style="display: none;">Sembunyikan</span>
                        </button>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-12 border-t pt-8 border-slate-200">
                @if($umkm->businessType)
                <div class="flex items-center gap-3 p-3 bg-off-white rounded-lg">
                    <i class="fa-solid fa-tag fa-lg text-primary/70"></i>
                    <div>
                        <p class="text-xs text-slate-500">Jenis Usaha</p>
                        <p class="font-semibold text-slate-800">{{ $umkm->businessType->name }}</p>
                    </div>
                </div>
                @endif
                {{-- Variabel diperbaiki dari Maps_link menjadi Maps_link --}}
                @if($umkm->google_maps_link)
                <a href="{{ $umkm->Maps_link }}" target="_blank" class="flex items-center gap-3 p-3 bg-off-white rounded-lg hover:bg-slate-200 transition-colors">
                    <i class="fa-solid fa-map-location-dot fa-lg text-primary/70"></i>
                    <div>
                        <p class="text-xs text-slate-500">Lokasi</p>
                        <p class="font-semibold text-slate-800">Lihat di Google Maps</p>
                    </div>
                </a>
                @endif
                @if($umkm->halal_certified)
                <div class="flex items-center gap-3 p-3 bg-off-white rounded-lg">
                    <i class="fa-solid fa-check-circle fa-lg text-green-700/80"></i>
                    <div>
                        <p class="text-xs text-slate-500">Sertifikasi</p>
                        <p class="font-semibold text-slate-800">Tersertifikasi Halal</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </header>

    {{-- Daftar Produk --}}
    <main class="py-16">
        <div class="max-w-6xl mx-auto px-6">
            <div class="mb-8">
                <h2 class="font-serif text-3xl font-bold text-slate-800">Galeri Produk</h2>
                <p class="text-slate-500 mt-1">Produk unggulan yang ditawarkan oleh {{ $umkm->name }}.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($umkm->products as $product)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-slate-200 transition-all duration-300 hover:shadow-lg hover:border-slate-300 group">
                    @if($product->image)
                    <div class="overflow-hidden">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    @endif
                    <div class="p-5">
                        <h3 class="font-serif font-bold text-lg text-slate-800">{{ $product->name }}</h3>
                        <p class="text-sm text-slate-500 mt-1 mb-3 h-10">{{ Str::limit($product->description, 55) }}</p>
                        <p class="font-sans font-bold text-xl text-primary mb-4">
                            Rp {{ number_format($product->estimated_price, 0, ',', '.') }}
                        </p>
                        <a href="{{ route('guest.products.show', $product->id) }}"
                            class="block w-full text-center bg-primary text-white px-4 py-2 rounded-md font-semibold hover:bg-darkBlue transition-colors">
                            Lihat Detail
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <i class="fa-solid fa-box-open text-4xl text-slate-400"></i>
                    <p class="mt-4 text-slate-500">Belum ada produk yang ditambahkan untuk UMKM ini.</p>
                </div>
                @endforelse
            </div>
            <div class="mt-12 text-center">
                <a href="{{ route('guest.umkm.index') }}" class="font-semibold text-primary hover:underline">
                    ← Kembali ke Daftar Semua UMKM
                </a>
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="bg-slate-800 text-white py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Kelurahan Dukuh Sutorejo" class="w-14 h-14 object-contain bg-white p-1 rounded-full">
                        <div>
                            <h3 class="font-serif text-xl font-bold text-white">UMKM Dukuh Sutorejo</h3>
                            <p class="text-slate-400 text-sm">Kota Surabaya, Jawa Timur</p>
                        </div>
                    </div>
                    <p class="text-slate-400 leading-relaxed">
                        Membangun ekonomi lokal melalui digitalisasi UMKM di Kelurahan Dukuh Sutorejo.
                    </p>
                </div>
                <div class="space-y-4">
                    <h3 class="font-serif text-xl font-bold text-white">Hubungi Kami</h3>
                    <div class="space-y-3 text-slate-400">
                        <p><i class="fas fa-map-marker-alt w-5 text-center mr-2 text-primary/70"></i> Jl. Lebansari, No. 1, Surabaya</p>
                        <p><i class="fas fa-phone w-5 text-center mr-2 text-primary/70"></i> (031) 5961234</p>
                        <p><i class="fas fa-envelope w-5 text-center mr-2 text-primary/70"></i> info@sutorejo.id</p>
                    </div>
                </div>
                <div class="space-y-4">
                    <h3 class="font-serif text-xl font-bold text-white">Ikuti Kami</h3>
                    <div class="flex space-x-3">
                        <a href="#" class="w-12 h-12 flex items-center justify-center bg-slate-700 text-white rounded-lg hover:bg-primary transition-colors">
                            <i class="fas fa-globe text-xl"></i>
                        </a>
                        <a href="#" class="w-12 h-12 flex items-center justify-center bg-slate-700 text-white rounded-lg hover:bg-primary transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="w-12 h-12 flex items-center justify-center bg-slate-700 text-white rounded-lg hover:bg-primary transition-colors">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-700 mt-12 pt-8 text-center text-slate-500 text-sm">
                <p>&copy; {{ date('Y') }} Kelurahan Dukuh Sutorejo - KKN 47 UPNV Jatim 2025.</p>
            </div>
        </div>
    </footer>
</body>

</html>