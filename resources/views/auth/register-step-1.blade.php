<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-50 flex items-center justify-center px-4">
        <div class="w-full max-w-lg p-8 bg-white rounded-2xl shadow-xl">
            <h2 class="text-2xl font-bold text-center text-blue-800 mb-2">Langkah 1: Data Diri Pemilik</h2>
            <p class="text-center text-gray-500 mb-6">Silakan isi data diri Anda dengan benar untuk melanjutkan pendaftaran.</p>

            <form method="POST" action="{{ route('register.step1') }}">
                @csrf

                {{-- Nama --}}
                <div class="mb-4">
                    <x-input-label for="name" value="Nama Lengkap" />
                    <div class="relative">
                        <x-text-input id="name" name="name" type="text" class="block w-full mt-1 pl-10" value="{{ old('name') }}" required autofocus />
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <x-input-label for="email" value="Email" />
                    <div class="relative">
                        <x-text-input id="email" name="email" type="email" class="block w-full mt-1 pl-10" value="{{ old('email') }}" required />
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <x-input-label for="password" value="Password" />
                    <div class="relative">
                        <x-text-input id="password" name="password" type="password" class="block w-full mt-1 pl-10" required />
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Konfirmasi Password --}}
                <div class="mb-4">
                    <x-input-label for="password_confirmation" value="Konfirmasi Password" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="block w-full mt-1" required />
                </div>

                {{-- No Telepon --}}
                <div class="mb-4">
                    <x-input-label for="phone_number" value="No Telepon" />
                    <x-text-input id="phone_number" name="phone_number" type="text" class="block w-full mt-1" value="{{ old('phone_number') }}" required />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>

                {{-- NIK --}}
                <div class="mb-4">
                    <x-input-label for="nik" value="NIK" />
                    <x-text-input id="nik" name="nik" type="text" class="block w-full mt-1" value="{{ old('nik') }}" required />
                    <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                </div>

                {{-- NPWP --}}
                <div class="mb-6">
                    <x-input-label for="npwp" value="NPWP (Opsional)" />
                    <x-text-input id="npwp" name="npwp" type="text" class="block w-full mt-1" value="{{ old('npwp') }}" />
                    <x-input-error :messages="$errors->get('npwp')" class="mt-2" />
                </div>

                {{-- Tombol --}}
                <div>
                    <x-primary-button class="w-full justify-center bg-blue-600 hover:bg-blue-700 transition duration-200">
                        Selanjutnya
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
