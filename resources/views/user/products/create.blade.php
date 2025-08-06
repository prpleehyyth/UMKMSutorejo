<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <!-- Header -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Informasi Produk</h3>
                        <p class="mt-1 text-sm text-gray-600">Lengkapi data produk yang akan ditambahkan</p>
                    </div>

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Nama Produk -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Produk <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                id="name"
                                name="name"
                                class="block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                placeholder="Masukkan nama produk"
                                value="{{ old('name') }}"
                                required>
                            @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Deskripsi <span class="text-red-500">*</span>
                            </label>

                            {{-- [FIXED] Atribut placeholder diletakkan dengan benar dan old() hanya dipanggil sekali --}}
                            <textarea id="description"
                                name="description"
                                rows="4"
                                class="block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                placeholder="Masukkan deskripsi produk"
                                required>{{ old('description') }}</textarea>

                            @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Harga Estimasi -->
                        <div>
                            <label for="estimated_price" class="block text-sm font-medium text-gray-700 mb-2">
                                Harga <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 text-sm">Rp</span>
                                </div>
                                <input type="number"
                                    id="estimated_price"
                                    name="estimated_price"
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    placeholder="0"
                                    min="0"
                                    step="1000"
                                    value="{{ old('estimated_price') }}">
                            </div>
                            @error('estimated_price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Upload Gambar -->
                        <div>
                            <label for="image_url" class="block text-sm font-medium text-gray-700 mb-2">
                                Gambar Produk
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-gray-400 transition duration-200">
                                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <div class="text-sm text-gray-600">
                                    <label for="image_url" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span>Upload gambar</span>
                                        <input id="image_url" name="image_url" type="file" class="sr-only" accept="image/*" onchange="previewImage(this)">
                                    </label>
                                    <p class="pl-1 inline">atau drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF hingga 2MB</p>
                            </div>
                            <!-- Image Preview -->
                            <div id="imagePreview" class="mt-4 hidden">
                                <img id="preview" src="#" alt="Preview" class="h-32 w-32 object-cover rounded-lg border border-gray-300">
                                <button type="button" onclick="removeImage()" class="mt-2 text-sm text-red-600 hover:text-red-800">Hapus gambar</button>
                            </div>
                            @error('image_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                            <a href="{{ route('products.index') }}"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                                </svg>
                                Kembali
                            </a>

                            <button type="submit"
                                class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Simpan Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Image Preview -->
    <script>
        function previewImage(input) {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                    document.getElementById('imagePreview').classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            document.getElementById('image_url').value = '';
            document.getElementById('imagePreview').classList.add('hidden');
        }

        // Format number input for price
        document.getElementById('estimated_price').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value) {
                e.target.value = parseInt(value);
            }
        });
    </script>
</x-app-layout>