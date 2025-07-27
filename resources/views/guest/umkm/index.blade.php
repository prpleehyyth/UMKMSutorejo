<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar UMKM - Marketplace Lokal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'bounce-gentle': 'bounceGentle 2s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            }
                        },
                        slideUp: {
                            '0%': {
                                transform: 'translateY(30px)',
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
                                transform: 'translateY(-5px)'
                            }
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
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

                    <div class="flex items-center space-x-6">
                        <a href="#" class="text-gray-700 hover:text-primary font-medium">Beranda</a>
                        <a href="#UMKM" class="text-gray-700 hover:text-primary font-medium">UMKM</a>
                        <a href="{{ route('login') }}">
                            <button class="bg-gray-800 text-white px-6 py-2 rounded-lg font-medium hover:bg-gray-700 transition">Masuk</button>
                        </a>
                        <a href="{{ route('register.step1') }}">
                            <button class="bg-blue-500 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-600 transition">Daftar</button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="py-12 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <div class="animate-slide-up">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                    Temukan UMKM
                    <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        Terbaik
                    </span>
                </h2>
                <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                    Dukung ekonomi lokal dengan berbelanja dari UMKM pilihan yang menawarkan produk berkualitas dan layanan terpercaya
                </p>
            </div>

            <!-- Search and Filter Bar -->
            <div class="max-w-2xl mx-auto mb-12 animate-fade-in">
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-indigo-100">
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1 relative">
                            <input type="text"
                                placeholder="Cari UMKM berdasarkan nama atau produk..."
                                class="w-full px-4 py-3 pl-12 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                                id="searchInput">
                            <svg class="w-5 h-5 text-gray-400 absolute left-4 top-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <select class="px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all" id="categoryFilter">
                            <option value="">Semua Kategori</option>
                            @foreach ($categories as $category)
                            <option value="{{ strtolower($category->slug ?? Str::slug($category->name)) }}">
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
                <div class="bg-white/60 backdrop-blur-sm rounded-xl p-6 border border-indigo-100 hover:bg-white/80 transition-all">
                    <div class="text-3xl font-bold text-indigo-600 mb-2" id="totalUMKM">
                        {{ number_format($totalUMKM) }}
                    </div>
                    <div class="text-sm text-gray-600">UMKM Terdaftar</div>
                </div>
                <div class="bg-white/60 backdrop-blur-sm rounded-xl p-6 border border-purple-100 hover:bg-white/80 transition-all">
                    <div class="text-3xl font-bold text-purple-600 mb-2">
                        {{ number_format($totalKategori) }}
                    </div>
                    <div class="text-sm text-gray-600">Kategori Produk</div>
                </div>
            </div>

        </div>
    </section>

    <!-- UMKM Grid Section -->
    <section class="pb-16">
        <div class="max-w-7xl mx-auto px-4">
            <div id="umkmGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($umkms as $umkm)
                <div class="umkm-card" data-category="{{ strtolower($umkm->businessType->name ?? 'lainnya') }}">
                    <div class="p-6">
                        <h3 class="text-xl font-bold">{{ $umkm->name }}</h3>
                        <p class="text-sm text-gray-600">{{ Str::limit($umkm->description, 100) }}</p>
                        <p class="text-xs mt-2 text-gray-500">📍 {{ $umkm->address }}</p>
                        <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full mt-2 inline-block">
                            {{ $umkm->businessType->name ?? 'Lainnya' }}
                        </span>
                        <a href="{{ route('guest.umkm.show', $umkm->id) }}" class="mt-4 block text-indigo-600 hover:underline">Lihat Detail</a>
                    </div>
                </div>
                @endforeach

                <!-- Empty State (show when no results) -->
                <div id="emptyState" class="col-span-full text-center py-16 hidden">
                    <div class="max-w-md mx-auto">
                        <div class="text-6xl mb-4">🔍</div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Tidak ada UMKM ditemukan</h3>
                        <p class="text-gray-600 mb-6">Coba ubah kata kunci pencarian atau filter kategori</p>
                        <button id="resetSearch" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                            Reset Pencarian
                        </button>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12">
                <button class="px-8 py-3 bg-white text-indigo-600 border-2 border-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                    Muat Lebih Banyak UMKM
                </button>
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

    <script>
        // Search and filter functionality
        const searchInput = document.getElementById('searchInput');
        const categoryFilter = document.getElementById('categoryFilter');
        const umkmCards = document.querySelectorAll('.umkm-card');
        const emptyState = document.getElementById('emptyState');
        const resetButton = document.getElementById('resetSearch');

        function filterUMKM() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedCategory = categoryFilter.value;
            let visibleCards = 0;

            umkmCards.forEach(card => {
                const cardTitle = card.querySelector('h3').textContent.toLowerCase();
                const cardDescription = card.querySelector('p').textContent.toLowerCase();
                const cardCategory = card.dataset.category;

                const matchesSearch = cardTitle.includes(searchTerm) || cardDescription.includes(searchTerm);
                const matchesCategory = selectedCategory === '' || cardCategory === selectedCategory;

                if (matchesSearch && matchesCategory) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeIn 0.5s ease-in-out';
                    visibleCards++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide empty state
            if (visibleCards === 0) {
                emptyState.classList.remove('hidden');
            } else {
                emptyState.classList.add('hidden');
            }
        }

        // Event listeners
        searchInput.addEventListener('input', filterUMKM);
        categoryFilter.addEventListener('change', filterUMKM);

        resetButton.addEventListener('click', () => {
            searchInput.value = '';
            categoryFilter.value = '';
            filterUMKM();
        });

        // Animate cards on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'slideUp 0.6s ease-out';
                }
            });
        }, observerOptions);

        umkmCards.forEach(card => {
            observer.observe(card);
        });

        // Smooth scroll behavior
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
    </script>
</body>

</html>