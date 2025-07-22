<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Daftar Aspirasi UMKM</h2>
    </x-slot>

    <div class="py-6">
        <div class="bg-white shadow p-4 rounded-lg">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2 text-left">UMKM</th>
                        <th class="p-2 text-left">Pesan</th>
                        <th class="p-2 text-left">Status</th>
                        <th class="p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aspirations as $aspiration)
                    <tr class="border-b">
                        <td class="p-2">{{ $aspiration->umkm->name ?? '-' }}</td>
                        <td class="p-2">{{ Str::limit($aspiration->message, 50) }}</td>
                        <td class="p-2">
                            @if ($aspiration->response)
                            <span class="text-green-600 font-semibold">Sudah direspon</span>
                            @else
                            <span class="text-red-600 font-semibold">Belum direspon</span>
                            @endif
                        </td>
                        <td class="p-2 text-center">
                            <a href="{{ route('admin.aspirations.show', $aspiration->id) }}" class="text-blue-600 hover:underline">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $aspirations->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>