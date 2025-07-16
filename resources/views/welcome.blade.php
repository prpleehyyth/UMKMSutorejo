<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM Dukuh Sutorejo</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="bg-primary text-white p-2 rounded-lg">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12L8 10l2-2 2 2-2 2zM10 2a8 8 0 100 16 8 8 0 000-16z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">UMKM</h1>
                        <p class="text-sm text-gray-500">Dukuh Sutorejo</p>
                    </div>
                </div>

                <!-- Search and Navigation -->
                <div class="flex items-center space-x-6">
                    <div class="hidden md:block">
                        <input type="text"
                            placeholder="Cari produk dalam..."
                            class="w-80 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    <div class="flex items-center space-x-6">
                        <a href="#" class="text-gray-700 hover:text-primary font-medium">Beranda</a>
                        <a href="#" class="text-gray-700 hover:text-primary font-medium">Produk</a>
                        <button class="bg-gray-800 text-white px-6 py-2 rounded-lg font-medium hover:bg-gray-700 transition">Masuk</button>
                        <button class="bg-blue-500 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-600 transition">Daftar</button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-primary via-blue-600 to-darkBlue text-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Text Content -->
                <div class="space-y-6">
                    <h1 class="text-4xl lg:text-5xl font-bold leading-tight">
                        Dukung UMKM<br>
                        Dukuh Sutorejo Untuk<br>
                        <span class="text-secondary">Ekonomi Lokal Berkelanjutan</span>
                    </h1>
                    <p class="text-lg text-blue-100 leading-relaxed">
                        Temukan beragam produk lokal berkualitas dari para pelaku UMKM di Kelurahan Dukuh Sutorejo. Dari makanan tradisional, minuman hingga kerajinan tangan semuanya tersedia dalam satu platform.
                    </p>
                    <button class="bg-secondary text-gray-900 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-yellow-400 transition transform hover:scale-105">
                        Jelajahi Produk
                    </button>
                </div>

                <!-- Product Showcase -->
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-transparent rounded-3xl"></div>
                    <div class="relative grid grid-cols-3 gap-4 p-8">
                        <!-- Row 1 -->
                        <div class="bg-white rounded-2xl p-4 shadow-xl transform -rotate-3 hover:rotate-0 transition-transform">
                            <div class="aspect-square bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl mb-3 flex items-center justify-center">
                                <span class="text-white text-2xl">🍔</span>
                            </div>
                            <div class="space-y-2">
                                <div class="h-2 bg-gray-200 rounded"></div>
                                <div class="h-2 bg-gray-200 rounded w-3/4"></div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-4 shadow-xl transform rotate-2 hover:rotate-0 transition-transform">
                            <div class="aspect-square bg-gradient-to-br from-green-400 to-green-600 rounded-xl mb-3 flex items-center justify-center">
                                <span class="text-white text-2xl">🥤</span>
                            </div>
                            <div class="space-y-2">
                                <div class="h-2 bg-gray-200 rounded"></div>
                                <div class="h-2 bg-gray-200 rounded w-3/4"></div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-4 shadow-xl transform -rotate-1 hover:rotate-0 transition-transform">
                            <div class="aspect-square bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl mb-3 flex items-center justify-center">
                                <span class="text-white text-2xl">🎨</span>
                            </div>
                            <div class="space-y-2">
                                <div class="h-2 bg-gray-200 rounded"></div>
                                <div class="h-2 bg-gray-200 rounded w-3/4"></div>
                            </div>
                        </div>

                        <!-- Row 2 -->
                        <div class="bg-white rounded-2xl p-4 shadow-xl transform rotate-1 hover:rotate-0 transition-transform">
                            <div class="aspect-square bg-gradient-to-br from-red-400 to-red-600 rounded-xl mb-3 flex items-center justify-center">
                                <span class="text-white text-2xl">☕</span>
                            </div>
                            <div class="space-y-2">
                                <div class="h-2 bg-gray-200 rounded"></div>
                                <div class="h-2 bg-gray-200 rounded w-3/4"></div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-4 shadow-xl transform -rotate-2 hover:rotate-0 transition-transform">
                            <div class="aspect-square bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl mb-3 flex items-center justify-center">
                                <span class="text-white text-2xl">🧵</span>
                            </div>
                            <div class="space-y-2">
                                <div class="h-2 bg-gray-200 rounded"></div>
                                <div class="h-2 bg-gray-200 rounded w-3/4"></div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-4 shadow-xl transform rotate-3 hover:rotate-0 transition-transform">
                            <div class="aspect-square bg-gradient-to-br from-pink-400 to-pink-600 rounded-xl mb-3 flex items-center justify-center">
                                <span class="text-white text-2xl">🍰</span>
                            </div>
                            <div class="space-y-2">
                                <div class="h-2 bg-gray-200 rounded"></div>
                                <div class="h-2 bg-gray-200 rounded w-3/4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partnership Section -->
    <section class="bg-white py-20">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center space-y-8">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">
                    Mari Bersama Membangun Ekonomi Lokal
                </h2>
                <div class="max-w-4xl mx-auto">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Dukung ekonomi lokal dengan <span class="font-semibold text-primary">mendaftarkan usaha Anda</span> sebagai Mitra UMKM Dukuh Sutorejo dan jadilah bagian dari gerakan pemberdayaan masyarakat melalui platform digital kami. Tambahkan dan kelola produk secara online untuk meningkatkan penjualan dan menjangkau lebih banyak pelanggan. Setiap transaksi bukan hanya memberikan kepuasan, tetapi juga berperan dalam melestarikan kearifan lokal serta memperkuat kesejahteraan masyarakat Dukuh Sutorejo.
                    </p>
                </div>
                <button class="bg-secondary text-gray-900 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-yellow-400 transition transform hover:scale-105">
                    Daftar Sekarang
                </button>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="bg-gradient-to-r from-primary via-blue-600 to-darkBlue py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <p class="text-blue-200 text-lg mb-2">Jelajahi dan Temukan</p>
                <h2 class="text-3xl lg:text-4xl font-bold text-white">Produk Unggulan</h2>
            </div>

            <!-- Filter Tabs -->
            <div class="flex justify-center mb-16">
                <div class="flex space-x-2 bg-white/10 backdrop-blur-sm rounded-2xl p-2">
                    <button class="bg-secondary text-gray-900 px-8 py-3 rounded-xl font-semibold transition">Semua</button>
                    <button class="text-white px-8 py-3 rounded-xl hover:bg-white/20 transition font-medium">Makanan</button>
                    <button class="text-white px-8 py-3 rounded-xl hover:bg-white/20 transition font-medium">Minuman</button>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Product Cards -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow group">
                    <div class="aspect-square bg-gradient-to-br from-blue-400 to-blue-600 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-white text-5xl">📱</span>
                        </div>
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Nama UMKM</h3>
                        <p class="text-gray-600 mb-4">Deskripsi</p>
                        <button class="w-full bg-secondary text-gray-900 py-3 rounded-xl font-semibold hover:bg-yellow-400 transition transform hover:scale-105">
                            Detail
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow group">
                    <div class="aspect-square bg-gradient-to-br from-green-400 to-green-600 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-white text-5xl">🍔</span>
                        </div>
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Nama UMKM</h3>
                        <p class="text-gray-600 mb-4">Deskripsi</p>
                        <button class="w-full bg-secondary text-gray-900 py-3 rounded-xl font-semibold hover:bg-yellow-400 transition transform hover:scale-105">
                            Detail
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow group">
                    <div class="aspect-square bg-gradient-to-br from-purple-400 to-purple-600 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-white text-5xl">🎨</span>
                        </div>
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Nama UMKM</h3>
                        <p class="text-gray-600 mb-4">Deskripsi</p>
                        <button class="w-full bg-secondary text-gray-900 py-3 rounded-xl font-semibold hover:bg-yellow-400 transition transform hover:scale-105">
                            Detail
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow group">
                    <div class="aspect-square bg-gradient-to-br from-red-400 to-red-600 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-white text-5xl">☕</span>
                        </div>
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Nama UMKM</h3>
                        <p class="text-gray-600 mb-4">Deskripsi</p>
                        <button class="w-full bg-secondary text-gray-900 py-3 rounded-xl font-semibold hover:bg-yellow-400 transition transform hover:scale-105">
                            Detail
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow group">
                    <div class="aspect-square bg-gradient-to-br from-orange-400 to-orange-600 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-white text-5xl">🧵</span>
                        </div>
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Nama UMKM</h3>
                        <p class="text-gray-600 mb-4">Deskripsi</p>
                        <button class="w-full bg-secondary text-gray-900 py-3 rounded-xl font-semibold hover:bg-yellow-400 transition transform hover:scale-105">
                            Detail
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow group">
                    <div class="aspect-square bg-gradient-to-br from-teal-400 to-teal-600 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-white text-5xl">🥘</span>
                        </div>
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Nama UMKM</h3>
                        <p class="text-gray-600 mb-4">Deskripsi</p>
                        <button class="w-full bg-secondary text-gray-900 py-3 rounded-xl font-semibold hover:bg-yellow-400 transition transform hover:scale-105">
                            Detail
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow group">
                    <div class="aspect-square bg-gradient-to-br from-pink-400 to-pink-600 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-white text-5xl">🍰</span>
                        </div>
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Nama UMKM</h3>
                        <p class="text-gray-600 mb-4">Deskripsi</p>
                        <button class="w-full bg-secondary text-gray-900 py-3 rounded-xl font-semibold hover:bg-yellow-400 transition transform hover:scale-105">
                            Detail
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow group">
                    <div class="aspect-square bg-gradient-to-br from-indigo-400 to-indigo-600 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-white text-5xl">🎭</span>
                        </div>
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Nama UMKM</h3>
                        <p class="text-gray-600 mb-4">Deskripsi</p>
                        <button class="w-full bg-secondary text-gray-900 py-3 rounded-xl font-semibold hover:bg-yellow-400 transition transform hover:scale-105">
                            Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- View More -->
            <div class="text-center">
                <button class="text-white hover:text-secondary underline text-lg font-medium transition">
                    Lihat Selengkapnya...
                </button>
            </div>
        </div>
    </section>

    <!-- Sponsors Section -->
    <section class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <p class="text-gray-600 text-lg">Supported By :</p>
            </div>
            <div class="flex justify-center items-center space-x-12 flex-wrap gap-8">
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-20 h-16 bg-primary rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">KELURAHAN</span>
                    </div>
                    <p class="text-xs text-gray-600 mt-2 text-center">Dukuh Sutorejo</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-20 h-16 bg-green-500 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">UPN</span>
                    </div>
                    <p class="text-xs text-gray-600 mt-2 text-center">Veteran Jatim</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-20 h-16 bg-red-500 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">PEMKOT</span>
                    </div>
                    <p class="text-xs text-gray-600 mt-2 text-center">Surabaya</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-20 h-16 bg-blue-500 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-xs">DISKOMINFO</span>
                    </div>
                    <p class="text-xs text-gray-600 mt-2 text-center">Berdampak</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-20 h-16 bg-purple-500 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">PARTNER</span>
                    </div>
                    <p class="text-xs text-gray-600 mt-2 text-center">Komunitas</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Logo and Description -->
                <div class="space-y-6">
                    <div class="flex items-center space-x-3">
                        <div class="bg-primary text-white p-3 rounded-lg">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12L8 10l2-2 2 2-2 2zM10 2a8 8 0 100 16 8 8 0 000-16z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">UMKM</h3>
                            <p class="text-gray-400">Dukuh Sutorejo</p>
                        </div>
                    </div>
                    <p class="text-gray-400 leading-relaxed">
                        Website Resmi UMKM Kelurahan Dukuh Sutorejo, Kecamatan Mulyorejo, Kota Surabaya, Provinsi Jawa Timur, Indonesia
                    </p>
                </div>

                <!-- Contact Information -->
                <div class="space-y-6">
                    <h3 class="text-2xl font-bold">Hubungi Kami</h3>
                    <div class="space-y-3 text-gray-400">
                        <p>Jl. Lebansari, No. 1, Kelurahan Dukuh Sutorejo,</p>
                        <p>Kecamatan Mulyorejo, Kota Surabaya, Provinsi</p>
                        <p>Jawa Timur Kode Pos 60113</p>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-800 mt-16 pt-8 text-center">
                <p class="text-gray-400">
                    © 2025 Copyright Pemerintahan Kelurahan Dukuh Sutorejo - Design By Kelompok KKN 47 UPN Veteran Jawa Timur 2025
                </p>
            </div>
        </div>
    </footer>
</body>

</html>