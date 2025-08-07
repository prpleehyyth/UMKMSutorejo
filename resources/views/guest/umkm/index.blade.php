<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Galeri UMKM - Dukuh Sutorejo</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
        /* Animations from saved style */
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

        .animate-slide-left {
            animation: slideInLeft 0.8s ease-out;
        }

        /* Card hover effect from saved style */
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        /* Filter button active state */
        .filter-btn.active {
            background-color: #FCD34D !important;
            /* secondary color */
            color: #111827 !important;
            box-shadow: 0 4px 15px rgba(252, 211, 77, 0.4);
        }

        /* General card transition for filtering */
        .umkm-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>

<body class="bg-gray-50">

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
                    <a href="{{ route('guest.umkm.index') }}" class="font-semibold text-primary transition-colors">Galeri UMKM</a>
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
                <a href="{{ route('guest.umkm.index') }}" class="block px-3 py-2 text-base font-semibold text-primary bg-slate-100 rounded-md">Galeri UMKM</a>
                <div class="border-t border-slate-200 pt-4 space-y-3">
                    <a href="{{ route('login') }}" class="block w-full text-center font-semibold text-primary border border-primary px-4 py-2 rounded-lg hover:bg-indigo-50 transition-colors">Masuk</a>
                    <a href="{{ route('register.step1') }}" class="block w-full text-center bg-primary text-white px-4 py-2 rounded-lg font-semibold hover:bg-darkBlue transition-colors">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="bg-gradient-to-r from-primary via-blue-600 to-darkBlue py-16 lg:py-20 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 animate-slide-left">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    Galeri <span class="text-secondary">UMKM</span> Kami
                </h1>
                <p class="text-blue-100 text-lg max-w-3xl mx-auto">
                    Jelajahi beragam produk berkualitas dari para pelaku usaha di Dukuh Sutorejo. Temukan favoritmu!
                </p>
            </div>

            <div class="max-w-4xl mx-auto space-y-8">
                <div class="relative">
                    <input type="text" placeholder="Cari UMKM, produk, atau kategori..." id="searchInput" class="w-full pl-14 pr-6 py-4 bg-white/20 text-white placeholder-blue-200 rounded-full border-2 border-transparent focus:border-secondary focus:ring-0 focus:bg-white/25 transition-all duration-300 shadow-lg backdrop-blur-sm">
                    <i class="fas fa-search text-blue-200 absolute left-6 top-1/2 -translate-y-1/2 text-lg"></i>
                </div>

                <div class="flex flex-wrap justify-center gap-2 sm:gap-3 bg-white/10 backdrop-blur-lg rounded-2xl p-2 shadow-inner border border-white/20">
                    <button class="filter-btn active text-white px-6 py-3 rounded-xl hover:bg-white/20 transition-all duration-300 font-medium flex items-center space-x-2" data-category="">
                        <i class="fas fa-th-large"></i>
                        <span>Semua</span>
                    </button>
                    @foreach ($categories as $category)
                    <button class="filter-btn text-white px-6 py-3 rounded-xl hover:bg-white/20 transition-all duration-300 font-medium flex items-center space-x-2" data-category="{{ Str::slug($category->name) }}">
                        @if (Str::contains(strtolower($category->name), 'makanan'))
                        <i class="fas fa-utensils"></i>
                        @elseif(Str::contains(strtolower($category->name), 'minuman'))
                        <i class="fas fa-glass-water"></i>
                        @else
                        <i class="fas fa-tag"></i>
                        @endif
                        <span>{{ $category->name }}</span>
                    </button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <main class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div id="umkmGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse ($umkms as $umkm)
                <div class="umkm-card card-hover bg-white rounded-xl shadow-lg overflow-hidden group" data-category="{{ Str::slug($umkm->businessType->name) }}">
                    <div class="aspect-[4/3] bg-gradient-to-br from-blue-400 to-blue-600 relative overflow-hidden">
                        <img src="{{ asset('storage/' . $umkm->logo) }}" alt="{{ $umkm->name }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                        <div class="absolute top-3 right-3">
                            <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold text-white">{{ $umkm->businessType->name }}</span>
                        </div>
                    </div>

                    <div class="p-5">
                        <h3 class="font-bold text-gray-900 text-lg mb-2 truncate group-hover:text-primary transition-colors">
                            {{ $umkm->name }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2 leading-relaxed">
                            {{ $umkm->description ?? 'Deskripsi singkat UMKM.' }}
                        </p>
                        <a href="{{ route('guest.umkm.show', $umkm->id) }}" class="block w-full text-center bg-secondary text-gray-900 py-3 rounded-lg font-semibold text-sm hover:bg-yellow-400 transition-all duration-300 transform hover:scale-105 shadow-md">
                            <span class="flex items-center justify-center space-x-2">
                                <i class="fas fa-eye text-xs"></i>
                                <span>Lihat Detail</span>
                                <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform duration-200 text-xs"></i>
                            </span>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">Belum ada UMKM yang ditampilkan.</p>
                </div>
                @endforelse
            </div>

            <div id="emptyState" class="col-span-full text-center py-16 hidden">
                <div class="max-w-md mx-auto">
                    <div class="text-6xl mb-4 text-gray-300">
                        <i class="fas fa-store-slash"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Oops! Tidak Ditemukan</h3>
                    <p class="text-gray-600 mb-6">Tidak ada UMKM yang cocok dengan kriteria pencarian atau filter Anda.</p>
                    <button id="resetSearch" class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-darkBlue transition-colors font-semibold">
                        Reset Pencarian
                    </button>
                </div>
            </div>
        </div>
    </main>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const filterButtons = document.querySelectorAll('.filter-btn');
            const umkmGrid = document.getElementById('umkmGrid');
            const umkmCards = umkmGrid.querySelectorAll('.umkm-card');
            const emptyState = document.getElementById('emptyState');
            const resetSearchBtn = document.getElementById('resetSearch');

            let currentCategory = '';
            let currentSearch = '';
            let searchTimeout;

            function updateView() {
                let visibleCount = 0;

                // Animate cards out
                umkmCards.forEach(card => {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.8)';
                });

                setTimeout(() => {
                    umkmCards.forEach(card => {
                        const cardCategory = card.dataset.category || '';
                        const cardText = card.textContent.toLowerCase();
                        const matchesCategory = currentCategory === '' || cardCategory.includes(currentCategory);
                        const matchesSearch = currentSearch === '' || cardText.includes(currentSearch);

                        if (matchesCategory && matchesSearch) {
                            card.style.display = 'block';
                            setTimeout(() => {
                                card.style.opacity = '1';
                                card.style.transform = 'scale(1)';
                            }, 50); // Staggered fade in
                            visibleCount++;
                        } else {
                            card.style.display = 'none';
                        }
                    });

                    // Toggle empty state visibility
                    emptyState.classList.toggle('hidden', visibleCount > 0);
                    umkmGrid.classList.toggle('hidden', visibleCount === 0);

                }, 200); // Wait for cards to fade out
            }

            // Search functionality with debounce
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    currentSearch = this.value.toLowerCase().trim();
                    updateView();
                }, 300);
            });

            // Filter button functionality
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    currentCategory = this.dataset.category;
                    updateView();
                });
            });

            // Reset button functionality
            resetSearchBtn.addEventListener('click', function() {
                searchInput.value = '';
                currentSearch = '';
                currentCategory = '';
                filterButtons.forEach(btn => btn.classList.remove('active'));
                document.querySelector('.filter-btn[data-category=""]').classList.add('active');
                updateView();
            });

            // Initial load animation for cards
            const initialCards = document.querySelectorAll('.umkm-card');
            initialCards.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                setTimeout(() => {
                    el.style.transition = 'all 0.6s ease';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>

</body>

</html>