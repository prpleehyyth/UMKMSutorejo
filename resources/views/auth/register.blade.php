<x-guest-layout>
    <div class="w-full max-w-xl mx-auto mt-10 p-8 bg-white shadow-lg rounded-2xl border border-gray-200">
        <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-2">Buat Akun Baru</h2>
        <p class="text-center text-sm text-gray-500 mb-6">Daftarkan dirimu untuk bergabung dan mendukung UMKM lokal.</p>

       <form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Nama Lengkap -->
    <div class="mb-4">
        <x-input-label for="name" :value="__('Nama Lengkap')" />
        <x-text-input id="name"
            class="mt-1 w-full rounded-md border border-blue-500 bg-blue-50 text-blue-900 placeholder-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 px-4 py-2"
            type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- NIK -->
    <div class="mb-4">
        <x-input-label for="nik" :value="__('Nomor NIK')" />
        <x-text-input id="nik"
            class="mt-1 w-full rounded-md border border-blue-500 bg-blue-50 text-blue-900 placeholder-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 px-4 py-2"
            type="text" name="nik" :value="old('nik')" required autocomplete="off" />
        <x-input-error :messages="$errors->get('nik')" class="mt-2" />
    </div>

    <!-- NPWP -->
    <div class="mb-4">
        <x-input-label for="npwp" :value="__('NPWP (opsional)')" />
        <x-text-input id="npwp"
            class="mt-1 w-full rounded-md border border-blue-500 bg-blue-50 text-blue-900 placeholder-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 px-4 py-2"
            type="text" name="npwp" :value="old('npwp')" autocomplete="off" />
        <x-input-error :messages="$errors->get('npwp')" class="mt-2" />
    </div>

    <!-- Email -->
    <div class="mb-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email"
            class="mt-1 w-full rounded-md border border-blue-500 bg-blue-50 text-blue-900 placeholder-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 px-4 py-2"
            type="email" name="email" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- No Telepon -->
    <div class="mb-4">
        <x-input-label for="phone_number" :value="__('No Telepon')" />
        <x-text-input id="phone_number"
            class="mt-1 w-full rounded-md border border-blue-500 bg-blue-50 text-blue-900 placeholder-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 px-4 py-2"
            type="text" name="phone_number" :value="old('phone_number')" required autocomplete="tel" />
        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mb-4">
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password"
            class="mt-1 w-full rounded-md border border-blue-500 bg-blue-50 text-blue-900 placeholder-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 px-4 py-2"
            type="password" name="password" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Konfirmasi Password -->
    <div class="mb-4">
        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
        <x-text-input id="password_confirmation"
            class="mt-1 w-full rounded-md border border-blue-500 bg-blue-50 text-blue-900 placeholder-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 px-4 py-2"
            type="password" name="password_confirmation" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <!-- Aksi -->
    <div class="flex items-center justify-between mt-6">
        <a class="text-sm text-blue-700 hover:underline" href="{{ route('login') }}">
            {{ __('Sudah punya akun?') }}
        </a>

        <x-primary-button class="px-6 py-2 text-lg bg-blue-800 hover:bg-blue-900 transition rounded-lg">
            {{ __('Daftar') }}
        </x-primary-button>
    </div>
</form>
    </div>
</x-guest-layout>
