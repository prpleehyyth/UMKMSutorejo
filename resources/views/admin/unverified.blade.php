<x-admin-layout>
    {{-- Slot header tetap dipertahankan karena bagian dari tata letak, bukan konten utama --}}
    <x-slot name="title">UMKM Belum Diverifikasi</x-slot>
    <x-slot name="header">UMKM Belum Diverifikasi</x-slot>

    {{-- [STYLE APPLIED] Menggunakan container utama dari gaya referensi --}}
    <div class="bg-white rounded-lg shadow-md overflow-hidden">

        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0">
                <div class="flex-1 max-w-md">
                    <form method="GET" action="{{ route('admin.umkm.unverified') }}">
                        <div class="flex">
                            <input type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Cari UMKM..."
                                class="flex-1 px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-r-md hover:bg-blue-700 transition-colors">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
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
                {{-- [STYLE APPLIED] Menggunakan header tabel dari gaya referensi --}}
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
                {{-- [STYLE APPLIED] Menggunakan body dan baris tabel dari gaya referensi --}}
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($umkms as $umkm)
                    <tr class="hover:bg-gray-50 transition-colors">
                        {{-- [STYLE APPLIED] Menambahkan kolom nomor --}}
                        <td class="px-4 py-3 text-sm text-gray-900">
                            {{ method_exists($umkms, 'currentPage') ? (($umkms->currentPage() - 1) * $umkms->perPage() + $loop->iteration) : $loop->iteration }}
                        </td>
                        <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $umkm->name }}</td>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $umkm->user->name ?? '-' }}</td>
                        {{-- [STYLE APPLIED] Menambahkan kolom alamat --}}
                        <td class="px-4 py-3 text-sm text-gray-900">
                            <span title="{{ $umkm->address }}">{{ Str::limit($umkm->address, 30) }}</span>
                        </td>
                        {{-- [STYLE APPLIED] Menambahkan kolom NIB --}}
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $umkm->nib ?? '-' }}</td>
                        {{-- [STYLE APPLIED] Menambahkan kolom status --}}
                        <td class="px-4 py-3 text-sm">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <i class="fas fa-clock mr-1"></i>
                                Pending
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{-- [STYLE APPLIED] Menyesuaikan gaya tombol aksi --}}
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.umkm.show', $umkm->id) }}"
                                    class="inline-flex items-center px-3 py-1 rounded-md text-xs font-medium bg-blue-600 text-white hover:bg-blue-700 transition-colors"
                                    title="Lihat Detail">
                                    <i class="fas fa-eye mr-1"></i>
                                    Detail
                                </a>

                                <form action="{{ route('admin.umkm.verify', $umkm->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin memverifikasi UMKM {{ $umkm->name }}?')">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="inline-flex items-center px-3 py-1 rounded-md text-xs font-medium bg-green-600 text-white hover:bg-green-700 transition-colors"
                                        title="Verifikasi UMKM">
                                        <i class="fas fa-check mr-1"></i>
                                        Verifikasi
                                    </button>
                                </form>

                                <form action="{{ route('admin.umkm.destroy', $umkm->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Yakin ingin menolak dan menghapus UMKM {{ $umkm->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center px-3 py-1 rounded-md text-xs font-medium bg-red-600 text-white hover:bg-red-700 transition-colors"
                                        title="Tolak & Hapus Data">
                                        <i class="fas fa-trash mr-1"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    {{-- [STYLE APPLIED] Menggunakan tampilan 'empty' dari referensi --}}
                    <tr>
                        <td colspan="7" class="px-4 py-8 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-500">
                                <i class="fas fa-check-circle text-4xl mb-2 text-green-500"></i>
                                <p class="text-lg font-medium">Tidak ada UMKM yang perlu diverifikasi</p>
                                <p class="text-sm">Semua UMKM yang mendaftar sudah diproses.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($umkms, 'hasPages') && $umkms->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
            {{ $umkms->links() }}
        </div>
        @endif
    </div>

</x-admin-layout>