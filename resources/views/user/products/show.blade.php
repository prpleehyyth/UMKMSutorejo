<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('products.index') }}"
                    class="text-gray-500 hover:text-gray-700 transition-colors duration-200">
                    <i class="fas fa-arrow-left text-lg"></i>
                </a>
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Detail Produk') }}
                    </h2>
                    <p class="text-sm text-gray-600">{{ __('Informasi lengkap produk UMKM') }}</p>
                </div>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('products.edit', $product) }}"
                    class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                    <i class="fas fa-edit mr-2"></i>
                    {{ __('Edit Produk') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="max-w-6xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="flex mb-6 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-home mr-1"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="{{ route('products.index') }}" class="text-gray-500 hover:text-gray-700">Produk</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-gray-900 font-medium">{{ $product->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Product Info -->
            <div class="lg:col-span-2">
                <!-- Product Image -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    @if ($product->image_url)
                    <div class="relative group">
                        <img src="{{ asset('storage/' . $product->image_url) }}"
                            alt="{{ $product->name }}"
                            class="w-full h-80 object-cover transition-transform duration-300 group-hover:scale-105">
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-opacity duration-300"></div>
                        <!-- Image overlay with zoom icon -->
                        <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="bg-white bg-opacity-90 hover:bg-opacity-100 rounded-full p-2 shadow-lg transition-all duration-200">
                                <i class="fas fa-expand-alt text-gray-700"></i>
                            </button>
                        </div>
                    </div>
                    @else
                    <div class="h-80 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <div class="text-center">
                            <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                            <p class="text-gray-500">{{ __('Tidak ada gambar') }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Product Details Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                            <div class="flex items-center space-x-4 text-sm text-gray-500">
                                <span class="flex items-center">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    {{ __('Dibuat') }}: {{ $product->created_at->format('d M Y') }}
                                </span>
                                @if($product->updated_at != $product->created_at)
                                <span class="flex items-center">
                                    <i class="fas fa-edit mr-1"></i>
                                    {{ __('Diperbarui') }}: {{ $product->updated_at->format('d M Y') }}
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- Status badge (if you have status field) -->
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i>
                                {{ __('Aktif') }}
                            </span>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg p-4 mb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">{{ __('Harga Estimasi') }}</p>
                                <p class="text-3xl font-bold text-blue-600">
                                    Rp {{ number_format($product->estimated_price ?? 0, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <i class="fas fa-tag text-3xl text-blue-400"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-info-circle mr-2 text-blue-600"></i>
                            {{ __('Deskripsi Produk') }}
                        </h3>
                        <div class="prose prose-sm max-w-none">
                            <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $product->description ?: __('Belum ada deskripsi untuk produk ini.') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Quick Actions -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6 sticky top-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-cogs mr-2 text-gray-600"></i>
                        {{ __('Aksi Cepat') }}
                    </h3>
                    <div class="space-y-3">
                        <a href="{{ route('products.edit', $product) }}"
                            class="flex items-center w-full px-4 py-3 bg-amber-600 hover:bg-amber-700 text-white rounded-lg transition-colors duration-200 group">
                            <i class="fas fa-edit mr-3 group-hover:scale-110 transition-transform duration-200"></i>
                            <span class="font-medium">{{ __('Edit Produk') }}</span>
                        </a>

                        <button onclick="shareProduct()"
                            class="flex items-center w-full px-4 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors duration-200 group">
                            <i class="fas fa-share-alt mr-3 group-hover:scale-110 transition-transform duration-200"></i>
                            <span class="font-medium">{{ __('Bagikan') }}</span>
                        </button>

                        <button onclick="printProduct()"
                            class="flex items-center w-full px-4 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors duration-200 group">
                            <i class="fas fa-print mr-3 group-hover:scale-110 transition-transform duration-200"></i>
                            <span class="font-medium">{{ __('Cetak') }}</span>
                        </button>

                        <form method="POST" action="{{ route('products.destroy', $product) }}" class="w-full"
                            onsubmit="return confirm('{{ __('Apakah Anda yakin ingin menghapus produk ini?') }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="flex items-center w-full px-4 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200 group">
                                <i class="fas fa-trash-alt mr-3 group-hover:scale-110 transition-transform duration-200"></i>
                                <span class="font-medium">{{ __('Hapus') }}</span>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Product Stats (if you have related data) -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-chart-bar mr-2 text-gray-600"></i>
                        {{ __('Statistik') }}
                    </h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-sm text-gray-600">{{ __('Total Views') }}</span>
                            <span class="font-semibold text-gray-900">0</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-sm text-gray-600">{{ __('Dibuat') }}</span>
                            <span class="font-semibold text-gray-900">{{ $product->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="text-sm text-gray-600">{{ __('Terakhir Update') }}</span>
                            <span class="font-semibold text-gray-900">{{ $product->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for enhanced functionality -->
    <script>
        function shareProduct() {
            if (navigator.share) {
                navigator.share({
                    title: '{{ $product->name }}',
                    text: '{{ substr($product->description, 0, 100) }}...',
                    url: window.location.href
                });
            } else {
                // Fallback: copy URL to clipboard
                navigator.clipboard.writeText(window.location.href).then(() => {
                    alert('{{ __("Link produk telah disalin ke clipboard!") }}');
                });
            }
        }

        function printProduct() {
            window.print();
        }

        // Image zoom functionality
        document.addEventListener('DOMContentLoaded', function() {
            const productImage = document.querySelector('.group img');
            if (productImage) {
                productImage.addEventListener('click', function() {
                    // Create modal for image zoom
                    const modal = document.createElement('div');
                    modal.className = 'fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 p-4';
                    modal.onclick = () => modal.remove();

                    const img = document.createElement('img');
                    img.src = this.src;
                    img.className = 'max-w-full max-h-full object-contain';

                    modal.appendChild(img);
                    document.body.appendChild(modal);
                });
            }
        });
    </script>

    <style>
        @media print {
            .no-print {
                display: none !important;
            }

            .print-only {
                display: block !important;
            }
        }
    </style>
</x-app-layout>