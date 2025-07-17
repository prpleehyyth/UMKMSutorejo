<x-admin-layout>
    <x-slot name="title">Data UMKM</x-slot>
    <x-slot name="header">Data UMKM</x-slot>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">


        <!-- Search and Filter Section -->
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0">
                <div class="flex-1 max-w-md">
                    <form method="GET" action="{{ route('admin.umkm.index') }}" class="flex">
                        <input type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari UMKM..."
                            class="flex-1 px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-r-md hover:bg-blue-700 transition-colors">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600">
                        Total: {{ method_exists($umkms, 'total') ? $umkms->total() : $umkms->count() }} UMKM
                    </span>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-blue-800 text-white">
                        <th class="px-4 py-3 text-left text-sm font-medium uppercase tracking-wider">#</th>
                        <th class="px-4 py-3 text-left text-sm font-medium uppercase tracking-wider">Nama UMKM</th>
                        <th class="px-4 py-3 text-left text-sm font-medium uppercase tracking-wider">Pemilik</th>
                        <th class="px-4 py-3 text-left text-sm font-medium uppercase tracking-wider">Alamat</th>
                        <th class="px-4 py-3 text-left text-sm font-medium uppercase tracking-wider">NIB</th>
                        <th class="px-4 py-3 text-left text-sm font-medium uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-sm font-medium uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($umkms as $index => $umkm)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 text-sm text-gray-900">
                            {{ method_exists($umkms, 'currentPage') ? (($umkms->currentPage() - 1) * $umkms->perPage() + $loop->iteration) : $loop->iteration }}
                        </td>
                        <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $umkm->name }}</td>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $umkm->user->name ?? '-' }}</td>
                        <td class="px-4 py-3 text-sm text-gray-900">
                            <span title="{{ $umkm->address }}">{{ Str::limit($umkm->address, 50) }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $umkm->nib ?? '-' }}</td>
                        <td class="px-4 py-3 text-sm">
                            @if($umkm->is_verified ?? false)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i>
                                Terverifikasi
                            </span>
                            @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <i class="fas fa-clock mr-1"></i>
                                Pending
                            </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.umkm.show', $umkm->id) }}"
                                    class="inline-flex items-center px-3 py-1 rounded-md text-xs font-medium bg-blue-600 text-white hover:bg-blue-700 transition-colors"
                                    title="Lihat Detail">
                                    <i class="fas fa-eye mr-1"></i>
                                    Detail
                                </a>

                                <form action="{{ route('admin.umkm.destroy', $umkm->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Yakin ingin menghapus UMKM {{ $umkm->name }}? Data yang dihapus tidak dapat dikembalikan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center px-3 py-1 rounded-md text-xs font-medium bg-red-600 text-white hover:bg-red-700 transition-colors"
                                        title="Hapus Data">
                                        <i class="fas fa-trash mr-1"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-8 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-500">
                                <i class="fas fa-database text-4xl mb-2"></i>
                                @if(request('search'))
                                <p class="text-lg font-medium">Tidak ada UMKM yang ditemukan</p>
                                <p class="text-sm">Coba gunakan kata kunci pencarian yang berbeda</p>
                                <a href="{{ route('admin.umkm.index') }}" class="mt-2 text-blue-600 hover:text-blue-800">
                                    Lihat semua UMKM
                                </a>
                                @else
                                <p class="text-lg font-medium">Belum ada UMKM yang diverifikasi</p>
                                <p class="text-sm">Data UMKM akan muncul setelah proses verifikasi</p>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if(method_exists($umkms, 'hasPages') && $umkms->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="flex items-center text-sm text-gray-700 mb-2 md:mb-0">
                    Menampilkan {{ $umkms->firstItem() }} - {{ $umkms->lastItem() }} dari {{ $umkms->total() }} data
                </div>
                <div class="flex items-center space-x-2">
                    {{-- Previous Page Link --}}
                    @if ($umkms->onFirstPage())
                    <span class="px-3 py-1 text-sm text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">
                        <i class="fas fa-chevron-left mr-1"></i>
                        Sebelumnya
                    </span>
                    @else
                    <a href="{{ $umkms->previousPageUrl() }}"
                        class="px-3 py-1 text-sm text-gray-600 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                        <i class="fas fa-chevron-left mr-1"></i>
                        Sebelumnya
                    </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($umkms->getUrlRange(1, $umkms->lastPage()) as $page => $url)
                    @if ($page == $umkms->currentPage())
                    <span class="px-3 py-1 text-sm font-medium text-white bg-blue-600 rounded-md">
                        {{ $page }}
                    </span>
                    @else
                    <a href="{{ $url }}"
                        class="px-3 py-1 text-sm text-gray-600 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                        {{ $page }}
                    </a>
                    @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($umkms->hasMorePages())
                    <a href="{{ $umkms->nextPageUrl() }}"
                        class="px-3 py-1 text-sm text-gray-600 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                        Selanjutnya
                        <i class="fas fa-chevron-right ml-1"></i>
                    </a>
                    @else
                    <span class="px-3 py-1 text-sm text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">
                        Selanjutnya
                        <i class="fas fa-chevron-right ml-1"></i>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        @endif
    </div>

</x-admin-layout>