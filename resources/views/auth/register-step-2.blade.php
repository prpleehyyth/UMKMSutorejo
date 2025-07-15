<x-guest-layout>
    <div class="w-full max-w-md mx-auto mt-10 p-6 bg-white shadow rounded-xl">
        <h2 class="text-xl font-semibold text-center mb-6">Langkah 2: Data UMKM</h2>

        <form method="POST" action="{{ route('register.step2') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="Nama Usaha" value="Nama Usaha" />
                <x-text-input id="name" name="name" type="text" class="block w-full mt-1" value="{{ old('name') }}" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="nib" value="NIB (Nomor Induk Berusaha)" />
                <x-text-input id="nib" name="nib" type="text" class="block w-full mt-1" value="{{ old('nib') }}" />
                <x-input-error :messages="$errors->get('nib')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="business_type_id" value="Jenis Usaha" />
                <select id="business_type_id" name="business_type_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                    <option value="">-- Pilih Jenis Usaha --</option>
                    @foreach ($businessTypes as $type)
                    <option value="{{ $type->id }}" {{ old('business_type_id') == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('business_type_id')" class="mt-2" />
            </div>


            <div class="mb-4">
                <x-input-label for="revenue" value="Omzet per Bulan" />
                <x-text-input id="revenue" name="revenue" type="text" class="block w-full mt-1" value="{{ old('revenue') }}" />
                <x-input-error :messages="$errors->get('revenue')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="halal_certified" value="Nomor Sertifikat Halal (Opsional)" />
                <x-text-input id="halal_certified" name="halal_certified" type="text" class="block w-full mt-1" value="{{ old('halal_certified') }}" placeholder="Contoh: ID12345678" />
                <x-input-error :messages="$errors->get('halal_certified')" class="mt-2" />
            </div>



            <div class="mb-4">
                <x-input-label for="address" value="Alamat Lengkap Usaha" />
                <textarea id="address" name="address" rows="3" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm">{{ old('address') }}</textarea>
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="latitude" value="Latitude (Opsional)" />
                <x-text-input id="latitude" name="latitude" type="text" class="block w-full mt-1" value="{{ old('latitude') }}" />
                <x-input-error :messages="$errors->get('latitude')" class="mt-2" />
            </div>

            <div class="mb-6">
                <x-input-label for="longitude" value="Longitude (Opsional)" />
                <x-text-input id="longitude" name="longitude" type="text" class="block w-full mt-1" value="{{ old('longitude') }}" />
                <x-input-error :messages="$errors->get('longitude')" class="mt-2" />
            </div>

            <div>
                <x-primary-button class="w-full justify-center">
                    Daftar Sekarang
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>