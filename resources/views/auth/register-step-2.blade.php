<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-50 flex items-center justify-center px-4">
        <div class="w-full max-w-lg p-8 bg-white rounded-2xl shadow-xl">
            <h2 class="text-2xl font-bold text-center text-blue-800 mb-2">Langkah 2: Data UMKM</h2>
            <p class="text-center text-gray-500 mb-6">Lengkapi data usaha Anda dengan benar.</p>

            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.step2') }}">
                @csrf

                {{-- Nama Usaha --}}
                <div class="mb-4">
                    <x-input-label for="name" value="Nama Usaha" />
                    <x-text-input id="name" name="name" type="text" class="block w-full mt-1" value="{{ old('name') }}" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- NIB --}}
                <div class="mb-4">
                    <x-input-label for="nib" value="NIB (Nomor Induk Berusaha)" />
                    <x-text-input id="nib" name="nib" type="text" class="block w-full mt-1" value="{{ old('nib') }}" />
                    <x-input-error :messages="$errors->get('nib')" class="mt-2" />
                </div>

                {{-- Alamat Usaha --}}
                <div class="mb-4">
                    <x-input-label for="address" value="Alamat Usaha" />
                    <textarea id="address" name="address" rows="3" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>{{ old('address') }}</textarea>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                {{-- Jenis Usaha --}}
                <div class="mb-4">
                    <x-input-label for="business_type_id" value="Jenis Usaha" />
                    <select id="business_type_id" name="business_type_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">-- Pilih Jenis Usaha --</option>
                        @foreach ($businessTypes as $type)
                            <option value="{{ $type->id }}" {{ old('business_type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('business_type_id')" class="mt-2" />
                </div>

                {{-- Omzet --}}
                <div class="mb-4">
                    <x-input-label for="revenue" value="Omzet per Bulan" />
                    <x-text-input id="revenue" name="revenue" type="text" class="block w-full mt-1" value="{{ old('revenue') }}" placeholder="Contoh: Rp 5.000.000" />
                    <x-input-error :messages="$errors->get('revenue')" class="mt-2" />
                </div>

                {{-- Sertifikat Halal --}}
                <div class="mb-4">
                    <x-input-label for="halal_certified" value="Nomor Sertifikat Halal (Opsional)" />
                    <x-text-input id="halal_certified" name="halal_certified" type="text" class="block w-full mt-1" value="{{ old('halal_certified') }}"/>
                    <x-input-error :messages="$errors->get('halal_certified')" class="mt-2" />
                </div>

                {{-- Google Maps --}}
                <div class="mb-6">
                    <x-input-label for="google_maps_link" value="Link Google Maps (Opsional)" />
                    <x-text-input id="google_maps_link" name="google_maps_link" type="text" class="block w-full mt-1" value="{{ old('google_maps_link') }}" placeholder="https://goo.gl/maps/xyz123" />
                    <x-input-error :messages="$errors->get('google_maps_link')" class="mt-2" />
                </div>

                {{-- Tombol --}}
                <div>
                    <x-primary-button class="w-full justify-center bg-blue-600 hover:bg-blue-700 transition duration-200">
                        Daftar Sekarang
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
