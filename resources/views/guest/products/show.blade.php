<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }} - Detail Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind CSS & Konfigurasi Kustom --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#4F46E5',
                        'darkBlue': '#1E40AF',
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
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script> {{-- Dihapus karena tidak dipakai di halaman ini --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-off-white font-sans text-slate-700">

    {{-- 1. Navbar --}}
    <nav x-data="{ open: false }" class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ url('/') }}" class="flex items-center space-x-3 flex-shrink-0">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Kelurahan Dukuh Sutorejo" class="w-14 h-14 object-contain">
                    <div>
                        {{-- Ditambahkan font-serif --}}
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

    {{-- 2. Konten Utama Detail Produk --}}
    <main class="py-12 sm:py-16">
        <div class="max-w-6xl mx-auto px-6">
            <nav class="text-sm mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ url('/') }}" class="text-slate-500 hover:text-primary">Beranda</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa-solid fa-chevron-right w-3 h-3 text-slate-400"></i>
                            <a href="{{ route('guest.umkm.show', $product->umkm->id) }}" class="ml-1 text-slate-500 hover:text-primary md:ml-2">{{ $product->umkm->name }}</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fa-solid fa-chevron-right w-3 h-3 text-slate-400"></i>
                            <span class="ml-1 font-semibold text-slate-800 md:ml-2">{{ $product->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="bg-white p-6 sm:p-8 rounded-xl shadow-sm border border-slate-200">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
                    <div>
                        @if($product->image_url)
                        <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-full h-auto aspect-[4/3] object-cover rounded-lg shadow-md">
                        @else
                        <div class="w-full h-auto aspect-[4/3] object-cover rounded-lg shadow-md bg-slate-100 flex items-center justify-center">
                            <i class="fa-solid fa-camera text-5xl text-slate-300"></i>
                        </div>
                        @endif
                    </div>
                    <div class="flex flex-col">
                        {{-- Ditambahkan font-serif --}}
                        <h1 class="font-serif text-4xl font-bold text-slate-800">{{ $product->name }}</h1>
                        <p class="font-sans font-bold text-3xl text-primary mt-3">
                            Rp {{ number_format($product->estimated_price, 0, ',', '.') }}
                        </p>
                        <hr class="my-6 border-slate-200">
                        <div class="space-y-4 text-slate-600">
                            {{-- Ditambahkan font-serif --}}
                            <h3 class="font-serif font-bold text-lg text-slate-800">Deskripsi Produk</h3>
                            <p>{{ $product->description ?? 'Tidak ada deskripsi untuk produk ini.' }}</p>
                        </div>
                        <div class="mt-8 bg-slate-50 rounded-lg p-4 border border-slate-200">
                            <p class="text-xs text-slate-500 mb-2">Diproduksi oleh:</p>
                            <a href="{{ route('guest.umkm.show', $product->umkm->id) }}" class="flex items-center gap-3 group">
                                @if($product->umkm->logo)
                                <img src="{{ asset('storage/' . $product->umkm->logo) }}" alt="Logo {{ $product->umkm->name }}" class="w-10 h-10 rounded-full object-cover">
                                @endif
                                <span class="font-semibold text-slate-800 group-hover:text-primary transition">{{ $product->umkm->name }}</span>
                            </a>
                        </div>
                        <div class="mt-auto pt-8 flex flex-col sm:flex-row gap-4">
                            @if($product->umkm->user && $product->umkm->user->phone_number)
                            @php
                            $phoneNumber = $product->umkm->user->phone_number;
                            if (substr($phoneNumber, 0, 1) === '0') {
                            $formattedNumber = '62' . substr($phoneNumber, 1);
                            } else {
                            $formattedNumber = '62' . preg_replace('/[^0-9]/', '', $phoneNumber);
                            }
                            $message = "Halo, saya tertarik dengan produk '{$product->name}'. Apakah produk ini masih tersedia?";
                            $whatsappUrl = "https://wa.me/{$formattedNumber}?text=" . urlencode($message);
                            @endphp
                            <a href="{{ $whatsappUrl }}" target="_blank" class="w-full text-center bg-primary text-white px-6 py-3 rounded-md font-semibold hover:bg-darkBlue transition-colors flex items-center justify-center gap-2">
                                <i class="fa-brands fa-whatsapp"></i>
                                Pesan via WhatsApp
                            </a>
                            @endif
                            <a href="{{ route('guest.umkm.show', $product->umkm->id) }}" class="w-full text-center bg-white border border-slate-300 text-slate-700 px-6 py-3 rounded-md font-semibold hover:bg-slate-50 transition-colors">
                                Kembali ke UMKM
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- 3. Footer --}}
    <footer class="bg-slate-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Kelurahan Dukuh Sutorejo" class="w-14 h-14 object-contain bg-white p-1 rounded-full">
                        <div>
                            {{-- Ditambahkan font-serif --}}
                            <h3 class="font-serif text-xl font-bold text-white">UMKM Dukuh Sutorejo</h3>
                            <p class="text-slate-400 text-sm">Kota Surabaya, Jawa Timur</p>
                        </div>
                    </div>
                    <p class="text-slate-400 leading-relaxed">
                        Membangun ekonomi lokal melalui digitalisasi UMKM di Kelurahan Dukuh Sutorejo.
                    </p>
                </div>
                <div class="space-y-4">
                    {{-- Ditambahkan font-serif --}}
                    <h3 class="font-serif text-xl font-bold text-white">Hubungi Kami</h3>
                    <div class="space-y-3 text-slate-400">
                        <p><i class="fas fa-map-marker-alt w-5 text-center mr-2 text-primary/70"></i> Jl. Lebansari, No. 1, Surabaya</p>
                        <p><i class="fas fa-phone w-5 text-center mr-2 text-primary/70"></i> (031) 5961234</p>
                        <p><i class="fas fa-envelope w-5 text-center mr-2 text-primary/70"></i> info@sutorejo.id</p>
                    </div>
                </div>
                <div class="space-y-4">
                    {{-- Ditambahkan font-serif --}}
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