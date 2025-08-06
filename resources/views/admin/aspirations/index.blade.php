<x-admin-layout>
    <x-slot name="title">Daftar Aspirasi UMKM</x-slot>
    <x-slot name="header">Daftar Aspirasi UMKM</x-slot>

    {{-- [STYLE APPLIED] Menggunakan satu container utama seperti referensi --}}
    <div class="bg-white rounded-lg shadow-md overflow-hidden">

        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
            <form method="GET" action="{{ route('admin.aspirations.index') }}">
                <div class="flex flex-col md:flex-row md:items-end md:justify-between space-y-3 md:space-y-0 md:space-x-4">
                    {{-- Search Input --}}
                    <div class="flex-grow">
                        <label for="search" class="sr-only">Cari</label>
                        <div class="flex">
                            <input type="text"
                                name="search"
                                id="search"
                                value="{{ request('search') }}"
                                placeholder="Cari berdasarkan UMKM atau pesan..."
                                class="flex-1 px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </div>
                    {{-- Status Filter --}}
                    <div class="w-full md:w-auto">
                        <label for="status" class="sr-only">Status</label>
                        <select name="status" id="status"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Semua Status</option>
                            <option value="responded" {{ request('status') == 'responded' ? 'selected' : '' }}>Sudah Direspon</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Belum Direspon</option>
                        </select>
                    </div>
                    {{-- Action Buttons --}}
                    <div class="flex space-x-2">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                            Filter
                        </button>
                        @if(request()->hasAny(['search', 'status']))
                        <a href="{{ route('admin.aspirations.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition-colors">
                            Reset
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                {{-- [STYLE APPLIED] Menggunakan header tabel dari gaya referensi --}}
                <thead>
                    <tr class="bg-blue-800 text-white">
                        <th class="px-4 py-3 text-left text-sm font-medium uppercase tracking-wider">#</th>
                        <th class="px-4 py-3 text-left text-sm font-medium uppercase tracking-wider">UMKM</th>
                        <th class="px-4 py-3 text-left text-sm font-medium uppercase tracking-wider">Aspirasi</th>
                        <th class="px-4 py-3 text-left text-sm font-medium uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-3 text-left text-sm font-medium uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-sm font-medium uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                {{-- [STYLE APPLIED] Menggunakan body dan baris tabel dari gaya referensi --}}
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($aspirations as $aspiration)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 text-sm text-gray-900">
                            {{ ($aspirations->currentPage() - 1) * $aspirations->perPage() + $loop->iteration }}
                        </td>
                        <td class="px-4 py-3 text-sm font-medium text-gray-900">
                            {{ $aspiration->umkm->name ?? 'UMKM Dihapus' }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900">
                            <span title="{{ $aspiration->message }}">
                                {{ Str::limit($aspiration->message, 50) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900">
                            {{ $aspiration->created_at->isoFormat('D MMM YYYY, HH:mm') }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{-- [STYLE APPLIED] Menggunakan gaya status badge dari referensi --}}
                            @if ($aspiration->response)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i>
                                Sudah Direspon
                            </span>
                            @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <i class="fas fa-clock mr-1"></i>
                                Belum Direspon
                            </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{-- [STYLE APPLIED] Menggunakan gaya tombol aksi dari referensi --}}
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.aspirations.show', $aspiration->id) }}"
                                    class="inline-flex items-center px-3 py-1 rounded-md text-xs font-medium bg-blue-600 text-white hover:bg-blue-700 transition-colors"
                                    title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>


                                <form action="{{ route('admin.aspirations.destroy', $aspiration->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus aspirasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center px-3 py-1 rounded-md text-xs font-medium bg-red-600 text-white hover:bg-red-700 transition-colors"
                                        title="Hapus Aspirasi">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    {{-- [STYLE APPLIED] Menggunakan tampilan 'empty' dari referensi --}}
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-500">
                                <i class="fas fa-comment-slash text-4xl mb-2"></i>
                                @if(request()->hasAny(['search', 'status']))
                                <p class="text-lg font-medium">Tidak ada aspirasi yang cocok</p>
                                <p class="text-sm">Silakan coba dengan kata kunci atau filter lain.</p>
                                @else
                                <p class="text-lg font-medium">Belum ada aspirasi yang masuk</p>
                                <p class="text-sm">Data aspirasi dari UMKM akan ditampilkan di sini.</p>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($aspirations->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="flex items-center text-sm text-gray-700 mb-2 md:mb-0">
                    Menampilkan {{ $aspirations->firstItem() }} - {{ $aspirations->lastItem() }} dari {{ $aspirations->total() }} data
                </div>
                <div class="flex items-center space-x-2">
                    {{-- Previous Page Link --}}
                    @if ($aspirations->onFirstPage())
                    <span class="px-3 py-1 text-sm text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                    @else
                    <a href="{{ $aspirations->previousPageUrl() }}"
                        class="px-3 py-1 text-sm text-gray-600 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($aspirations->getUrlRange(1, $aspirations->lastPage()) as $page => $url)
                    @if ($page == $aspirations->currentPage())
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
                    @if ($aspirations->hasMorePages())
                    <a href="{{ $aspirations->nextPageUrl() }}"
                        class="px-3 py-1 text-sm text-gray-600 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    @else
                    <span class="px-3 py-1 text-sm text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        @endif
    </div>

    @push('scripts')
    <script>
        // Auto-submit form on select change for easier filtering
        document.getElementById('status').addEventListener('change', function() {
            this.form.submit();
        });
    </script>
    @endpush
</x-admin-layout>