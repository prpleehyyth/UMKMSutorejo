<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-2 rounded-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                    Detail Aspirasi
                </h2>
                <p class="text-sm text-gray-500 mt-1">Kelola dan tanggapi aspirasi dari UMKM</p>
            </div>
        </div>
    </x-slot>

    <div class="py-6 space-y-6">
        <!-- Main Content Card -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-100 p-2 rounded-lg">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Informasi Aspirasi</h3>
                </div>
            </div>

            <div class="p-6 space-y-6">
                <!-- UMKM Information Section -->
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- UMKM Details -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-5 border border-blue-100">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="bg-blue-500 p-2 rounded-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"></path>
                                </svg>
                            </div>
                            <h4 class="font-semibold text-gray-800">UMKM</h4>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="bg-gradient-to-r from-blue-500 to-purple-500 w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                {{ strtoupper(substr($aspiration->umkm->name ?? 'N/A', 0, 2)) }}
                            </div>
                            <div>
                                <p class="text-gray-900 font-medium text-lg">{{ $aspiration->umkm->name ?? '-' }}</p>
                                <p class="text-gray-600 text-sm">Usaha Mikro Kecil Menengah</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sender Details -->
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-5 border border-green-100">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="bg-green-500 p-2 rounded-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h4 class="font-semibold text-gray-800">Pengirim</h4>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="bg-gray-200 w-12 h-12 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-900 font-medium text-lg">{{ $aspiration->umkm->user->name ?? '-' }}</p>
                                <p class="text-gray-600 text-sm">Pemilik UMKM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Message Section -->
                <div class="bg-gradient-to-br from-orange-50 to-yellow-50 rounded-xl p-6 border border-orange-100">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="bg-orange-500 p-2 rounded-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-800">Pesan Aspirasi</h4>
                    </div>
                    <div class="bg-white rounded-lg p-4 border border-orange-200 shadow-sm">
                        <div class="prose prose-gray max-w-none">
                            <p class="text-gray-800 leading-relaxed whitespace-pre-wrap">{{ $aspiration->message }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Response Form Card -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-6 py-4 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="bg-purple-500 p-2 rounded-lg">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Berikan Respon</h3>
                </div>
            </div>

            <div class="p-6">
                <form method="POST" action="{{ route('admin.aspirations.respond', $aspiration->id) }}" class="space-y-6">
                    @csrf

                    <!-- Response Textarea -->
                    <div class="space-y-2">
                        <label for="response" class="flex items-center space-x-2 text-sm font-semibold text-gray-700">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            <span>Respon Anda</span>
                        </label>

                        <div class="relative">
                            <textarea
                                name="response"
                                id="response"
                                rows="6"
                                placeholder="Tulis respon Anda untuk aspirasi ini..."
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 transition-all duration-200 resize-none bg-gray-50 hover:bg-white focus:bg-white p-4">{{ old('response', $aspiration->response) }}</textarea>

                            <!-- Character counter -->
                            <div class="absolute bottom-3 right-3 text-xs text-gray-400" id="char-counter">
                                0 karakter
                            </div>
                        </div>

                        @error('response')
                        <div class="flex items-center space-x-2 text-red-600 text-sm bg-red-50 p-3 rounded-lg border border-red-200">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <div class="text-sm text-gray-500">
                            <span class="inline-flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Respon akan dikirim ke pemilik UMKM
                            </span>
                        </div>

                        <div class="flex items-center space-x-3">
                            <button type="button" onclick="history.back()"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-1">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Kembali
                            </button>

                            <button type="submit"
                                class="inline-flex items-center px-6 py-2 text-sm font-medium text-white bg-gradient-to-r from-purple-500 to-pink-600 hover:from-purple-600 hover:to-pink-700 rounded-lg transition-all duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-1 shadow-lg hover:shadow-xl">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                Kirim Respon
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Enhanced JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const textarea = document.getElementById('response');
            const charCounter = document.getElementById('char-counter');

            // Character counter functionality
            function updateCharCounter() {
                const count = textarea.value.length;
                charCounter.textContent = `${count} karakter`;

                if (count > 500) {
                    charCounter.classList.add('text-red-500');
                    charCounter.classList.remove('text-gray-400');
                } else {
                    charCounter.classList.add('text-gray-400');
                    charCounter.classList.remove('text-red-500');
                }
            }

            // Initialize counter
            updateCharCounter();

            // Update counter on input
            textarea.addEventListener('input', updateCharCounter);

            // Auto-resize textarea
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = Math.min(this.scrollHeight, 200) + 'px';
            });

            // Add smooth focus animation
            textarea.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.01)';
                this.parentElement.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.1)';
            });

            textarea.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
                this.parentElement.style.boxShadow = 'none';
            });
        });

        // Add fade-in animation for cards
        document.querySelectorAll('.bg-white').forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            setTimeout(() => {
                card.style.transition = 'all 0.5s ease-out';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    </script>

    <!-- Additional CSS for enhanced animations -->
    <style>
        .prose p {
            margin-bottom: 0;
        }

        textarea {
            transition: all 0.2s ease-in-out;
        }

        button:hover {
            transform: translateY(-1px);
        }

        .bg-gradient-to-br {
            position: relative;
            overflow: hidden;
        }

        .bg-gradient-to-br::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            transform: rotate(45deg);
            transition: all 0.3s ease;
            opacity: 0;
        }

        .bg-gradient-to-br:hover::before {
            opacity: 1;
            animation: shimmer 1.5s ease-out;
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%) translateY(-100%) rotate(45deg);
            }

            100% {
                transform: translateX(100%) translateY(100%) rotate(45deg);
            }
        }
    </style>
</x-admin-layout>