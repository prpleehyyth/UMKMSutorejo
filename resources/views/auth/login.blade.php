<x-guest-layout>
    <div class="w-full max-w-md mx-auto mt-10 p-6 bg-white shadow-md rounded-xl">
        <h2 class="text-2xl font-bold text-center mb-6">Masuk ke Akun Anda</h2>

        {{-- Pesan sukses dari registrasi --}}
        @if (session('success'))
        <div class="mb-4 font-medium text-sm text-green-600 bg-green-100 border border-green-200 p-3 rounded">
            {{ session('success') }}
        </div>
        @endif

        {{-- Error login --}}
        @if ($errors->any())
        <div class="mb-4 font-medium text-sm text-red-600 bg-red-100 border border-red-200 p-3 rounded">
            {{ __('Email atau password salah.') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <label class="flex items-center">
                    <input type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                </label>

                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
                @endif
            </div>

            <div class="mt-6">
                <x-primary-button class="w-full justify-center">
                    {{ __('Login') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>