<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Dashboard</h2>
    </x-slot>

    <div class="py-6 px-4 max-w-7xl mx-auto">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <h3 class="text-lg font-bold mb-4">Profil UMKM</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                <!-- User Information -->
                <div class="space-y-2">
                    <h4 class="font-semibold text-gray-700 mb-3">Informasi Pemilik</h4>
                    <p><strong>Nama Pemilik:</strong> {{ $user->name ?? 'N/A' }}</p>
                    <p><strong>Email:</strong> {{ $user->email ?? 'N/A' }}</p>
                    <p><strong>No HP:</strong> {{ $user->phone_number ?? 'N/A' }}</p>
                    <p><strong>NIK:</strong> {{ $user->nik ?? 'N/A' }}</p>
                    <p><strong>NPWP:</strong> {{ $user->npwp ?? 'N/A' }}</p>
                </div>

                <!-- UMKM Information -->
                <div class="space-y-2">
                    <h4 class="font-semibold text-gray-700 mb-3">Informasi Usaha</h4>

                    @if($umkm)
                    @if ($umkm->logo)
                    <div class="mb-4">
                        <p><strong>Logo Usaha:</strong></p>
                        <img src="{{ asset('storage/' . $umkm->logo) }}"
                            alt="Logo {{ $umkm->name }}"
                            class="w-32 h-32 object-contain mt-2 border rounded shadow-sm">
                    </div>
                    @endif

                    <p><strong>Nama Usaha:</strong> {{ $umkm->name }}</p>
                    <p><strong>Deskripsi:</strong> {{ $umkm->description ?? 'Belum ada deskripsi' }}</p>
                    <p><strong>Alamat:</strong> {{ $umkm->address ?? 'Belum ada alamat' }}</p>
                    <p><strong>NIB:</strong> {{ $umkm->nib ?? 'Belum ada NIB' }}</p>
                    <p><strong>Pendapatan:</strong>
                        @if($umkm->revenue)
                        Rp {{ number_format($umkm->revenue, 0, ',', '.') }}
                        @else
                        Belum ada data pendapatan
                        @endif
                    </p>
                    <p><strong>Nomor Surat Halal:</strong> {{ $umkm->halal_certified ?? 'Belum bersertifikat halal' }}</p>
                    @else
                    <div class="text-center py-8">
                        <p class="text-gray-500 mb-4">Belum ada data UMKM.</p>
                        <a href="{{ route('user.umkm.create') }}"
                            class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition-colors">
                            Tambah Data UMKM
                        </a>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex gap-3">
                @if($umkm)
                <a href="{{ route('user.umkm.edit', $umkm->id) }}"
                    class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">
                    Edit Data UMKM
                </a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>