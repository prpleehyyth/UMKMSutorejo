<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Detail Aspirasi</h2>
    </x-slot>

    <div class="py-6">
        <div class="bg-white shadow p-6 rounded-lg">
            <p><strong>UMKM:</strong> {{ $aspiration->umkm->name ?? '-' }}</p>
            <p><strong>Pengirim:</strong> {{ $aspiration->umkm->user->name ?? '-' }}</p>
            <p class="mt-4"><strong>Pesan:</strong></p>
            <p class="border p-3 rounded mt-1">{{ $aspiration->message }}</p>

            <form method="POST" action="{{ route('admin.aspirations.respond', $aspiration->id) }}" class="mt-6 space-y-4">
                @csrf
                <label for="response" class="block font-medium text-sm text-gray-700">Respon:</label>
                <textarea name="response" rows="5" class="w-full rounded border-gray-300">{{ old('response', $aspiration->response) }}</textarea>
                @error('response') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Simpan Respon
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>