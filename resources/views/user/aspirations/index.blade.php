<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Daftar Aspirasi</h2>
    </x-slot>

    <div class="py-6 px-4 max-w-4xl mx-auto">
        <a href="{{ route('aspirations.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tulis Aspirasi</a>

        <div class="mt-4">
            @forelse($aspirations as $aspiration)
            <div class="border p-4 mb-3 rounded shadow">
                <p class="text-gray-700"><strong>Aspirasi:</strong> {{ $aspiration->message }}</p>
                <p class="text-green-700"><strong>Respon:</strong> {{ $aspiration->response ?? 'Belum ada respon' }}</p>
                <p class="text-sm text-gray-500">{{ $aspiration->created_at->diffForHumans() }}</p>
            </div>
            @empty
            <p>Belum ada aspirasi dikirim.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>