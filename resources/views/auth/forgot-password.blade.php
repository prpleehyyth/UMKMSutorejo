<x-guest-layout>
    <div class="w-full max-w-md mx-auto mt-10 p-8 bg-white shadow-lg rounded-2xl border border-gray-200">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">Lupa Password?</h2>
        <p class="text-sm text-center text-gray-600 mb-6">
            Tidak masalah. Masukkan email Anda dan kami akan mengirimkan link untuk mengganti password baru.
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input
                    id="email"
                    class="mt-1 w-full rounded-md border border-blue-500 bg-blue-50 text-blue-900 placeholder-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 px-4 py-2"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('login') }}" class="text-sm text-blue-700 hover:text-blue-900 hover:underline">
                    Kembali ke Login
                </a>

                <x-primary-button class="px-6 py-2 text-sm bg-blue-800 hover:bg-blue-900 transition rounded-lg">
                    {{ __('Kirim Link Reset') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
