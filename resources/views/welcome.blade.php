<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM Dukuh Sutorejo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#FCD34D',
                        darkBlue: '#1E40AF'
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes slideInLeft {
            0% {
                opacity: 0;
                transform: translateX(-50px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            0% {
                opacity: 0;
                transform: translateX(50px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-slide-left {
            animation: slideInLeft 0.8s ease-out;
        }

        .animate-slide-right {
            animation: slideInRight 0.8s ease-out;
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .btn-gradient:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 sm:h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Kelurahan Dukuh Sutorejo"
                        class="w-12 h-12 sm:w-16 sm:h-16 object-contain">
                    <div>
                        <h1 class="text-lg sm:text-xl font-bold text-gray-800">UMKM</h1>
                        <p class="text-xs sm:text-sm text-gray-600">Dukuh Sutorejo</p>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-6">
                    <!-- Search Bar -->
                    <div class="relative">
                        <input type="text" placeholder="Cari produk dalam..."
                            class="w-64 px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        <i class="fas fa-search text-gray-400 absolute left-3 top-3"></i>
                    </div>

                    <!-- Navigation Links -->
                    <a href="#beranda" class="text-gray-700 hover:text-primary font-medium">Beranda</a>
                    <a href="#produk" class="text-gray-700 hover:text-primary font-medium">UMKM</a>

                    <!-- masuk dan daftar -->
                    <a href="{{ route('login') }}"
                        class="bg-white text-primary border border-primary px-4 py-2 rounded-lg font-medium hover:bg-primary hover:text-white transition-all duration-300">
                        Masuk
                    </a>

                    <a href="{{ route('register.step1') }}"
                        class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-700 transition-all duration-300">
                        Daftar
                    </a>

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden">
                        <button id="mobile-menu-btn" class="text-gray-600 hover:text-primary">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-menu" class="md:hidden hidden">
                    <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t">
                        <div class="mb-4">
                            <input type="text" placeholder="Cari produk dalam..."
                                class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            <i class="fas fa-search text-gray-400 absolute left-6 top-3"></i>
                        </div>
                        <a href="#beranda" class="block px-3 py-2 text-gray-700 hover:text-primary">Beranda</a>
                        <a href="#produk" class="block px-3 py-2 text-gray-700 hover:text-primary">Produk</a>
                        <div class="pt-4 space-y-2">
                            <button
                                class="w-full bg-white text-primary border border-primary px-4 py-2 rounded-lg font-medium">Masuk</button>
                            <button
                                class="w-full bg-primary text-white px-4 py-2 rounded-lg font-medium">Daftar</button>
                        </div>
                    </div>
                </div>
            </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda"
        class="bg-gradient-to-r from-primary via-blue-600 to-darkBlue text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-black/20 to-transparent"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Text Content -->
                <div class="space-y-6 animate-slide-left">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight">
                        Dukung UMKM<br>
                        Dukuh Sutorejo Untuk<br>
                        <span class="text-secondary">Ekonomi Lokal Berkelanjutan</span>
                    </h1>
                    <p class="text-lg text-blue-100 leading-relaxed max-w-2xl">
                        Temukan beragam produk lokal berkualitas dari para pelaku UMKM di Kelurahan Dukuh Sutorejo.
                        Dari makanan tradisional, minuman hingga kerajinan tangan semuanya tersedia dalam satu platform.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <button
                            class="bg-secondary text-gray-900 px-8 py-4 rounded-xl font-bold text-lg hover:bg-yellow-400 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <a href="#produk" class="text-gray-700 hover:text-primary font-medium">Jelajahi Produk</a>
                            <i class="fas fa-arrow-right"></i>
                            </span>
                        </button>
                        <button
                            class="border-2 border-white/30 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-white hover:text-primary transition-all duration-300">
                            <span class="flex items-center justify-center space-x-2">
                                <i class="fas fa-info-circle"></i>
                                <span>Pelajari Lebih Lanjut</span>
                            </span>
                        </button>
                    </div>
                </div>

                <div class="relative animate-slide-right mb-12">
                    <img src="{{ asset('images/Banner.png') }}" alt="Banner Iklan" class="w-full rounded-xl shadow-xl">
                </div>
            </div>
        </div>
    </section>



    <!-- Partnership Section -->
    <section class="bg-white py-16 lg:py-20">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center space-y-8">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">
                    Mari Bersama Membangun Ekonomi Lokal
                </h2>
                <div class="max-w-4xl mx-auto">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Dukung ekonomi lokal dengan <strong>mendaftarkan</strong> usaha Anda sebagai Mitra UMKM Dukuh
                        Sutorejo dan
                        jadilah bagian dari gerakan pemberdayaan masyarakat melalui platform digital kami. Tambahkan dan
                        kelola produk secara online untuk meningkatkan penjualan dan menjangkau lebih banyak pelanggan.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button
                        class="bg-gradient-to-r from-secondary to-yellow-400 text-gray-900 px-8 py-4 rounded-xl font-bold text-lg hover:from-yellow-400 hover:to-secondary transition-all duration-300 transform hover:scale-105 shadow-xl">
                        <a href="{{ route('register.step1') }}">
                            Daftar Sekarang
                        </a>
                    </button>
                    <button
                        class="border-2 border-primary text-primary px-8 py-4 rounded-xl font-semibold text-lg hover:bg-primary hover:text-white transition-all duration-300">
                        <span class="flex items-center justify-center space-x-2">
                            <i class="fas fa-info-circle"></i>
                            <span>Syarat & Ketentuan</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="produk" class="bg-gradient-to-r from-primary via-blue-600 to-darkBlue py-12 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <p class="text-blue-200 text-lg mb-2">Jelajahi dan Temukan</p>
                <h2 class="text-3xl lg:text-4xl font-bold text-white">UMKM Unggulan</h2>
            </div>



            <div class="flex justify-center mb-12">
                <div
                    class="flex flex-wrap justify-center space-x-1 bg-white/10 backdrop-blur-lg rounded-2xl p-1.5 shadow-2xl border border-white/20">
                    <button onclick="filterProducts('semua', this)"
                        class="filter-btn bg-secondary text-gray-900 px-6 py-3 rounded-xl font-semibold transition-all duration-300 shadow-lg">
                        <span class="flex items-center space-x-2">
                            <i class="fas fa-th-large"></i>
                            <span>Semua</span>
                        </span>
                    </button>

                    @foreach ($categories as $category)
                    <button onclick="filterProducts('{{ Str::slug($category->name) }}', this)"
                        class="filter-btn text-white px-6 py-3 rounded-xl hover:bg-white/20 transition-all duration-300 font-medium">
                        <span class="flex items-center space-x-2">
                            {{-- Dynamic icons based on category name --}}
                            @if (Str::contains(strtolower($category->name), 'makanan'))
                            <i class="fas fa-utensils"></i>
                            @elseif(Str::contains(strtolower($category->name), 'minuman'))
                            <i class="fas fa-glass-water"></i>
                            @else
                            <i class="fas fa-tag"></i> {{-- Default icon --}}
                            @endif
                            <span>{{ $category->name }}</span>
                        </span>
                    </button>
                    @endforeach
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                @forelse ($umkms as $umkm)
                <div data-kategori="{{ Str::slug($umkm->businessType->name) }}"
                    class="produk-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group card-hover w-full max-w-sm mx-auto sm:max-w-none">

                    <div class="aspect-[4/3] bg-gradient-to-br from-blue-400 to-blue-600 relative overflow-hidden">

                        <img src="{{ asset('storage/' . $umkm->logo) }}" alt="{{ $umkm->name }}"
                            class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i
                                class="fas fa-store text-white text-4xl group-hover:scale-110 transition-transform duration-300"></i>
                        </div>
                        <div class="absolute top-3 right-3">
                            <span
                                class="bg-white/20 backdrop-blur-sm px-2 py-1 rounded-full text-xs font-medium text-yellow-400">{{ $umkm->businessType->name }}</span>
                        </div>
                    </div>

                    <div class="p-5">
                        <h3 class="font-bold text-gray-900 text-lg mb-2 line-clamp-1">
                            {{ $umkm->name }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2 leading-relaxed">
                            {{ $umkm->description ?? 'Deskripsi singkat UMKM.' }}
                        </p>

                        <a href="{{ route('guest.umkm.show', $umkm->id) }}"
                            class="block w-full text-center bg-gradient-to-r from-secondary to-yellow-400 text-gray-900 py-3 rounded-lg font-semibold text-sm hover:from-yellow-400 hover:to-secondary transition-all duration-300 transform hover:scale-105 shadow-md group">
                            <span class="flex items-center justify-center space-x-2">
                                <i class="fas fa-eye text-xs"></i>
                                <span>Lihat Detail</span>
                                <i
                                    class="fas fa-arrow-right group-hover:translate-x-1 transition-transform duration-200 text-xs"></i>
                            </span>
                        </a>
                    </div>
                </div>


                @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-white text-lg">Belum ada UMKM yang ditampilkan.</p>
                </div>
                @endforelse
            </div>

            <div class="text-center">
                {{-- This button now links to the full UMKM page --}}
                <a href="{{ route('guest.umkm.index') }}"
                    class="inline-block text-white hover:text-secondary text-lg font-semibold transition-all duration-300 transform hover:scale-105 px-8 py-3 rounded-xl hover:bg-white/10 backdrop-blur-sm border border-white/20">
                    <span class="flex items-center justify-center space-x-2">
                        <span>Lihat Selengkapnya</span>
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
            </div>
    </section>

    <!-- Support Section -->
    <section class="bg-gradient-to-br from-gray-50 via-white to-gray-100 py-16 lg:py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-50/30 to-purple-50/30"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Supported By :</h3>
            </div>

            <div class="flex flex-wrap justify-center items-center gap-8 max-w-6xl mx-auto">
                <!-- Kelurahan -->
                <div class="group flex-shrink-0">
                    <div
                        class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-gray-100">
                        <div class="flex flex-col items-center text-center">
                            <div class="mb-4">
                                <img src="{{ asset('images/logo_dusut.png') }}"
                                    alt="Kelurahan Dukuh Sutorejo Logo" class="w-16 h-16 object-contain" />
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-800 leading-tight">Kelurahan</h4>
                                <p class="text-xs text-gray-600">Dukuh Sutorejo</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- UPN Veteran Jatim -->
                <div class="group flex-shrink-0">
                    <div
                        class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-gray-100">
                        <div class="flex flex-col items-center text-center">
                            <div class="mb-4">
                                <img src="{{ asset('images/LOGO UPNVJT.png') }}" alt="UPN Veteran Jatim Logo"
                                    class="w-16 h-16 object-contain" />
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-800 leading-tight">UPN</h4>
                                <p class="text-xs text-gray-600">Kampus Bela Negara</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- LPPM -->
                <div class="group flex-shrink-0">
                    <div
                        class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-gray-100">
                        <div class="flex flex-col items-center text-center">
                            <div class="mb-4">
                                <img src="{{ asset('images/lppm 1.png') }}" alt="LPPM Logo" class="w-16 h-16 object-contain" />
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-800 leading-tight">LPPM</h4>
                                <p class="text-xs text-gray-600">Research Center</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Diktisaintek Berdampak -->
                <div class="group flex-shrink-0">
                    <div
                        class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-gray-100">
                        <div class="flex flex-col items-center text-center">
                            <div class="mb-4">
                                <img src="{{ asset('images/diktisaintek 1.png') }}"
                                    alt="Diktisaintek Berdampak Logo" class="w-16 h-16 object-contain" />
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-800 leading-tight">Diktisaintek</h4>
                                <p class="text-xs text-gray-600">Berdampak</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Logo ke-5 (sesuaikan dengan logo yang Anda miliki) -->
                <div class="group flex-shrink-0">
                    <div
                        class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-gray-100">
                        <div class="flex flex-col items-center text-center">
                            <div class="mb-4">
                                <img src="{{ asset('images/logo kkn fix.png') }}" alt="Partner Logo" class="w-16 h-16 object-contain" />
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-800 leading-tight">Kelompok</h4>
                                <p class="text-xs text-gray-600">KKN 47</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-16">
                <p class="text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Bersama mitra strategis, kami berkomitmen untuk memberikan layanan terbaik
                    dan berdampak positif bagi masyarakat Indonesia.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
                <!-- Logo and Description -->
                <div class="space-y-6">
                    <div class="flex items-center space-x-3">
                        <div class="bg-white p-3 rounded-xl shadow-md">
                            <div
                                class="w-12 h-12 sm:w-16 sm:h-16 bg-blue-100 rounded-full flex items-center justify-center">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo UMKM"
                                    class="w-12 h-12 object-contain" />
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">UMKM</h3>
                            <p class="text-gray-400">Dukuh Sutorejo</p>
                        </div>
                    </div>
                    <p class="text-gray-400 leading-relaxed">
                        Website Resmi UMKM Kelurahan Dukuh Sutorejo, Kecamatan Mulyorejo, Kota Surabaya, Provinsi
                        Jawa Timur, Indonesia. Membangun ekonomi lokal melalui digitalisasi UMKM.
                    </p>
                </div>

                <!-- Contact Information -->
                <div class="space-y-6">
                    <h3 class="text-2xl font-bold">Hubungi Kami</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-primary mt-1"></i>
                            <div class="text-gray-400">
                                <p>Jl. Lebansari, No. 1, Kelurahan Dukuh Sutorejo,</p>
                                <p>Kecamatan Mulyorejo, Kota Surabaya,</p>
                                <p>Provinsi Jawa Timur Kode Pos 60113</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone text-primary"></i>
                            <p class="text-gray-400">(031) 5961234</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-primary"></i>
                            <p class="text-gray-400">info@umkmdukuhsutorejo.id</p>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="flex space-x-4">
                        <a href="https://pemerintahan.surabaya.go.id/kelurahan_dukuh_sutorejo/"
                            class="bg-gray-800 p-3 rounded-xl hover:bg-primary transition-all duration-300 transform hover:scale-110">
                            <i class="fas fa-globe"></i>
                        </a>
                        <a href="https://www.instagram.com/kelurahan_dukuh_sutorejo/"
                            class="bg-gray-800 p-3 rounded-xl hover:bg-gradient-to-r hover:from-purple-500 hover:to-pink-500 transition-all duration-300 transform hover:scale-110">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/6285117582505"
                            class="bg-gray-800 p-3 rounded-xl hover:bg-green-500 transition-all duration-300 transform hover:scale-110">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Maps Location -->
            <div class="mb-12">
                <h3 class="text-xl font-bold mb-6 text-center">Lokasi Kelurahan Dukuh Sutorejo</h3>
                <div class="rounded-2xl overflow-hidden shadow-2xl">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.432043567415!2d112.80078537428835!3d-7.416518273185834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fba4b9c11533%3A0x7e2616a7b3c7fcd!2sDukuh%20Sutorejo%2C%20Kec.%20Mulyorejo%2C%20Surabaya%2C%20Jawa%20Timur!5e0!3m2!1sen!2sid!4v1721810352734!5m2!1sen!2sid"
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="w-full">
                    </iframe>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-700 pt-8 text-center">
                <p class="text-gray-400 text-sm leading-relaxed">
                    © 2025 Copyright Pemerintahan Kelurahan Dukuh Sutorejo - Design By Kelompok KKN 47 UPN Veteran
                    Jawa Timur 2025
                </p>
                <p class="text-gray-500 text-xs mt-2">
                    Dibuat dengan ❤️ untuk memajukan UMKM lokal
                </p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    const isHidden = mobileMenu.classList.contains('hidden');

                    if (isHidden) {
                        mobileMenu.classList.remove('hidden');
                        this.innerHTML = '<i class="fas fa-times text-xl"></i>';
                    } else {
                        mobileMenu.classList.add('hidden');
                        this.innerHTML = '<i class="fas fa-bars text-xl"></i>';
                    }
                });

                // Close mobile menu when clicking on links
                const mobileMenuLinks = mobileMenu.querySelectorAll('a');
                mobileMenuLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.add('hidden');
                        mobileMenuBtn.innerHTML = '<i class="fas fa-bars text-xl"></i>';
                    });
                });
            }
        });

        // Filter products function
        function filterProducts(category) {
            const cards = document.querySelectorAll('.product-card');
            const buttons = document.querySelectorAll('.filter-btn');

            // Animate cards out
            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'scale(0.8)';
            });

            setTimeout(() => {
                cards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    if (category === 'semua' || cardCategory === category) {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'scale(1)';
                        }, 50);
                    } else {
                        card.style.display = 'none';
                    }
                });
            }, 200);

            // Update active button
            buttons.forEach(btn => {
                btn.classList.remove('bg-secondary', 'text-gray-900');
                btn.classList.add('text-white');
            });

            const activeBtn = event.target.closest('.filter-btn');
            if (activeBtn) {
                activeBtn.classList.add('bg-secondary', 'text-gray-900');
                activeBtn.classList.remove('text-white');
            }
        }

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 100) {
                navbar.classList.add('shadow-xl');
                navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
                navbar.style.backdropFilter = 'blur(10px)';
            } else {
                navbar.classList.remove('shadow-xl');
                navbar.style.backgroundColor = 'white';
                navbar.style.backdropFilter = 'none';
            }
        });

        // View more functionality
        document.getElementById('view-more-btn').addEventListener('click', function() {
            this.innerHTML = `
                <span class="flex items-center justify-center space-x-2">
                    <i class="fas fa-spinner fa-spin"></i>
                    <span>Memuat...</span>
                </span>
            `;

            setTimeout(() => {
                // Here you would typically load more products
                this.innerHTML = `
                    <span class="flex items-center justify-center space-x-2">
                        <span>Semua produk telah ditampilkan</span>
                        <i class="fas fa-check"></i>
                    </span>
                `;
                this.disabled = true;
                this.classList.add('opacity-50', 'cursor-not-allowed');
            }, 2000);
        });

        // Initialize on page load
        window.addEventListener('load', () => {
            // Add entrance animations to cards
            const elements = document.querySelectorAll('.product-card');
            elements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                setTimeout(() => {
                    el.style.transition = 'all 0.6s ease';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });

        // Search functionality
        const searchInputs = document.querySelectorAll('input[type="text"]');
        searchInputs.forEach(input => {
            input.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const cards = document.querySelectorAll('.product-card');

                cards.forEach(card => {
                    const title = card.querySelector('h3').textContent.toLowerCase();
                    const description = card.querySelector('p').textContent.toLowerCase();

                    if (title.includes(searchTerm) || description.includes(searchTerm) ||
                        searchTerm === '') {
                        card.style.display = 'block';
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
    <script>
        // Data produk untuk demo
        const productsData = {
            'kopi': {
                name: 'Kopi Nusantara',
                category: 'minuman',
                price: 'Rp 25.000',
                description: 'Kopi lokal premium dengan cita rasa autentik Indonesia. Dipetik dari kebun kopi terbaik dengan proses yang terjaga kualitasnya.',
                image: 'fas fa-coffee',
                gradient: 'from-blue-400 to-blue-600',
                owner: 'Warung Kopi Sutorejo',
                contact: '081234567890',
                address: 'Jl. Sutorejo Indah No. 15',
                features: ['Premium Quality', 'Organik', 'Fresh Roasted']
            },
            'teh': {
                name: 'Teh Herbal',
                category: 'minuman',
                price: 'Rp 15.000',
                description: 'Teh herbal alami dengan campuran rempah-rempah pilihan yang menyehatkan tubuh.',
                image: 'fas fa-leaf',
                gradient: 'from-green-400 to-green-600',
                owner: 'Toko Herbal Sehat',
                contact: '081234567891',
                address: 'Jl. Dukuh Sutorejo No. 20',
                features: ['100% Natural', 'Tanpa Pengawet', 'Kaya Antioksidan']
            },
            'nasi-gudeg': {
                name: 'Nasi Gudeg',
                category: 'makanan',
                price: 'Rp 18.000',
                description: 'Gudeg khas Jogja dengan cita rasa manis dan gurih yang autentik, dilengkapi dengan ayam dan telur.',
                image: 'fas fa-utensils',
                gradient: 'from-orange-400 to-orange-600',
                owner: 'Gudeg Bu Sari',
                contact: '081234567892',
                address: 'Jl. Sutorejo Tengah No. 8',
                features: ['Resep Turun Temurun', 'Bumbu Alami', 'Porsi Besar']
            }
        };

        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    const isHidden = mobileMenu.classList.contains('hidden');

                    if (isHidden) {
                        mobileMenu.classList.remove('hidden');
                        this.innerHTML = '<i class="fas fa-times text-xl"></i>';
                    } else {
                        mobileMenu.classList.add('hidden');
                        this.innerHTML = '<i class="fas fa-bars text-xl"></i>';
                    }
                });

                // Close mobile menu when clicking on links
                const mobileMenuLinks = mobileMenu.querySelectorAll('a');
                mobileMenuLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.add('hidden');
                        mobileMenuBtn.innerHTML = '<i class="fas fa-bars text-xl"></i>';
                    });
                });
            }

            // Initialize product cards with improved animations
            initializeProductCards();

            // Initialize search functionality
            initializeSearch();
        });

        // Initialize Product Cards with Enhanced Animations
        function initializeProductCards() {
            const cards = document.querySelectorAll('.produk-card, .product-card');

            cards.forEach((card, index) => {
                // Initial state
                card.style.opacity = '0';
                card.style.transform = 'translateY(50px) scale(0.9)';

                // Enhanced hover effects
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-12px) scale(1.03)';
                    this.style.boxShadow = '0 25px 50px rgba(0, 0, 0, 0.15)';

                    // Animate icon
                    const icon = this.querySelector('i.fas');
                    if (icon) {
                        icon.style.transform = 'scale(1.2) rotate(5deg)';
                        icon.style.transition = 'all 0.3s ease';
                    }
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                    this.style.boxShadow = '';

                    // Reset icon
                    const icon = this.querySelector('i.fas');
                    if (icon) {
                        icon.style.transform = 'scale(1) rotate(0deg)';
                    }
                });

                // Staggered entrance animation
                setTimeout(() => {
                    card.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0) scale(1)';
                }, index * 150);
            });
        }

        // Enhanced Filter Products Function
        function filterProducts(category) {
            const cards = document.querySelectorAll('.produk-card, .product-card');
            const buttons = document.querySelectorAll('.filter-btn');

            // Add loading state
            const loadingOverlay = createLoadingOverlay();

            // Animate cards out with stagger
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.transition = 'all 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(-30px) scale(0.8)';
                }, index * 50);
            });

            setTimeout(() => {
                let visibleCount = 0;

                cards.forEach((card, index) => {
                    const cardCategory = card.getAttribute('data-kategori') || card.getAttribute(
                        'data-category');

                    if (category === 'semua' || cardCategory === category) {
                        card.style.display = 'block';

                        setTimeout(() => {
                            card.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0) scale(1)';
                        }, visibleCount * 100 + 100);

                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Remove loading overlay
                setTimeout(() => {
                    loadingOverlay.remove();
                }, 300);

            }, 500);

            // Update active button with animation
            buttons.forEach(btn => {
                btn.style.transition = 'all 0.3s ease';
                btn.classList.remove('bg-secondary', 'text-gray-900');
                btn.classList.add('text-white');
            });

            const activeBtn = event?.target?.closest('.filter-btn');
            if (activeBtn) {
                activeBtn.classList.add('bg-secondary', 'text-gray-900');
                activeBtn.classList.remove('text-white');
                activeBtn.style.transform = 'scale(1.05)';

                setTimeout(() => {
                    activeBtn.style.transform = 'scale(1)';
                }, 200);
            }
        }

        // Show Detail Product Function
        function showDetail(productId) {
            const product = productsData[productId];

            if (!product) {
                showNotification('Produk tidak ditemukan!', 'error');
                return;
            }

            // Create detail modal
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm';
            modal.style.opacity = '0';

            modal.innerHTML = `
            <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden transform scale-95">
                <!-- Header -->
                <div class="bg-gradient-to-r ${product.gradient} text-white p-6 relative">
                    <button onclick="closeProductDetail()" class="absolute top-4 right-4 w-8 h-8 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all duration-200">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center">
                            <i class="${product.image} text-2xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold">${product.name}</h2>
                            <p class="text-white/80 capitalize">${product.category}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="p-6 overflow-y-auto max-h-[60vh]">
                    <!-- Price -->
                    <div class="mb-6">
                        <div class="inline-block bg-gradient-to-r from-green-100 to-green-200 text-green-800 px-4 py-2 rounded-full font-bold text-lg">
                            ${product.price}
                        </div>
                    </div>
                    
                    <!-- Description -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Deskripsi Produk</h3>
                        <p class="text-gray-600 leading-relaxed">${product.description}</p>
                    </div>
                    
                    <!-- Features -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Keunggulan</h3>
                        <div class="flex flex-wrap gap-2">
                            ${product.features.map(feature => `
                                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                                        <i class="fas fa-check mr-1"></i>${feature}
                                                    </span>
                                                `).join('')}
                        </div>
                    </div>
                    
                    <!-- Seller Info -->
                    <div class="bg-gray-50 rounded-xl p-4 mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Informasi Penjual</h3>
                        <div class="space-y-2">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-store text-gray-500"></i>
                                <span class="text-gray-700">${product.owner}</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-phone text-gray-500"></i>
                                <span class="text-gray-700">${product.contact}</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-map-marker-alt text-gray-500"></i>
                                <span class="text-gray-700">${product.address}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <button onclick="contactSeller('${product.contact}')" class="flex-1 bg-green-600 hover:bg-green-700 text-white py-3 px-4 rounded-xl font-semibold transition-all duration-200 transform hover:scale-105">
                            <i class="fab fa-whatsapp mr-2"></i>
                            Hubungi Penjual
                        </button>
                        <button onclick="shareProduct('${productId}')" class="bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-xl font-semibold transition-all duration-200">
                            <i class="fas fa-share-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;

            document.body.appendChild(modal);
            document.body.style.overflow = 'hidden';

            // Animate modal in
            setTimeout(() => {
                modal.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                modal.style.opacity = '1';
                modal.querySelector('.bg-white').style.transform = 'scale(1)';
            }, 50);

            // Close on backdrop click
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeProductDetail();
                }
            });
        }

        // Close Product Detail
        function closeProductDetail() {
            const modal = document.querySelector('.fixed.inset-0.z-50');
            if (modal) {
                modal.style.opacity = '0';
                modal.querySelector('.bg-white').style.transform = 'scale(0.95)';

                setTimeout(() => {
                    modal.remove();
                    document.body.style.overflow = 'auto';
                }, 300);
            }
        }

        // Contact Seller Function
        function contactSeller(phoneNumber) {
            const message = encodeURIComponent(
                'Halo, saya tertarik dengan produk Anda. Bisa minta informasi lebih lanjut?');
            const whatsappUrl = `https://wa.me/62${phoneNumber.replace(/^0/, '')}?text=${message}`;
            window.open(whatsappUrl, '_blank');
        }

        // Share Product Function
        function shareProduct(productId) {
            const product = productsData[productId];

            if (navigator.share) {
                navigator.share({
                    title: product.name,
                    text: product.description,
                    url: window.location.href
                });
            } else {
                // Fallback: copy to clipboard
                const textToCopy = `${product.name} - ${product.description}\n${window.location.href}`;
                navigator.clipboard.writeText(textToCopy).then(() => {
                    showNotification('Link produk berhasil disalin!', 'success');
                });
            }
        }

        // Enhanced Search Functionality
        function initializeSearch() {
            const searchInputs = document.querySelectorAll('input[type="text"]');
            let searchTimeout;

            searchInputs.forEach(input => {
                input.addEventListener('input', function() {
                    clearTimeout(searchTimeout);

                    searchTimeout = setTimeout(() => {
                        const searchTerm = this.value.toLowerCase().trim();
                        performSearch(searchTerm);
                    }, 300); // Debounce search
                });
            });
        }

        function performSearch(searchTerm) {
            const cards = document.querySelectorAll('.produk-card, .product-card');
            let visibleCount = 0;

            cards.forEach((card, index) => {
                const title = card.querySelector('h3')?.textContent.toLowerCase() || '';
                const description = card.querySelector('p')?.textContent.toLowerCase() || '';

                if (searchTerm === '' || title.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'block';

                    setTimeout(() => {
                        card.style.transition = 'all 0.4s ease-out';
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0) scale(1)';
                    }, visibleCount * 50);

                    visibleCount++;
                } else {
                    card.style.transition = 'all 0.3s ease-out';
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(-20px) scale(0.9)';

                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });

            // Show no results message
            if (visibleCount === 0 && searchTerm !== '') {
                showNoResultsMessage();
            } else {
                hideNoResultsMessage();
            }
        }

        // Utility Functions
        function createLoadingOverlay() {
            const overlay = document.createElement('div');
            overlay.className = 'fixed inset-0 z-40 flex items-center justify-center bg-white/80 backdrop-blur-sm';
            overlay.innerHTML = `
            <div class="text-center">
                <div class="w-12 h-12 border-4 border-blue-600 border-t-transparent rounded-full animate-spin mx-auto mb-4"></div>
                <p class="text-gray-600 font-medium">Memfilter produk...</p>
            </div>
        `;
            document.body.appendChild(overlay);
            return overlay;
        }

        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 p-4 rounded-xl shadow-lg transform translate-x-full transition-all duration-300 ${
            type === 'success' ? 'bg-green-500 text-white' :
            type === 'error' ? 'bg-red-500 text-white' :
            'bg-blue-500 text-white'
        }`;

            notification.innerHTML = `
            <div class="flex items-center space-x-3">
                <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle'}"></i>
                <span>${message}</span>
            </div>
        `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 100);

            setTimeout(() => {
                notification.style.transform = 'translateX(full)';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }

        function showNoResultsMessage() {
            hideNoResultsMessage(); // Remove existing message

            const container = document.querySelector('#produk .grid') || document.querySelector('.grid');
            if (container) {
                const noResults = document.createElement('div');
                noResults.id = 'no-results';
                noResults.className = 'col-span-full text-center py-12';
                noResults.innerHTML = `
                <div class="text-gray-400 mb-4">
                    <i class="fas fa-search text-6xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">Produk Tidak Ditemukan</h3>
                <p class="text-gray-500">Coba gunakan kata kunci yang berbeda</p>
            `;
                container.appendChild(noResults);
            }
        }

        function hideNoResultsMessage() {
            const noResults = document.getElementById('no-results');
            if (noResults) {
                noResults.remove();
            }
        }

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Enhanced Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 100) {
                navbar.style.transition = 'all 0.3s ease';
                navbar.classList.add('shadow-xl');
                navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
                navbar.style.backdropFilter = 'blur(10px)';
            } else {
                navbar.classList.remove('shadow-xl');
                navbar.style.backgroundColor = 'white';
                navbar.style.backdropFilter = 'none';
            }
        });

        // Enhanced View More functionality
        document.addEventListener('DOMContentLoaded', function() {
            const viewMoreBtn = document.getElementById('view-more-btn');
            if (viewMoreBtn) {
                viewMoreBtn.addEventListener('click', function() {
                    this.innerHTML = `
                    <span class="flex items-center justify-center space-x-2">
                        <i class="fas fa-spinner fa-spin"></i>
                        <span>Memuat produk...</span>
                    </span>
                `;
                    this.disabled = true;

                    // Simulate loading more products
                    setTimeout(() => {
                        // Add more product cards here in real implementation
                        this.innerHTML = `
                        <span class="flex items-center justify-center space-x-2">
                            <span>Semua produk telah ditampilkan</span>
                            <i class="fas fa-check-circle text-green-500"></i>
                        </span>
                    `;
                        this.classList.add('opacity-75', 'cursor-not-allowed');
                    }, 2000);
                });
            }
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // ESC to close modal
            if (e.key === 'Escape') {
                closeProductDetail();
            }

            // Ctrl/Cmd + K to focus search
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                const searchInput = document.querySelector('input[type="text"]');
                if (searchInput) {
                    searchInput.focus();
                }
            }
        });
    </script>
</body>

</html>