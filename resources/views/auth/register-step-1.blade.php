<x-guest-layout>
    <div class="w-full max-w-md mx-auto mt-10 p-6 bg-white shadow rounded-xl">
        <h2 class="text-xl font-semibold text-center mb-6">Langkah 1: Data Diri Pemilik</h2>

        <form method="POST" action="{{ route('register.step1') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="name" value="Nama Lengkap" />
                <x-text-input id="name" name="name" type="text" class="block w-full mt-1" value="{{ old('name') }}" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" name="email" type="email" class="block w-full mt-1" value="{{ old('email') }}" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="password" value="Password" />
                <x-text-input id="password" name="password" type="password" class="block w-full mt-1" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="password_confirmation" value="Konfirmasi Password" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="block w-full mt-1" required />
            </div>

            <div class="mb-4">
                <x-input-label for="phone_number" value="No Telepon" />
                <x-text-input id="phone_number" name="phone_number" type="text" class="block w-full mt-1" value="{{ old('phone_number') }}" required />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="nik" value="NIK" />
                <x-text-input id="nik" name="nik" type="text" class="block w-full mt-1" value="{{ old('nik') }}" required />
                <x-input-error :messages="$errors->get('nik')" class="mt-2" />
            </div>

            <div class="mb-6">
                <x-input-label for="npwp" value="NPWP (Opsional)" />
                <x-text-input id="npwp" name="npwp" type="text" class="block w-full mt-1" value="{{ old('npwp') }}" />
                <x-input-error :messages="$errors->get('npwp')" class="mt-2" />
            </div>

            <div>
                <x-primary-button class="w-full justify-center">
                    Selanjutnya
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>