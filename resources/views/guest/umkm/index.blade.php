<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar UMKM - Marketplace Lokal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1E40AF', // Solid blue/indigo
                        secondary: '#FCD34D', // Solid yellow

                    },
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
    <style>
        .filter-btn.active {
            background-color: #FCD34D !important;
            /* Secondary Color */
            color: #1F2937 !important;
            border-color: rgba(245, 158, 11, 0.3) !important;
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3) !important;
        }

        .filter-btn.active:hover {
            background-color: #F59E0B !important;
            /* Darker Yellow */
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(245, 158, 11, 0.4) !important;
        }

        .filter-btn:hover {
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 0.3) !important;
        }

        .umkm-card {
            transition: all 0.3s ease;
        }

        .umkm-card.hidden {
            opacity: 0;
            transform: scale(0.95);
            display: none;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.8s ease-out;
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen">
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <div class="flex items-center space-x-3">
                    <div class="text-white p-2 rounded-lg">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Kelurahan Dukuh Sutorejo"
                            class="w-12 h-12 sm:w-16 sm:h-16 object-contain">
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">UMKM</h1>
                        <p class="text-sm text-gray-500">Dukuh Sutorejo</p>
                    </div>
                </div>

                <div class="flex items-center space-x-6">
                    <div class="flex items-center space-x-6">
                        <a href="{{ url('/')}}" class="text-gray-700 hover:text-primary font-medium">Beranda</a>
                        <a href="#umkm" class="text-gray-700 hover:text-primary font-medium">UMKM</a>
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

    <div class="bg-gray-50 py-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Temukan UMKM <span class="text-primary">Terbaik</span>
                </h1>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Dukung ekonomi lokal dengan berbelanja dari UMKM pilihan yang menawarkan produk berkualitas dan
                    layanan terpercaya
                </p>
            </div>

            <div class="bg-primary rounded-2xl shadow-xl p-8 text-white mb-8">
                <div class="text-center mb-6">
                    <h2 class="text-lg font-medium mb-2">Jelajahi dan Temukan</h2>
                    <h3 class="text-2xl md:text-3xl font-bold">UMKM Unggulan</h3>
                </div>

                <div class="max-w-2xl mx-auto relative mb-6">
                    <input type="text" placeholder="Cari UMKM berdasarkan nama atau produk..."
                        class="w-full px-6 py-4 pl-14 bg-white/95 backdrop-blur-sm border-0 rounded-full text-gray-800 placeholder-gray-500 focus:ring-2 focus:ring-white/50 focus:outline-none transition-all shadow-lg"
                        id="searchInput">
                    <svg class="w-5 h-5 text-gray-500 absolute left-5 top-1/2 transform -translate-y-1/2" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>

                <div class="flex flex-wrap justify-center gap-3">
                    <button
                        class="filter-btn px-6 py-3 rounded-full font-medium text-sm transition-all duration-200 flex items-center space-x-2 shadow-md bg-white/20 text-white hover:bg-white/30 border border-white/30"
                        data-category="" id="filter-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                            </path>
                        </svg>
                        <span>Semua</span>
                    </button>

                    @foreach ($categories as $category)
                    <button
                        class="filter-btn px-6 py-3 rounded-full font-medium text-sm transition-all duration-200 flex items-center space-x-2 shadow-md bg-white/20 text-white hover:bg-white/30 border border-white/30"
                        data-category="{{ strtolower($category->slug ?? Str::slug($category->name)) }}"
                        id="filter-{{ strtolower($category->slug ?? Str::slug($category->name)) }}">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ $category->name }}</span>
                    </button>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-center mb-12">
                <div class="grid grid-cols-2 gap-6">
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold text-blue-500 mb-2">
                            {{ $totalUmkm ?? '7' }}
                        </div>
                        <div class="text-blue-400 text-sm md:text-base">UMKM Terdaftar</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold text-primary mb-2">
                            {{ $totalCategories ?? '2' }}
                        </div>
                        <div class="text-indigo-400 text-sm md:text-base">Kategori Produk</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id=umkm class="pb-16">
        <div class="max-w-7xl mx-auto px-4">
            <div id="umkmGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($umkms as $umkm)
                <div class="umkm-card bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl"
                    data-category="{{ strtolower($umkm->businessType->name ?? 'lainnya') }}">

                    <div class="h-32 bg-primary relative">
                        <div class="absolute bottom-4 left-6">
                            <div
                                class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center backdrop-blur-sm overflow-hidden">
                                <img src="{{ asset('storage/' . $umkm->logo) }}" alt="Logo UMKM"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="absolute top-4 right-4">
                            <span
                                class="bg-white bg-opacity-20 text-white text-xs px-3 py-1 rounded-full backdrop-blur-sm border border-white border-opacity-30">
                                {{ $umkm->businessType->name ?? 'Lainnya' }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $umkm->name }}</h3>
                        <p class="text-sm text-gray-600 mb-3 leading-relaxed">
                            {{ Str::limit($umkm->description, 100) }}
                        </p>
                        <div class="flex items-center text-xs text-gray-500 mb-4">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            {{ $umkm->address }}
                        </div>

                        <a href="{{ route('guest.umkm.show', $umkm->id) }}"
                            class="w-full bg-primary text-white py-2.5 px-4 rounded-lg text-center text-sm font-medium hover:bg-darkBlue transition-all duration-200 flex items-center justify-center group">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            Lihat Detail
                            <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div id="emptyState" class="col-span-full text-center py-16 hidden">
                <div class="max-w-md mx-auto">
                    <div class="text-6xl mb-4">🔍</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Tidak ada UMKM ditemukan</h3>
                    <p class="text-gray-600 mb-6">Coba ubah kata kunci pencarian atau filter kategori.</p>
                    <button id="resetSearch"
                        class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                        Reset Pencarian
                    </button>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
                <!-- Logo and Description -->
                <div class="space-y-6">
                    <div class="flex items-center space-x-3">
                        <!-- Logo tanpa background putih, hanya bulat -->
                        <div
                            class="w-12 h-12 sm:w-16 sm:h-16 bg-blue-100 rounded-full flex items-center justify-center shadow-md">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo UMKM"
                                class="w-8 h-8 sm:w-10 sm:h-10 object-contain" />
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const filterButtons = document.querySelectorAll('.filter-btn');
            const umkmGrid = document.getElementById('umkmGrid');
            const umkmCards = umkmGrid.querySelectorAll('.umkm-card');
            const emptyState = document.getElementById('emptyState');
            const resetSearchBtn = document.getElementById('resetSearch');
            const allFilterBtn = document.getElementById('filter-all');

            let currentCategory = '';
            let currentSearch = '';

            // Set "Semua" as active by default
            allFilterBtn.classList.add('active');

            function filterCards() {
                let visibleCount = 0;

                umkmCards.forEach((card, index) => {
                    const cardCategory = card.dataset.category || '';
                    const cardText = card.textContent.toLowerCase();
                    const matchesCategory = currentCategory === '' || cardCategory === currentCategory;
                    const matchesSearch = currentSearch === '' || cardText.includes(currentSearch);

                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.95)';

                    if (matchesCategory && matchesSearch) {
                        card.classList.remove('hidden');
                        setTimeout(() => {
                            card.style.display = 'block';
                            card.style.opacity = '1';
                            card.style.transform = 'scale(1)';
                        }, index * 50);
                        visibleCount++;
                    } else {
                        setTimeout(() => {
                            card.classList.add('hidden');
                            card.style.display = 'none';
                        }, 200);
                    }
                });

                if (emptyState) {
                    emptyState.classList.toggle('hidden', visibleCount > 0);
                }
            }

            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    currentSearch = this.value.toLowerCase().trim();
                    filterCards();
                });
            }

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    currentCategory = this.dataset.category;
                    filterCards();
                });
            });

            if (resetSearchBtn) {
                resetSearchBtn.addEventListener('click', function() {
                    searchInput.value = '';
                    currentSearch = '';
                    currentCategory = '';
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    allFilterBtn.classList.add('active');
                    filterCards();
                });
            }

            filterCards();
        });
    </script>

</body>

</html>