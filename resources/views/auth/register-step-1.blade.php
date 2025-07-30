<x-guest-layout>
    <div class="w-full max-w-2xl">

        <div class="grid grid-cols-2 gap-4 mb-8">
            <div class="text-center border-b-4 border-primary pb-2">
                <div class="text-primary font-bold">Langkah 1</div>
                <div class="text-sm text-slate-500">Data Diri</div>
            </div>
            <div class="text-center border-b-2 border-slate-200 pb-2">
                <div class="text-slate-400 font-semibold">Langkah 2</div>
                <div class="text-sm text-slate-400">Informasi Usaha</div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-xl p-8">
            <div class="text-center mb-8">
                <h2 class="font-serif text-3xl font-bold text-slate-800">Pendaftaran Akun</h2>
                <p class="text-slate-500 mt-2">Silakan isi data diri Anda dengan benar untuk melanjutkan.</p>
            </div>

            <form method="POST" action="{{ route('register.step1') }}">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Nama --}}
                    <div class="md:col-span-2">
                        <x-input-label for="name" value="Nama Lengkap" />
                        <div class="relative mt-1">
                            <i class="fa-solid fa-user absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <x-text-input id="name" name="name" type="text" placeholder="Masukkan nama lengkap Anda"
                                class="pl-10 w-full"
                                :value="old('name')" required autofocus />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- Email --}}
                    <div class="md:col-span-2">
                        <x-input-label for="email" value="Email" />
                        <div class="relative mt-1">
                            <i class="fa-solid fa-at absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <x-text-input id="email" name="email" type="email" placeholder="contoh@email.com"
                                class="pl-10 w-full"
                                :value="old('email')" required />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Password --}}
                    <div>
                        <x-input-label for="password" value="Password" />
                        <div class="relative mt-1">
                            <i class="fa-solid fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <x-text-input id="password" name="password" type="password" placeholder="Minimal 8 karakter"
                                class="pl-10 pr-10 w-full" required />
                            <button type="button" onclick="togglePasswordVisibility('password', this)" class="absolute inset-y-0 right-0 px-3 flex items-center text-slate-500 hover:text-primary">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div>
                        <x-input-label for="password_confirmation" value="Konfirmasi Password" />
                        <div class="relative mt-1">
                            <i class="fa-solid fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password" placeholder="Ulangi password"
                                class="pl-10 pr-10 w-full" required />
                            <button type="button" onclick="togglePasswordVisibility('password_confirmation', this)" class="absolute inset-y-0 right-0 px-3 flex items-center text-slate-500 hover:text-primary">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    {{-- No Telepon --}}
                    <div>
                        <x-input-label for="phone_number" value="No. Telepon (WhatsApp)" />
                        <div class="relative mt-1">
                            <i class="fa-solid fa-phone absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <x-text-input id="phone_number" name="phone_number" type="tel" placeholder="08xxxxxxxxxx"
                                class="pl-10 w-full"
                                :value="old('phone_number')" required />
                        </div>
                        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                    </div>

                    {{-- NIK --}}
                    <div>
                        <x-input-label for="nik" value="NIK" />
                        <div class="relative mt-1">
                            <i class="fa-solid fa-id-card absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <x-text-input id="nik" name="nik" type="text" placeholder="16 digit NIK"
                                class="pl-10 w-full"
                                :value="old('nik')" required />
                        </div>
                        <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                    </div>

                    {{-- NPWP --}}
                    <div class="md:col-span-2">
                        <x-input-label for="npwp" value="NPWP (Opsional)" />
                        <div class="relative mt-1">
                            <i class="fa-solid fa-address-book absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <x-text-input id="npwp" name="npwp" type="text" placeholder="15 digit NPWP"
                                class="pl-10 w-full"
                                :value="old('npwp')" />
                        </div>
                        <x-input-error :messages="$errors->get('npwp')" class="mt-2" />
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="mt-8">
                    <x-primary-button class="w-full justify-center py-3 text-base">
                        Selanjutnya <i class="fa-solid fa-arrow-right ml-2"></i>
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        function togglePasswordVisibility(id, button) {
            const input = document.getElementById(id);
            const icon = button.querySelector('i');
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
    @endpush
</x-guest-layout>