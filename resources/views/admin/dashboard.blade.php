<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard Admin</h2>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-500">{{ now()->timezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB</span>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if($unverifiedUmkm > 10)
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-yellow-700">
                            Ada {{ $unverifiedUmkm }} UMKM yang menunggu verifikasi.
                            <a href="{{ route('admin.umkm.unverified') }}" class="font-medium underline text-yellow-700 hover:text-yellow-600">
                                Verifikasi sekarang
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            @endif

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-6 shadow-md">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-600 text-sm font-medium">Total UMKM</p>
                            <p class="text-2xl font-bold text-blue-800">{{ $totalUmkm }}</p>
                        </div>
                        <div class="bg-blue-200 p-3 rounded-full">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-6 shadow-md">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-600 text-sm font-medium">UMKM Terverifikasi</p>
                            <p class="text-2xl font-bold text-green-800">{{ $verifiedUmkm }}</p>
                            @if($totalUmkm > 0)
                            <p class="text-xs text-green-600 mt-1">{{ round(($verifiedUmkm / $totalUmkm) * 100, 1) }}% dari total</p>
                            @endif
                        </div>
                        <div class="bg-green-200 p-3 rounded-full">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-lg p-6 shadow-md {{ $unverifiedUmkm > 5 ? 'ring-2 ring-yellow-400 ring-opacity-50' : '' }}">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-yellow-600 text-sm font-medium">Belum Diverifikasi</p>
                            <p class="text-2xl font-bold text-yellow-800">{{ $unverifiedUmkm }}</p>
                            @if($unverifiedUmkm > 5)
                            <p class="text-xs text-yellow-700 mt-1">Perlu perhatian!</p>
                            @endif
                        </div>
                        <div class="bg-yellow-200 p-3 rounded-full">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-lg p-6 shadow-md">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-indigo-600 text-sm font-medium">Aspirasi Masuk</p>
                            <p class="text-2xl font-bold text-indigo-800">{{ $totalAspirations }}</p>
                        </div>
                        <div class="bg-indigo-200 p-3 rounded-full">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a href="{{ route('admin.umkm.unverified') }}" class="bg-gradient-to-br from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200 p-4 rounded-lg shadow-md text-center transition-all duration-200 transform hover:scale-105">
                    <div class="flex justify-center mb-2">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="font-semibold text-blue-800 text-sm">Verifikasi UMKM</p>
                    @if($unverifiedUmkm > 0)
                    <span class="inline-block bg-red-500 text-white text-xs px-2 py-1 rounded-full mt-1">{{ $unverifiedUmkm }}</span>
                    @endif
                </a>

                <a href="{{ route('admin.aspirations.index') }}" class="bg-gradient-to-br from-indigo-50 to-indigo-100 hover:from-indigo-100 hover:to-indigo-200 p-4 rounded-lg shadow-md text-center transition-all duration-200 transform hover:scale-105">
                    <div class="flex justify-center mb-2">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                    <p class="font-semibold text-indigo-800 text-sm">Kelola Aspirasi</p>
                </a>
            </div>


            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                    <div class="px-6 py-4 bg-gradient-to-r from-indigo-500 to-purple-600">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-white">Aspirasi Terbaru</h3>
                            <div class="flex space-x-2">
                                <span class="bg-white bg-opacity-20 text-white text-xs px-2 py-1 rounded-full">{{ count($recentAspirations) }} item</span>
                            </div>
                        </div>
                    </div>
                    <div class="max-h-96 overflow-y-auto">
                        @forelse($recentAspirations as $aspiration)
                        <div class="px-6 py-4 border-b border-gray-100 hover:bg-gray-50 transition-colors duration-150">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <p class="text-sm text-gray-700 mb-2 leading-relaxed">{{ \Illuminate\Support\Str::limit($aspiration->message, 120) }}</p>
                                    <div class="flex items-center space-x-4 text-xs text-gray-500">
                                        <span class="flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                            </svg>
                                            Anonim
                                        </span>
                                        <span class="flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $aspiration->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <span class="inline-block w-2 h-2 bg-green-500 rounded-full"></span>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="px-6 py-8 text-center text-gray-500">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            <p class="mt-2 text-sm font-medium">Belum ada aspirasi masuk</p>
                            <p class="text-xs text-gray-400">Aspirasi dari masyarakat akan muncul di sini</p>
                        </div>
                        @endforelse
                    </div>
                    @if(count($recentAspirations) > 0)
                    <div class="px-6 py-3 bg-gray-50 border-t border-gray-200">
                        <a href="{{ route('admin.aspirations.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                            Lihat semua aspirasi →
                        </a>
                    </div>
                    @endif
                </div>

                <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                    <div class="px-6 py-4 bg-gradient-to-r from-blue-500 to-cyan-600">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-white">UMKM Terbaru</h3>
                            <div class="flex space-x-2">
                                <span class="bg-white bg-opacity-20 text-white text-xs px-2 py-1 rounded-full">{{ count($latestUmkm) }} item</span>
                            </div>
                        </div>
                    </div>
                    <div class="max-h-96 overflow-y-auto">
                        @forelse($latestUmkm as $umkm)
                        <div class="px-6 py-4 border-b border-gray-100 hover:bg-gray-50 transition-colors duration-150">
                            <div class="flex justify-between items-center">
                                <div class="flex-1">
                                    <div class="flex items-center space-x-2 mb-1">
                                        <p class="text-sm font-medium text-gray-800">{{ $umkm->business_name }}</p>
                                        @if(isset($umkm->is_verified) && $umkm->is_verified)
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-green-100 text-green-800">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            Terverifikasi
                                        </span>
                                        @else
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-yellow-100 text-yellow-800">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                            </svg>
                                            Menunggu
                                        </span>
                                        @endif
                                    </div>
                                    <div class="flex items-center space-x-4 text-xs text-gray-500">
                                        <span class="flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                            </svg>
                                            oleh {{ $umkm->user->name }}
                                        </span>
                                        <span class="flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $umkm->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex space-x-2 ml-4">
                                    <button class="text-blue-600 hover:text-blue-800 p-1 rounded transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>
                                    @if(!isset($umkm->is_verified) || !$umkm->is_verified)
                                    <button class="text-green-600 hover:text-green-800 p-1 rounded transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="px-6 py-8 text-center text-gray-500">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <p class="mt-2 text-sm font-medium">Belum ada UMKM terdaftar</p>
                            <p class="text-xs text-gray-400">UMKM yang mendaftar akan muncul di sini</p>
                        </div>
                        @endforelse
                    </div>
                    @if(count($latestUmkm) > 0)
                    <div class="px-6 py-3 bg-gray-50 border-t border-gray-200">
                        <a href="{{ route('admin.umkm.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                            Lihat semua UMKM →
                        </a>
                    </div>
                    @endif
                </div>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900">{{ round(($totalUmkm > 0 ? ($verifiedUmkm / $totalUmkm) : 0) * 100, 1) }}%</div>
                        <div class="text-sm text-gray-500">Tingkat Verifikasi</div>
                        <div class="mt-2 w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full transition-all duration-500" style="width: {{ $totalUmkm > 0 ? round(($verifiedUmkm / $totalUmkm) * 100, 1) : 0 }}%"></div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900">{{ count($recentAspirations) }}</div>
                        <div class="text-sm text-gray-500">Aspirasi Baru Hari Ini</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900">{{ count($latestUmkm) }}</div>
                        <div class="text-sm text-gray-500">UMKM Baru Terdaftar</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('styles')
    <style>
        /* Custom scrollbar */
        .overflow-y-auto::-webkit-scrollbar {
            width: 4px;
        }

        .overflow-y-auto::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 2px;
        }

        .overflow-y-auto::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 2px;
        }

        .overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Smooth transitions */
        .transition-all {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Hover effects */
        .transform:hover {
            transform: translateY(-2px);
        }
    </style>
    @endpush
</x-admin-layout>