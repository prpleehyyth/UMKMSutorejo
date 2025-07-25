<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard Admin</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Statistik -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <x-admin.stat-card title="Total UMKM" :value="$totalUmkm" color="blue" />
                <x-admin.stat-card title="UMKM Terverifikasi" :value="$verifiedUmkm" color="green" />
                <x-admin.stat-card title="Belum Diverifikasi" :value="$unverifiedUmkm" color="yellow" />
                <x-admin.stat-card title="Aspirasi Masuk" :value="$totalAspirations" color="indigo" />
            </div>

            <!-- Shortcut -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="{{ route('admin.umkm.unverified') }}" class="bg-blue-100 hover:bg-blue-200 p-4 rounded-lg shadow text-center">
                    <p class="font-semibold text-blue-800">Verifikasi UMKM</p>
                </a>
                <a href="{{ route('admin.aspirations.index') }}" class="bg-indigo-100 hover:bg-indigo-200 p-4 rounded-lg shadow text-center">
                    <p class="font-semibold text-indigo-800">Kelola Aspirasi</p>
                </a>
                <a href="#" class="bg-green-100 hover:bg-green-200 p-4 rounded-lg shadow text-center">
                    <p class="font-semibold text-green-800">Tambah Admin</p>
                </a>
                <a href="#" class="bg-yellow-100 hover:bg-yellow-200 p-4 rounded-lg shadow text-center">
                    <p class="font-semibold text-yellow-800">Laporan Bulanan</p>
                </a>
            </div>

            <!-- Aspirasi terbaru -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Aspirasi Terbaru</h3>
                @foreach($recentAspirations as $aspiration)
                <div class="border-b py-2">
                    <p class="text-sm text-gray-700">{{ \Illuminate\Support\Str::limit($aspiration->message, 80) }}</p>
                    <p class="text-xs text-gray-400">{{ $aspiration->created_at->diffForHumans() }}</p>
                </div>
                @endforeach
            </div>

            <!-- UMKM terbaru -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">UMKM Terbaru</h3>
                @foreach($latestUmkm as $umkm)
                <div class="border-b py-2">
                    <p class="text-sm font-medium text-gray-700">{{ $umkm->business_name }}</p>
                    <p class="text-xs text-gray-500">oleh {{ $umkm->user->name }}</p>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</x-admin-layout>