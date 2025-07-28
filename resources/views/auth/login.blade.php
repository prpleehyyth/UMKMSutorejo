<x-guest-layout>
    <div class="w-full max-w-md mx-auto mt-10 p-8 bg-white shadow-lg rounded-2xl border border-gray-200">
        <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-6">Masuk ke Akun Anda</h2>

        {{-- Pesan sukses dari registrasi --}}
        @if (session('success'))
            <div class="mb-4 text-sm text-green-700 bg-green-100 border border-green-300 p-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error login --}}
        @if ($errors->any())
            <div class="mb-4 text-sm text-red-700 bg-red-100 border border-red-300 p-3 rounded-lg">
                {{ __('Email atau password salah.') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-5">
                <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
                <x-text-input id="email" class="mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-5">
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
                <x-text-input id="password" class="mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <label class="flex items-center">
                    <input type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-600 hover:underline hover:text-indigo-800" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif
            </div>

            <div class="mt-6">
                <x-primary-button class="w-full justify-center py-2 text-lg">
                    {{ __('Login') }}
                </x-primary-button>
            </div>
        </form>

        {{-- Link ke registrasi --}}
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold hover:underline">
                    Daftar di sini
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
