<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar UMKM - Marketplace Lokal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4f46e5',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'slide-up': 'slideUp 0.8s ease-out',
                        'slide-down': 'slideDown 0.8s ease-out',
                        'bounce-gentle': 'bounceGentle 3s infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s infinite',
                        'gradient-x': 'gradient-x 15s ease infinite',
                        'shimmer': 'shimmer 2s linear infinite',
                        'scale-up': 'scaleUp 0.3s ease-out',
                        'wiggle': 'wiggle 1s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(20px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        slideUp: {
                            '0%': {
                                transform: 'translateY(50px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            }
                        },
                        slideDown: {
                            '0%': {
                                transform: 'translateY(-30px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            }
                        },
                        bounceGentle: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            }
                        },
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-20px)'
                            }
                        },
                        'gradient-x': {
                            '0%, 100%': {
                                'background-size': '200% 200%',
                                'background-position': 'left center'
                            },
                            '50%': {
                                'background-size': '200% 200%',
                                'background-position': 'right center'
                            }
                        },
                        shimmer: {
                            '0%': {
                                transform: 'translateX(-100%)'
                            },
                            '100%': {
                                transform: 'translateX(100%)'
                            }
                        },
                        scaleUp: {
                            '0%': {
                                transform: 'scale(0.95)'
                            },
                            '100%': {
                                transform: 'scale(1)'
                            }
                        },
                        wiggle: {
                            '0%, 100%': {
                                transform: 'rotate(-3deg)'
                            },
                            '50%': {
                                transform: 'rotate(3deg)'
                            }
                        }
                    },
                    backgroundImage: {
                        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                        'gradient-conic': 'conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 min-h-screen bg-pattern relative">
    <div class="floating-shapes"></div>

    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 sm:h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-blue-100 rounded-full flex items-center justify-center">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Anda" class="w-8 h-8 sm:w-10 sm:h-10 object-contain">
                    </div>
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

                    <a href="{{ route('register') }}"
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
            <!-- Search and Navigation -->
            <div class="flex items-center space-x-6">

                <div class="flex items-center space-x-6">
                    <a href="#" class="text-gray-700 hover:text-primary font-medium">Beranda</a>
                    <a href="#UMKM" class="text-gray-700 hover:text-primary font-medium">UMKM</a>
                    <a href="{{ route('login') }}">
                        <button
                            class="bg-gray-800 text-white px-6 py-2 rounded-lg font-medium hover:bg-gray-700 transition">Masuk</button>
                    </a>
                    <a href="{{ route('register.step1') }}">
                        <button
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-600 transition">Daftar</button>
                    </a>

                </div>
            </div>
        </div>
        </div>
    </nav>

    <!-- Enhanced Hero Section -->
    <section class="py-16 overflow-hidden relative">
        <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
            <!-- Main Heading -->
            <div class="animate-slide-up">
                <div class="inline-flex items-center px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full border border-indigo-200 mb-6 animate-bounce-gentle">
                    <i class="fas fa-star text-yellow-500 mr-2"></i>
                    <span class="text-sm font-medium text-gray-700">Platform UMKM Terpercaya</span>
                    <i class="fas fa-star text-yellow-500 ml-2"></i>
                </div>

                <h2 class="text-5xl md:text-7xl font-bold text-gray-800 mb-6 leading-tight">
                    Temukan UMKM
                    <span class="block bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent animate-gradient-x">
                        Terbaik
                    </span>
                </h2>
                <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Dukung ekonomi lokal dengan berbelanja dari UMKM pilihan yang menawarkan produk berkualitas dan layanan terpercaya
                <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                    Dukung ekonomi lokal dengan berbelanja dari UMKM pilihan yang menawarkan produk berkualitas dan
                    layanan terpercaya
                </p>
            </div>

            <!-- Enhanced Search and Filter Bar -->
            <div class="max-w-4xl mx-auto mb-16 animate-fade-in">
                <div class="glass-effect rounded-3xl shadow-2xl p-8 border border-white/30 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-purple-500/10"></div>
                    <div class="relative z-10">
                        <div class="flex flex-col lg:flex-row gap-4">
                            <div class="flex-1 relative group">
                                <input type="text"
                                    placeholder="Cari UMKM berdasarkan nama atau produk..."
                                    class="w-full px-6 py-4 pl-14 bg-white/90 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-300 text-lg shadow-lg group-hover:shadow-xl"
                                    id="searchInput">
                                <div class="absolute left-5 top-1/2 transform -translate-y-1/2">
                                    <i class="fas fa-search text-indigo-500 text-lg animate-pulse"></i>
                                </div>
                            </div>
                            <select class="px-6 py-4 bg-white/90 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-300 text-lg shadow-lg hover:shadow-xl min-w-[200px]" id="categoryFilter">
                                <option value="">🏪 Semua Kategori</option>
                                @foreach ($categories as $category)
                                <option value="{{ strtolower($category->slug ?? Str::slug($category->name)) }}">
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Search and Filter Bar -->
                        <div class="max-w-2xl mx-auto mb-12 animate-fade-in">
                            <div class="bg-white rounded-2xl shadow-lg p-6 border border-indigo-100">
                                <div class="flex flex-col md:flex-row gap-4">
                                    <div
                                        class="flex space-x-1 bg-white/10 backdrop-blur-lg rounded-2xl p-1.5 shadow-2xl border border-white/20">
                                        <button onclick="filterProducts('semua')"
                                            class="filter-btn bg-secondary text-gray-900 px-6 py-3 rounded-xl font-semibold transition-all duration-300 shadow-lg">
                                            <span class="flex items-center space-x-2">
                                                <i class="fas fa-th-large"></i>
                                                <span>Semua</span>
                                            </span>
                                        </button>
                                        <button onclick="filterProducts('makanan')"
                                            class="filter-btn text-white px-6 py-3 rounded-xl hover:bg-white/20 transition-all duration-300 font-medium">
                                            <span class="flex items-center space-x-2">
                                                <i class="fas fa-utensils"></i>
                                                <span>Makanan</span>
                                            </span>
                                        </button>
                                        <button onclick="filterProducts('minuman')"
                                            class="filter-btn text-white px-6 py-3 rounded-xl hover:bg-white/20 transition-all duration-300 font-medium">
                                            <span class="flex items-center space-x-2">
                                                <i class="fas fa-glass-water"></i>
                                                <span>Minuman</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced Statistics -->
                        <div class="grid grid-cols-2 gap-6 mb-16 max-w-2xl mx-auto">
                            <div class="glass-effect rounded-3xl p-8 border border-white/30 hover:bg-white/20 transition-all duration-500 transform hover:scale-105 group">
                                <div class="text-4xl font-bold bg-gradient-to-r from-indigo-600 to-blue-600 bg-clip-text text-transparent mb-3 group-hover:animate-bounce" id="totalUMKM">
                                    <!-- Statistics -->
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
                                        <div
                                            class="bg-white/60 backdrop-blur-sm rounded-xl p-6 border border-indigo-100 hover:bg-white/80 transition-all">
                                            <div class="text-3xl font-bold text-indigo-600 mb-2" id="totalUMKM">
                                                {{ number_format($totalUMKM) }}
                                            </div>
                                            <div class="text-sm text-gray-600 font-medium flex items-center justify-center">
                                                <i class="fas fa-store mr-2 text-indigo-500"></i>
                                                UMKM Terdaftar
                                            </div>
                                        </div>
                                        <div class="glass-effect rounded-3xl p-8 border border-white/30 hover:bg-white/20 transition-all duration-500 transform hover:scale-105 group">
                                            <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent mb-3 group-hover:animate-bounce">
                                                <div
                                                    class="bg-white/60 backdrop-blur-sm rounded-xl p-6 border border-purple-100 hover:bg-white/80 transition-all">
                                                    <div class="text-3xl font-bold text-purple-600 mb-2">
                                                        {{ number_format($totalKategori) }}
                                                    </div>
                                                    <div class="text-sm text-gray-600 font-medium flex items-center justify-center">
                                                        <i class="fas fa-tags mr-2 text-purple-500"></i>
                                                        Kategori Produk
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    </section>

    <!-- Enhanced UMKM Grid Section -->
    <section class="pb-20">
        <div class="max-w-7xl mx-auto px-4">
            <div id="umkmGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($umkms as $umkm)
                <div class="umkm-card card-hover animate-fade-in" data-category="{{ strtolower($umkm->businessType->name ?? 'lainnya') }}">
                    <div class="p-8 relative z-10">
                        <!-- Card Header -->
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-store text-white"></i>
                            </div>
                            <span class="bg-gradient-to-r from-indigo-100 to-purple-100 text-indigo-800 text-xs font-semibold px-3 py-1.5 rounded-full border border-indigo-200">
                                {{ $umkm->businessType->name ?? 'Lainnya' }}
                            </span>
                        </div>

                        <!-- Card Content -->
                        <h3 class="text-xl font-bold text-gray-800 mb-3 hover:text-indigo-600 transition-colors">{{ $umkm->name }}</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">{{ Str::limit($umkm->description, 100) }}</p>

                        <!-- Location -->
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                            <span>{{ $umkm->address }}</span>
                        </div>

                        <!-- CTA Button -->
                        <a href="{{ route('guest.umkm.show', $umkm->id) }}"
                            class="inline-flex items-center justify-center w-full px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <i class="fas fa-eye mr-2"></i>
                            Lihat Detail
                            <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
                <div class="umkm-card" data-category="{{ strtolower($umkm->businessType->name ?? 'lainnya') }}">
                    <div class="p-6">
                        <h3 class="text-xl font-bold">{{ $umkm->name }}</h3>
                        <p class="text-sm text-gray-600">{{ Str::limit($umkm->description, 100) }}</p>
                        <p class="text-xs mt-2 text-gray-500">📍 {{ $umkm->address }}</p>
                        <span
                            class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full mt-2 inline-block">
                            {{ $umkm->businessType->name ?? 'Lainnya' }}
                        </span>
                        <a href="{{ route('guest.umkm.show', $umkm->id) }}"
                            class="mt-4 block text-indigo-600 hover:underline">Lihat Detail</a>
                    </div>
                </div>
                @endforeach

                <!-- Enhanced Empty State -->
                <div id="emptyState" class="col-span-full text-center py-20 hidden">
                    <div class="max-w-md mx-auto">
                        <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center">
                            <i class="fas fa-search text-4xl text-gray-400 animate-pulse"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Tidak ada UMKM ditemukan</h3>
                        <p class="text-gray-600 mb-8 leading-relaxed">Coba ubah kata kunci pencarian atau filter kategori untuk menemukan UMKM yang sesuai</p>
                        <button id="resetSearch" class="px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <i class="fas fa-refresh mr-2"></i>
                            <div class="text-6xl mb-4">🔍</div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Tidak ada UMKM ditemukan</h3>
                            <p class="text-gray-600 mb-6">Coba ubah kata kunci pencarian atau filter kategori</p>
                            <button id="resetSearch"
                                class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                                Reset Pencarian
                            </button>
                    </div>
                </div>
            </div>

            <!-- Enhanced Load More Button -->
            <div class="text-center mt-16">
                <button class="px-10 py-4 glass-effect text-indigo-600 border-2 border-indigo-600/30 rounded-2xl hover:bg-indigo-600 hover:text-white transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:scale-105 font-medium text-lg">
                    <i class="fas fa-plus mr-2"></i>
                    <!-- Load More Button -->
                    <div class="text-center mt-12">
                        <button
                            class="px-8 py-3 bg-white text-indigo-600 border-2 border-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                            Muat Lebih Banyak UMKM
                            <i class="fas fa-arrow-down ml-2 animate-bounce"></i>
                        </button>
                    </div>
            </div>
    </section>

    <!-- Enhanced Footer -->
    <footer class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
                <!-- Logo and Description -->
                <div class="space-y-6">
                    <div class="flex items-center space-x-3">
                        <div class="bg-white p-3 rounded-xl shadow-md">
                            <div class="w-12 h-12 sm:w-16 sm:h-16 bg-blue-100 rounded-full flex items-center justify-center">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo Anda" class="w-8 h-8 sm:w-10 sm:h-10 object-contain">
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
                        Website Resmi UMKM Kelurahan Dukuh Sutorejo, Kecamatan Mulyorejo, Kota Surabaya, Provinsi Jawa
                        Timur, Indonesia
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
                <div class="border-t border-gray-800 mt-16 pt-8 text-center">
                    <p class="text-gray-400">
                        © 2025 Copyright Pemerintahan Kelurahan Dukuh Sutorejo - Design By Kelompok KKN 47 UPN Veteran Jawa
                        Timur 2025
                    </p>
                </div>
            </div>
    </footer>

    <!-- Enhanced JavaScript -->
    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Enhanced Search and filter functionality
        const searchInput = document.getElementById('searchInput');
        const categoryFilter = document.getElementById('categoryFilter');
        const umkmCards = document.querySelectorAll('.umkm-card');
        const emptyState = document.getElementById('emptyState');
        const resetButton = document.getElementById('resetSearch');

        function filterUMKM() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedCategory = categoryFilter.value;
            let visibleCards = 0;

            umkmCards.forEach((card, index) => {
                const cardTitle = card.querySelector('h3').textContent.toLowerCase();
                const cardDescription = card.querySelector('p').textContent.toLowerCase();
                const cardCategory = card.dataset.category;

                const matchesSearch = cardTitle.includes(searchTerm) || cardDescription.includes(searchTerm);
                const matchesCategory = selectedCategory === '' || cardCategory === selectedCategory;

                if (matchesSearch && matchesCategory) {
                    card.style.display = 'block';
                    card.style.animation = `fadeIn 0.6s ease-in-out ${index * 0.1}s both`;
                    visibleCards++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide empty state with animation
            if (visibleCards === 0) {
                emptyState.classList.remove('hidden');
                emptyState.style.animation = 'fadeIn 0.5s ease-in-out';
            } else {
                emptyState.classList.add('hidden');
            }
        }

        // Event listeners with debouncing for better performance
        let searchTimeout;
        searchInput.addEventListener('input', () => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(filterUMKM, 300);
        });

        categoryFilter.addEventListener('change', filterUMKM);

        resetButton.addEventListener('click', () => {
            searchInput.value = '';
            categoryFilter.value = '';
            filterUMKM();

            // Add a little animation feedback
            resetButton.style.animation = 'scaleUp 0.2s ease-out';
            setTimeout(() => {
                resetButton.style.animation = '';
            }, 200);
        });

        // Enhanced Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = `slideUp 0.8s ease-out ${index * 0.1}s both`;
                    entry.target.classList.add('animate-fade-in');
                }
            });
        }, observerOptions);

        // Observe all animatable elements
        umkmCards.forEach(card => observer.observe(card));

        // Additional elements to observe
        document.querySelectorAll('.glass-effect, .card-hover').forEach(element => {
            observer.observe(element);
        });

        // Enhanced smooth scroll with easing
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

        // Add parallax effect to floating shapes
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const shapes = document.querySelector('.floating-shapes');
            if (shapes) {
                shapes.style.transform = `translateY(${scrolled * 0.1}px)`;
            }
        });

        // Add loading animation for images
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('load', function() {
                this.style.animation = 'fadeIn 0.5s ease-in-out';
            });
        });

        // Add hover effects for cards
        umkmCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-12px) scale(1.02)';
                this.style.boxShadow = '0 25px 50px -12px rgba(0, 0, 0, 0.25)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = '';
                this.style.boxShadow = '';
            });
        });

        // Add typing effect to search placeholder (optional enhancement)
        const searchPlaceholders = [
            'Cari UMKM berdasarkan nama...',
            'Cari produk favorit Anda...',
            'Temukan UMKM terdekat...',
            'Jelajahi bisnis lokal...'
        ];

        let placeholderIndex = 0;
        setInterval(() => {
            if (searchInput && document.activeElement !== searchInput) {
                searchInput.placeholder = searchPlaceholders[placeholderIndex];
                placeholderIndex = (placeholderIndex + 1) % searchPlaceholders.length;
            }
        }, 3000);

        // Add number counting animation for statistics
        function animateNumbers() {
            const totalUMKM = document.getElementById('totalUMKM');
            if (totalUMKM) {
                const finalNumber = parseInt(totalUMKM.textContent.replace(/,/g, ''));
                let currentNumber = 0;
                const increment = finalNumber / 50;
                const timer = setInterval(() => {
                    currentNumber += increment;
                    if (currentNumber >= finalNumber) {
                        currentNumber = finalNumber;
                        clearInterval(timer);
                    }
                    totalUMKM.textContent = Math.floor(currentNumber).toLocaleString();
                }, 50);
            }
        }

        // Trigger number animation when statistics section is visible
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateNumbers();
                    statsObserver.unobserve(entry.target);
                }
            });
        });

        const statsSection = document.querySelector('#totalUMKM')?.closest('.grid');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }
    </script>
</body>

</html>