<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Aspirasi') }}
            </h2>
            <div class="text-sm text-gray-500">
                {{ $aspirations->count() }} aspirasi total
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <!-- Action Button -->
            <div class="mb-6">
                <a href="{{ route('aspirations.create') }}"
                    class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200 shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                    </svg>
                    Tulis Aspirasi
                </a>
            </div>

            <!-- Aspirations List -->
            <div class="space-y-4">
                @forelse($aspirations as $aspiration)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition duration-200">
                    <div class="p-6">
                        <!-- Header with Status -->
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm text-gray-500">
                                        {{ $aspiration->created_at->format('d M Y, H:i') }}
                                    </p>
                                    <p class="text-xs text-gray-400">
                                        {{ $aspiration->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>

                            <!-- Status Badge -->
                            @if($aspiration->response)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Sudah Direspon
                            </span>
                            @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                </svg>
                                Menunggu Respon
                            </span>
                            @endif
                        </div>

                        <!-- Aspiration Message -->
                        <div class="mb-4">
                            <h3 class="text-sm font-medium text-gray-700 mb-2">Aspirasi:</h3>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-gray-800 leading-relaxed mb-2">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($aspiration->message), 150, '...') }}
                                </p>

                                <a href="{{ route('aspirations.show', $aspiration->id) }}"
                                    class="inline-block text-sm text-blue-600 hover:underline">
                                    Lihat Selengkapnya
                                </a>

                            </div>
                        </div>

                        <!-- Response -->
                        <div class="border-t border-gray-100 pt-4">
                            <h3 class="text-sm font-medium text-gray-700 mb-2">Respon:</h3>
                            @if($aspiration->response)
                            <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-r-lg">
                                <p class="text-green-800 leading-relaxed">{{ $aspiration->response }}</p>
                            </div>
                            @else
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r-lg">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-yellow-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                    </svg>
                                    <p class="text-yellow-800 text-sm">Aspirasi Anda sedang dalam proses peninjauan. Mohon tunggu respon dari tim terkait.</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <!-- Empty State -->
                <div class="text-center py-12">
                    <div class="max-w-md mx-auto">
                        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-gray-100 mb-4">
                            <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada aspirasi</h3>
                        <p class="text-gray-500 mb-6">Mulai dengan menulis aspirasi pertama Anda untuk menyampaikan ide atau saran.</p>
                        <a href="{{ route('aspirations.create') }}"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                            Tulis Aspirasi Pertama
                        </a>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Pagination (jika diperlukan) -->
            @if(method_exists($aspirations, 'hasPages') && $aspirations->hasPages())
            <div class="mt-8">
                {{ $aspirations->links() }}
            </div>
            @endif
        </div>
    </div>
</x-app-layout>