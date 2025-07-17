<x-admin-layout>
    <x-slot name="title">Detail UMKM - {{ $umkm->name }}</x-slot>
    <x-slot name="header">Detail UMKM</x-slot>

    <div class="max-w-7xl mx-auto">
        <!-- Back Button -->
        <div class="mb-6 no-print">
            <a href="{{ route('admin.umkm.index') }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Daftar UMKM
            </a>
        </div>

        <!-- Print Header (only visible when printing) -->
        <div class="print-only hidden">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-900">DETAIL UMKM</h1>
                <p class="text-gray-600 mt-2">Dinas Koperasi dan UKM</p>
                <hr class="mt-4 mb-6">
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 print:grid-cols-1 print:gap-4">
            <!-- Left Column - Images and Gallery -->
            <div class="lg:col-span-1 print:col-span-1">
                <div class="bg-white rounded-lg shadow-md overflow-hidden print:shadow-none print:border print:border-gray-300">
                    <!-- Main Image -->
                    <div class="aspect-square bg-gray-100 flex items-center justify-center print:aspect-auto print:h-32">
                        @if($umkm->logo_url)
                        <img src="{{ $umkm->logo_url }}"
                            alt="{{ $umkm->name }}"
                            class="w-full h-full object-cover print:object-contain print:max-h-32">
                        @else
                        <div class="text-center text-gray-400">
                            <i class="fas fa-store text-6xl mb-4 print:text-2xl print:mb-2"></i>
                            <p class="text-sm">Logo tidak tersedia</p>
                        </div>
                        @endif
                    </div>

                    <!-- Quick Actions -->
                    <div class="p-4 border-t border-gray-200 no-print">
                        <div class="flex space-x-2">
                            <button onclick="window.print()"
                                class="flex-1 bg-gray-600 text-white text-center py-2 px-4 rounded-md hover:bg-gray-700 transition-colors">
                                <i class="fas fa-print mr-2"></i>
                                Print
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Status Card -->
                <div class="mt-6 bg-white rounded-lg shadow-md p-4 print:shadow-none print:border print:border-gray-300 print:mt-4">
                    <h3 class="text-lg font-semibold mb-3 print:text-base">Status Verifikasi</h3>
                    <div class="flex items-center">
                        @if($umkm->is_verified ?? false)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 print:px-2 print:py-1 print:text-xs">
                            <i class="fas fa-check-circle mr-2"></i>
                            Terverifikasi
                        </span>
                        @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 print:px-2 print:py-1 print:text-xs">
                            <i class="fas fa-clock mr-2"></i>
                            Menunggu Verifikasi
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column - Details -->
            <div class="lg:col-span-2 print:col-span-1">
                <div class="bg-white rounded-lg shadow-md print:shadow-none print:border print:border-gray-300">
                    <!-- Header -->
                    <div class="px-6 py-4 border-b border-gray-200 print:px-4 print:py-3">
                        <h1 class="text-2xl font-bold text-gray-900 print:text-xl">{{ $umkm->name }}</h1>
                        <p class="text-gray-600 mt-1 print:text-sm">{{ $umkm->businessType->name ?? 'Jenis usaha tidak tersedia' }}</p>
                    </div>

                    <!-- Details Grid -->
                    <div class="p-6 print:p-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 print:grid-cols-1 print:gap-4">
                            <!-- Business Information -->
                            <div class="space-y-4 print:space-y-3">
                                <h3 class="text-lg font-semibold text-gray-900 pb-2 border-b border-gray-200 print:text-base">
                                    <i class="fas fa-building mr-2 text-blue-600"></i>
                                    Informasi Usaha
                                </h3>

                                <div class="space-y-3 print:space-y-2">
                                    <div class="flex items-start">
                                        <span class="text-sm font-medium text-gray-500 w-24 print:w-20 print:text-xs">NIB:</span>
                                        <span class="text-sm text-gray-900 print:text-xs">{{ $umkm->nib ?? '-' }}</span>
                                    </div>

                                    <div class="flex items-start">
                                        <span class="text-sm font-medium text-gray-500 w-24 print:w-20 print:text-xs">Omzet:</span>
                                        <span class="text-sm text-gray-900 font-semibold text-green-600 print:text-xs">
                                            Rp {{ number_format($umkm->revenue, 0, ',', '.') }}
                                        </span>
                                    </div>

                                    <div class="flex items-start">
                                        <span class="text-sm font-medium text-gray-500 w-24 print:w-20 print:text-xs">Halal:</span>
                                        <span class="text-sm text-gray-900 print:text-xs">
                                            @if($umkm->halal_certified)
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 print:px-1 print:py-0">
                                                <i class="fas fa-check mr-1"></i>
                                                {{ $umkm->halal_certified }}
                                            </span>
                                            @else
                                            <span class="text-gray-400">Belum tersertifikasi</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Owner Information -->
                            <div class="space-y-4 print:space-y-3">
                                <h3 class="text-lg font-semibold text-gray-900 pb-2 border-b border-gray-200 print:text-base">
                                    <i class="fas fa-user mr-2 text-green-600"></i>
                                    Informasi Pemilik
                                </h3>

                                <div class="space-y-3 print:space-y-2">
                                    <div class="flex items-start">
                                        <span class="text-sm font-medium text-gray-500 w-24 print:w-20 print:text-xs">Nama:</span>
                                        <span class="text-sm text-gray-900 print:text-xs">{{ $umkm->user->name ?? '-' }}</span>
                                    </div>

                                    <div class="flex items-start">
                                        <span class="text-sm font-medium text-gray-500 w-24 print:w-20 print:text-xs">Email:</span>
                                        <span class="text-sm text-gray-900 print:text-xs">
                                            <a href="mailto:{{ $umkm->user->email }}" class="text-blue-600 hover:underline print:text-gray-900">
                                                {{ $umkm->user->email ?? '-' }}
                                            </a>
                                        </span>
                                    </div>

                                    <div class="flex items-start">
                                        <span class="text-sm font-medium text-gray-500 w-24 print:w-20 print:text-xs">Telepon:</span>
                                        <span class="text-sm text-gray-900 print:text-xs">
                                            <a href="tel:{{ $umkm->user->phone_number }}" class="text-blue-600 hover:underline print:text-gray-900">
                                                {{ $umkm->user->phone_number ?? '-' }}
                                            </a>
                                        </span>
                                    </div>

                                    <div class="flex items-start">
                                        <span class="text-sm font-medium text-gray-500 w-24 print:w-20 print:text-xs">NIK:</span>
                                        <span class="text-sm text-gray-900 print:text-xs">{{ $umkm->user->nik ?? '-' }}</span>
                                    </div>

                                    <div class="flex items-start">
                                        <span class="text-sm font-medium text-gray-500 w-24 print:w-20 print:text-xs">NPWP:</span>
                                        <span class="text-sm text-gray-900 print:text-xs">{{ $umkm->user->npwp ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Address Section -->
                        <div class="mt-8 pt-6 border-t border-gray-200 print:mt-6 print:pt-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 print:text-base print:mb-3">
                                <i class="fas fa-map-marker-alt mr-2 text-red-600"></i>
                                Lokasi Usaha
                            </h3>

                            <div class="bg-gray-50 rounded-lg p-4 print:bg-white print:border print:border-gray-300">
                                <p class="text-sm text-gray-900 mb-3 print:text-xs print:mb-2">{{ $umkm->address }}</p>

                                @if($umkm->google_maps_link)
                                <a href="{{ $umkm->google_maps_link }}"
                                    target="_blank"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 transition-colors no-print">
                                    <i class="fas fa-map-marked-alt mr-2"></i>
                                    Lihat di Google Maps
                                </a>
                                <div class="print-only hidden">
                                    <p class="text-xs text-gray-600 mt-2">Google Maps: {{ $umkm->google_maps_link }}</p>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Additional Info -->
                        <div class="mt-8 pt-6 border-t border-gray-200 print:mt-6 print:pt-4">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 print:grid-cols-3 print:gap-2">
                                <div class="bg-blue-50 rounded-lg p-4 text-center print:bg-white print:border print:border-gray-300 print:p-2">
                                    <i class="fas fa-calendar-alt text-blue-600 text-2xl mb-2 print:text-lg print:mb-1"></i>
                                    <p class="text-sm font-medium text-gray-900 print:text-xs">Terdaftar</p>
                                    <p class="text-xs text-gray-600 print:text-xs">{{ $umkm->created_at->format('d M Y') }}</p>
                                </div>

                                <div class="bg-green-50 rounded-lg p-4 text-center print:bg-white print:border print:border-gray-300 print:p-2">
                                    <i class="fas fa-chart-line text-green-600 text-2xl mb-2 print:text-lg print:mb-1"></i>
                                    <p class="text-sm font-medium text-gray-900 print:text-xs">Kategori Omzet</p>
                                    <p class="text-xs text-gray-600 print:text-xs">
                                        @php
                                        $revenue = $umkm->revenue ?? 0;
                                        if ($revenue < 300000000) echo 'Mikro' ;
                                            elseif ($revenue < 2500000000) echo 'Kecil' ;
                                            elseif ($revenue < 50000000000) echo 'Menengah' ;
                                            else echo 'Besar' ;
                                            @endphp
                                            </p>
                                </div>

                                <div class="bg-purple-50 rounded-lg p-4 text-center print:bg-white print:border print:border-gray-300 print:p-2">
                                    <i class="fas fa-star text-purple-600 text-2xl mb-2 print:text-lg print:mb-1"></i>
                                    <p class="text-sm font-medium text-gray-900 print:text-xs">Status</p>
                                    <p class="text-xs text-gray-600 print:text-xs">
                                        {{ ($umkm->is_verified ?? false) ? 'Aktif' : 'Menunggu' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Print Footer (only visible when printing) -->
        <div class="print-only hidden mt-8">
            <hr class="mb-4">
            <div class="text-center text-xs text-gray-500">
                <p>Dicetak pada: {{ now()->format('d F Y, H:i') }} WIB</p>
                <p>Dokumen ini dicetak dari sistem manajemen UMKM</p>
            </div>
        </div>
    </div>

    <!-- Enhanced Print Styles -->
    <style>
        @media print {

            /* Hide elements that shouldn't be printed */
            .no-print {
                display: none !important;
            }

            /* Show elements only when printing */
            .print-only {
                display: block !important;
            }

            /* Page setup */
            @page {
                size: A4;
                margin: 1cm;
            }

            /* Body styles for print */
            body {
                font-size: 12px;
                line-height: 1.4;
                color: #000;
                background: white;
            }

            /* Remove shadows and backgrounds */
            .shadow-md {
                box-shadow: none !important;
            }

            .bg-gray-50,
            .bg-blue-50,
            .bg-green-50,
            .bg-purple-50 {
                background-color: white !important;
            }

            /* Ensure proper spacing and layout */
            .grid {
                display: block !important;
            }

            .lg\:col-span-1,
            .lg\:col-span-2 {
                width: 100% !important;
            }

            /* Typography adjustments */
            h1,
            h2,
            h3 {
                page-break-after: avoid;
            }

            /* Avoid page breaks inside elements */
            .space-y-3>div,
            .space-y-4>div {
                page-break-inside: avoid;
            }

            /* Link styles for print */
            a {
                color: inherit !important;
                text-decoration: none !important;
            }

            /* Status badges */
            .bg-green-100,
            .bg-yellow-100 {
                background-color: #f3f4f6 !important;
                border: 1px solid #d1d5db !important;
            }

            .text-green-800,
            .text-yellow-800 {
                color: #374151 !important;
            }

            /* Image handling */
            img {
                max-width: 100% !important;
                height: auto !important;
            }

            /* Border styles */
            .border-gray-200 {
                border-color: #d1d5db !important;
            }

            /* Ensure proper spacing */
            .p-6 {
                padding: 1rem !important;
            }

            .p-4 {
                padding: 0.75rem !important;
            }

            /* Grid adjustments for print */
            .print\:grid-cols-1 {
                grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
            }

            .print\:grid-cols-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
            }

            .print\:gap-2 {
                gap: 0.5rem !important;
            }

            .print\:gap-4 {
                gap: 1rem !important;
            }

            /* Text size adjustments */
            .print\:text-xs {
                font-size: 0.75rem !important;
            }

            .print\:text-base {
                font-size: 1rem !important;
            }

            .print\:text-xl {
                font-size: 1.25rem !important;
            }

            /* Spacing adjustments */
            .print\:mt-4 {
                margin-top: 1rem !important;
            }

            .print\:mt-6 {
                margin-top: 1.5rem !important;
            }

            .print\:mb-1 {
                margin-bottom: 0.25rem !important;
            }

            .print\:mb-2 {
                margin-bottom: 0.5rem !important;
            }

            .print\:mb-3 {
                margin-bottom: 0.75rem !important;
            }

            .print\:pt-4 {
                padding-top: 1rem !important;
            }

            .print\:p-2 {
                padding: 0.5rem !important;
            }

            .print\:px-1 {
                padding-left: 0.25rem !important;
                padding-right: 0.25rem !important;
            }

            .print\:py-0 {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }

            .print\:px-2 {
                padding-left: 0.5rem !important;
                padding-right: 0.5rem !important;
            }

            .print\:py-1 {
                padding-top: 0.25rem !important;
                padding-bottom: 0.25rem !important;
            }

            /* Width adjustments */
            .print\:w-20 {
                width: 5rem !important;
            }

            /* Spacing adjustments */
            .print\:space-y-2>*+* {
                margin-top: 0.5rem !important;
            }

            .print\:space-y-3>*+* {
                margin-top: 0.75rem !important;
            }

            /* Border and background adjustments */
            .print\:border {
                border: 1px solid #d1d5db !important;
            }

            .print\:border-gray-300 {
                border-color: #d1d5db !important;
            }

            .print\:bg-white {
                background-color: white !important;
            }

            .print\:shadow-none {
                box-shadow: none !important;
            }

            /* Aspect ratio adjustments */
            .print\:aspect-auto {
                aspect-ratio: auto !important;
            }

            .print\:h-32 {
                height: 8rem !important;
            }

            .print\:max-h-32 {
                max-height: 8rem !important;
            }

            .print\:object-contain {
                object-fit: contain !important;
            }

            /* Text color adjustments */
            .print\:text-gray-900 {
                color: #111827 !important;
            }

            .print\:text-lg {
                font-size: 1.125rem !important;
            }

            /* Column span adjustments */
            .print\:col-span-1 {
                grid-column: span 1 / span 1 !important;
            }
        }
    </style>

</x-admin-layout>