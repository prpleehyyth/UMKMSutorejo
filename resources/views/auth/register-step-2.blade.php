<x-guest-layout>
    <div class="w-full max-w-2xl">

        <div class="grid grid-cols-2 gap-4 mb-8">
            <a href="{{ route('register.step1') }}" class="text-center border-b-4 border-primary pb-2 opacity-60 hover:opacity-100 transition">
                <div class="text-primary font-bold flex items-center justify-center gap-2">
                    <i class="fa-solid fa-check-circle"></i> Langkah 1
                </div>
                <div class="text-sm text-slate-500">Data Diri</div>
            </a>
            <div class="text-center border-b-4 border-primary pb-2">
                <div class="text-primary font-bold">Langkah 2</div>
                <div class="text-sm text-slate-500">Informasi Usaha</div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-xl p-8">
            <div class="text-center mb-8">
                <h2 class="font-serif text-3xl font-bold text-slate-800">Informasi Usaha</h2>
                <p class="text-slate-500 mt-2">Lengkapi data usaha Anda. Ini akan ditampilkan di halaman profil UMKM Anda.</p>
            </div>

            <form method="POST" action="{{ route('register.step2') }}" enctype="multipart/form-data">
                @csrf

                <div class="space-y-6">
                    {{-- Nama Usaha --}}
                    <div>
                        <x-input-label for="name" value="Nama Usaha" />
                        <div class="relative mt-1">
                            <i class="fa-solid fa-store absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <x-text-input id="name" name="name" type="text" placeholder="Contoh: Warung Kopi Senja" class="pl-10 w-full" :value="old('name')" required />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- Alamat Usaha --}}
                    <div>
                        <x-input-label for="address" value="Alamat Lengkap Usaha" />
                        <div class="relative mt-1">
                            <i class="fa-solid fa-map-marker-alt absolute left-3 top-3 text-slate-400"></i>
                            <textarea id="address" name="address" rows="3" placeholder="Masukkan alamat lengkap usaha Anda" class="pl-10 w-full border-slate-300 rounded-lg shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>{{ old('address') }}</textarea>
                        </div>
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- NIB (Opsional dengan label yang lebih jelas) --}}
                        <div>
                            <x-input-label for="nib" value="NIB (Nomor Induk Berusaha) - Opsional" />
                            <div class="relative mt-1">
                                <i class="fa-solid fa-hashtag absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <x-text-input id="nib" name="nib" type="text" placeholder="Contoh: 1234567890123" class="pl-10 w-full" :value="old('nib')" />
                            </div>
                            <x-input-error :messages="$errors->get('nib')" class="mt-2" />
                        </div>

                        {{-- Jenis Usaha --}}
                        <div>
                            <x-input-label for="business_type_id" value="Jenis Usaha" />
                            <div class="relative mt-1">
                                <i class="fa-solid fa-tag absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <select id="business_type_id" name="business_type_id" class="pl-10 w-full border-slate-300 rounded-lg shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                                    <option value="" disabled selected>-- Pilih Jenis Usaha --</option>
                                    @foreach ($businessTypes as $type)
                                    <option value="{{ $type->id }}" {{ old('business_type_id') == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <x-input-error :messages="$errors->get('business_type_id')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="revenue" value="Omzet (dalam Rupiah)" />
                            <div class="relative mt-1">
                                <i class="fa-solid fa-coins absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <x-text-input id="revenue" name="revenue" type="number" placeholder="Contoh: 10000000" class="pl-10 w-full" :value="old('revenue')" required />
                            </div>
                            <x-input-error :messages="$errors->get('revenue')" class="mt-2" />
                        </div>


                        {{-- Sertifikat Halal (Opsional) --}}
                        <div>
                            <x-input-label for="halal_certified" value="No. Sertifikat Halal (Opsional)" />
                            <div class="relative mt-1">
                                <i class="fa-solid fa-check-circle absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <x-text-input id="halal_certified" name="halal_certified" type="text" placeholder="Jika ada" class="pl-10 w-full" :value="old('halal_certified')" />
                            </div>
                            <x-input-error :messages="$errors->get('halal_certified')" class="mt-2" />
                        </div>

                        {{-- Google Maps Link (Opsional) --}}
                        <div>
                            <x-input-label for="Maps_link" value="Link Google Maps (Opsional)" />
                            <div class="relative mt-1">
                                <i class="fa-solid fa-link absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <x-text-input id="google_maps_link" name="google_maps_link" type="url" placeholder="https://maps.app.goo.gl/..." class="pl-10 w-full" :value="old('google_maps_link')" />
                            </div>
                            <x-input-error :messages="$errors->get('google_maps_link')" class="mt-2" />
                        </div>
                    </div>
                </div>

                {{-- Tombol Navigasi --}}
                <div class="mt-8 flex flex-col-reverse sm:flex-row items-center justify-between gap-4">
                    <a href="{{ route('register.step1') }}" class="font-semibold text-slate-600 hover:text-primary transition">
                        ← Kembali
                    </a>
                    <x-primary-button class="w-full sm:w-auto justify-center py-3 text-base">
                        Selesaikan Pendaftaran <i class="fa-solid fa-party-horn ml-2"></i>
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>