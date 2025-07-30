<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-50 flex items-center justify-center px-4">
        <div class="w-full max-w-lg p-8 bg-white rounded-2xl shadow-xl">

            <!-- Step Indicator -->
            <div class="text-center mb-2">
                <p class="text-sm text-gray-400 font-medium">Langkah 1 dari 2</p>
            </div>

            <h2 class="text-2xl font-bold text-center text-black-800 mb-2">Pendaftaran Akun</h2>
            <p class="text-center text-gray-500 mb-6">Silakan isi data diri Anda dengan benar untuk melanjutkan proses
                pendaftaran.</p>

            <form method="POST" action="{{ route('register.step1') }}">
                @csrf

                {{-- Nama --}}
                <div class="mb-4">
                    <x-input-label for="name" value="Nama Lengkap" />
                    <x-text-input id="name" name="name" type="text"
                        class="block w-full mt-1 rounded-md border border-blue-500 bg-blue-50 text-blue-900 placeholder-blue-400 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                        value="{{ old('name') }}" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" name="email" type="email"
                        class="block w-full mt-1 rounded-md border border-blue-500 bg-blue-50 text-blue-900 placeholder-blue-400 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                        value="{{ old('email') }}" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <x-input-label for="password" value="Password" />
                    <div class="relative">
                        <input id="password" name="password" type="password"
                            class="block w-full mt-1 rounded-md border border-blue-500 bg-blue-50 text-blue-900 placeholder-blue-400 px-3 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                            required />
                        <button type="button" onclick="togglePasswordVisibility('password', this)"
                            class="absolute inset-y-0 right-0 flex items-center px-3 text-sm text-gray-600">
                            👁️
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Konfirmasi Password --}}
                <div class="mb-4">
                    <x-input-label for="password_confirmation" value="Konfirmasi Password" />
                    <div class="relative">
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            class="block w-full mt-1 rounded-md border border-blue-500 bg-blue-50 text-blue-900 placeholder-blue-400 px-3 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                            required />
                        <button type="button" onclick="togglePasswordVisibility('password_confirmation', this)"
                            class="absolute inset-y-0 right-0 flex items-center px-3 text-sm text-gray-600">
                            👁️
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                {{-- No Telepon --}}
                <div class="mb-4">
                    <x-input-label for="phone_number" value="No Telepon" />
                    <x-text-input id="phone_number" name="phone_number" type="text"
                        class="block w-full mt-1 rounded-md border border-blue-500 bg-blue-50 text-blue-900 placeholder-blue-400 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                        value="{{ old('phone_number') }}" required />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>

                {{-- NIK --}}
                <div class="mb-4">
                    <x-input-label for="nik" value="NIK" />
                    <x-text-input id="nik" name="nik" type="text"
                        class="block w-full mt-1 rounded-md border border-blue-500 bg-blue-50 text-blue-900 placeholder-blue-400 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                        value="{{ old('nik') }}" required />
                    <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                </div>

                {{-- NPWP --}}
                <div class="mb-6">
                    <x-input-label for="npwp" value="NPWP (Opsional)" />
                    <x-text-input id="npwp" name="npwp" type="text"
                        class="block w-full mt-1 rounded-md border border-blue-500 bg-blue-50 text-blue-900 placeholder-blue-400 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                        value="{{ old('npwp') }}" />
                    <x-input-error :messages="$errors->get('npwp')" class="mt-2" />
                </div>

                {{-- Tombol --}}
                <div>
                    <x-primary-button
                        class="w-full justify-center bg-blue-700 hover:bg-blue-800 transition duration-200">
                        Selanjutnya
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            function togglePasswordVisibility(id, el) {
                const input = document.getElementById(id);
                if (input.type === "password") {
                    input.type = "text";
                    el.innerText = '🙈'; // icon jika terbuka
                } else {
                    input.type = "password";
                    el.innerText = '👁️'; // icon jika tertutup
                }
            }

            // Validasi input
            document.querySelector('form').addEventListener('submit', function(e) {
                const password = document.getElementById('password').value;
                const phone = document.getElementById('phone_number').value;
                const nik = document.getElementById('nik').value;
                const npwp = document.getElementById('npwp').value;

                // Password validasi
                const passValid = password.length >= 8 && /[\d\W]/.test(password);
                if (!passValid) {
                    alert('Password harus minimal 8 karakter dan mengandung angka atau simbol.');
                    e.preventDefault();
                    return;
                }

                // No telepon validasi
                if (phone.length < 10 || phone.length > 13 || !/^\d+$/.test(phone)) {
                    alert('Nomor telepon tidak valid. Masukkan 10-13 digit angka.');
                    e.preventDefault();
                    return;
                }

                // NIK validasi
                if (nik.length !== 16 || !/^\d+$/.test(nik)) {
                    alert('NIK harus terdiri dari 16 digit angka.');
                    e.preventDefault();
                    return;
                }

                // NPWP validasi (jika diisi)
                if (npwp.length > 0 && (npwp.length !== 15 || !/^\d+$/.test(npwp))) {
                    alert('NPWP harus terdiri dari 15 digit angka.');
                    e.preventDefault();
                    return;
                }
            });
        </script>
    @endpush

</x-guest-layout>
