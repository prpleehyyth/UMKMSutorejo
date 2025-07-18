<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Detail Aspirasi</h2>
    </x-slot>

    <div class="py-6 px-4 max-w-3xl mx-auto">
        <div class="bg-white p-6 rounded shadow">
            <p><strong>Aspirasi:</strong> {{ $aspiration->message }}</p>
            <p class="mt-4"><strong>Respon:</strong> {{ $aspiration->response ?? 'Belum ada respon' }}</p>
            <p class="text-sm text-gray-500 mt-2">Dikirim: {{ $aspiration->created_at->format('d M Y, H:i') }}</p>
        </div>
    </div>
</x-app-layout>