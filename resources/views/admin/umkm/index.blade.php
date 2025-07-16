<x-admin-layout>
    <x-slot name="title">Data UMKM</x-slot>
    <x-slot name="header">Data UMKM</x-slot>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Daftar UMKM</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase">
                    <tr>
                        <th class="py-2 px-4">#</th>
                        <th class="py-2 px-4">Nama Usaha</th>
                        <th class="py-2 px-4">Pemilik</th>
                        <th class="py-2 px-4">Jenis Usaha</th>
                        <th class="py-2 px-4">Omzet</th>
                        <th class="py-2 px-4">Verifikasi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($umkms as $umkm)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4">{{ $umkm->name }}</td>
                        <td class="py-2 px-4">{{ $umkm->user->name }}</td>
                        <td class="py-2 px-4">{{ $umkm->business_type }}</td>
                        <td class="py-2 px-4">Rp {{ number_format($umkm->revenue, 0, ',', '.') }}</td>
                        <td class="py-2 px-4">
                            @if ($umkm->is_verified)
                            <span class="text-green-600 font-semibold">Terverifikasi</span>
                            @else
                            <span class="text-yellow-600 font-semibold">Belum</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-4 px-4 text-center text-gray-500">Belum ada data UMKM</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>