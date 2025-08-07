<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $umkm->name }} - UMKM Kelurahan Sutorejo</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    {{-- Tailwind CSS & Konfigurasi Kustom --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#4F46E5',
                        'secondary': '#FCD34D',
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

    {{-- Dependencies: Fonts, Icons, and Alpine.js --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Merriweather:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Custom Styles from Saved Theme --}}
    <style>
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-up {
            animation: slideInUp 0.7s ease-out forwards;
        }
    </style>
</head>

<body class="bg-off-white font-sans text-slate-700">

    {{-- Navbar (Consistent) --}}
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
                        <a href="{{ route('register.step1') }}" class="bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-darkBlue transition-colors">Daftar</a>
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
                    <a href="{{ route('register.step1') }}" class="block w-full text-center bg-primary text-white px-4 py-2 rounded-lg font-semibold hover:bg-darkBlue transition-colors">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Header / Profil Utama UMKM (Restyled) --}}
    <header class="py-16 lg:py-20 bg-gradient-to-r from-primary via-blue-600 to-darkBlue text-white">
        <div class="max-w-4xl mx-auto px-6">
            <nav class="text-sm mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ url('/') }}" class="text-blue-200 hover:text-white">Beranda</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa-solid fa-chevron-right w-3 h-3 text-blue-300"></i>
                            <a href="{{ route('guest.umkm.index') }}" class="ml-1 text-blue-200 hover:text-white md:ml-2">Galeri UMKM</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fa-solid fa-chevron-right w-3 h-3 text-blue-300"></i>
                            <span class="ml-1 font-semibold text-white md:ml-2">{{ $umkm->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="flex flex-col md:flex-row items-center text-center md:text-left gap-8">
                @if($umkm->logo)
                <div class="flex-shrink-0">
                    <img src="{{ asset('storage/' . $umkm->logo) }}" alt="Logo {{ $umkm->name }}" class="w-32 h-32 lg:w-36 lg:h-36 object-cover rounded-full shadow-lg border-4 border-white/20">
                </div>
                @endif
                <div class="flex-grow">
                    <h1 class="font-serif text-4xl lg:text-5xl font-bold text-white">{{ $umkm->name }}</h1>
                    <p class="text-blue-200 mt-2 text-base"><i class="fas fa-map-marker-alt fa-xs mr-1.5"></i>{{ $umkm->address }}</p>
                </div>
            </div>
        </div>
    </header>

    {{-- Detail Section (Description and Info) --}}
    <section class="py-16 -mt-10">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                @if($umkm->description)
                <div x-data="{ expanded: false }">
                    <h2 class="font-serif text-2xl font-bold text-slate-800 mb-4">Tentang Kami</h2>
                    <div x-show="expanded" x-collapse.min.100px class="prose max-w-none text-slate-600 space-y-3">
                        <p>{{ $umkm->description }}</p>
                    </div>
                    <p class="text-slate-600 leading-relaxed" x-show="!expanded">{{ Str::limit($umkm->description, 250) }}</p>
                    @if(strlen($umkm->description) > 250)
                    <button @click="expanded = !expanded" class="text-primary font-semibold text-sm mt-3 hover:underline">
                        <span x-show="!expanded">Baca Selengkapnya <i class="fas fa-chevron-down fa-xs ml-1"></i></span>
                        <span x-show="expanded" style="display: none;">Sembunyikan <i class="fas fa-chevron-up fa-xs ml-1"></i></span>
                    </button>
                    @endif
                </div>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-8 border-t pt-8 border-slate-200">
                    @if($umkm->businessType)
                    <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-xl">
                        <i class="fa-solid fa-tag text-2xl text-primary/70 w-8 text-center"></i>
                        <div>
                            <p class="text-xs text-slate-500">Jenis Usaha</p>
                            <p class="font-semibold text-slate-800">{{ $umkm->businessType->name }}</p>
                        </div>
                    </div>
                    @endif
                    @if($umkm->Maps_link)
                    <a href="{{ $umkm->Maps_link }}" target="_blank" class="flex items-center gap-4 p-4 bg-slate-50 rounded-xl hover:bg-slate-100 transition-colors">
                        <i class="fa-solid fa-map-location-dot text-2xl text-primary/70 w-8 text-center"></i>
                        <div>
                            <p class="text-xs text-slate-500">Lokasi</p>
                            <p class="font-semibold text-slate-800 hover:text-primary transition-colors">Lihat di Google Maps</p>
                        </div>
                    </a>
                    @endif
                    @if($umkm->halal_certified)
                    <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-xl">
                        <i class="fa-solid fa-check-circle text-2xl text-green-600/80 w-8 text-center"></i>
                        <div>
                            <p class="text-xs text-slate-500">Sertifikasi</p>
                            <p class="font-semibold text-slate-800">Tersertifikasi Halal</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Daftar Produk (Restyled Cards) --}}
    <main class="pb-16">
        <div class="max-w-6xl mx-auto px-6">
            <div class="mb-10 text-center">
                <h2 class="font-serif text-3xl font-bold text-slate-800">Galeri Produk</h2>
                <p class="text-slate-500 mt-1">Produk unggulan yang ditawarkan oleh {{ $umkm->name }}.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($umkm->products as $index => $product)
                <div class="umkm-card card-hover bg-white rounded-xl shadow-lg overflow-hidden group animate-slide-up" style="animation-delay: {{ $index * 100 }}ms;">
                    {{-- Card Image (Styled like theme) --}}
                    <div class="aspect-[4/3] bg-gradient-to-br from-blue-400 to-blue-600 relative overflow-hidden">
                        @if($product->image_url)
                        <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                        @else
                        <div class="w-full h-full flex items-center justify-center bg-slate-200">
                            <i class="fas fa-image text-4xl text-slate-400"></i>
                        </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                        <div class="absolute top-3 right-3">
                            <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold text-white">
                                Rp {{ number_format($product->estimated_price, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                    {{-- Card Content (Styled like theme) --}}
                    <div class="p-5">
                        <h3 class="font-bold text-gray-900 text-lg mb-2 truncate group-hover:text-primary transition-colors">
                            {{ $product->name }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2 leading-relaxed h-10">
                            {{ $product->description ?? 'Deskripsi produk belum tersedia.' }}
                        </p>
                        <a href="{{ route('guest.products.show', $product->id) }}" class="block w-full text-center bg-secondary text-gray-900 py-3 rounded-lg font-semibold text-sm hover:bg-yellow-400 transition-all duration-300 transform hover:scale-105 shadow-md">
                            <span class="flex items-center justify-center space-x-2">
                                <i class="fas fa-eye text-xs"></i>
                                <span>Lihat Detail</span>
                                <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform duration-200 text-xs"></i>
                            </span>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-16 bg-slate-50 rounded-xl">
                    <i class="fa-solid fa-box-open text-5xl text-slate-400"></i>
                    <p class="mt-4 text-slate-600 font-semibold text-lg">Belum Ada Produk</p>
                    <p class="text-slate-500">UMKM ini belum menambahkan produk ke dalam galeri.</p>
                </div>
                @endforelse
            </div>
            <div class="mt-16 text-center">
                <a href="{{ route('guest.umkm.index') }}" class="font-semibold text-primary hover:underline transition-all duration-300 group inline-flex items-center gap-2">
                    <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                    <span>Kembali ke Daftar Semua UMKM</span>
                </a>
            </div>
        </div>
    </main>

    {{-- Footer (Consistent) --}}
    <footer class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
                <div class="space-y-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center shadow-md">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo UMKM" class="w-10 h-10 object-contain" />
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">UMKM</h3>
                            <p class="text-gray-400">Dukuh Sutorejo</p>
                        </div>
                    </div>
                    <p class="text-gray-400 leading-relaxed">
                        Website Resmi UMKM Kelurahan Dukuh Sutorejo. Membangun ekonomi lokal melalui digitalisasi UMKM.
                    </p>
                </div>
                <div class="space-y-6">
                    <h3 class="text-2xl font-bold">Hubungi Kami</h3>
                    <div class="space-y-4 text-gray-400">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-secondary mt-1"></i>
                            <p>Jl. Lebansari, No. 1, Dukuh Sutorejo, Mulyorejo, Surabaya, 60113</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone text-secondary"></i>
                            <p>(031) 5961234</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-secondary"></i>
                            <p>info@umkmdukuhsutorejo.store</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-8 text-center">
                <p class="text-gray-400 text-sm">
                    © 2025 Copyright Pemerintahan Kelurahan Dukuh Sutorejo - Design By KKN 47 UPNVJT 2025
                </p>
            </div>
        </div>
    </footer>

</body>

</html>