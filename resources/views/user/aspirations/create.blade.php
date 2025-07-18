<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Tulis Aspirasi</h2>
    </x-slot>

    <div class="py-6 px-4 max-w-2xl mx-auto">
        <form action="{{ route('aspirations.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium">Aspirasi Anda</label>
                <textarea name="message" rows="5" class="mt-1 block w-full border-gray-300 rounded" required></textarea>
                @error('message')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Kirim</button>
        </form>
    </div>
</x-app-layout>