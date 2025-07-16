<x-guest-layout>
    <div class="w-full max-w-md mx-auto mt-10 p-6 bg-white shadow rounded-xl">
        <h2 class="text-xl font-semibold text-center mb-6">Login Admin</h2>

        @if ($errors->any())
        <div class="text-red-600 mb-4">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" name="email" type="email" class="block w-full mt-1" required autofocus />
            </div>

            <div class="mb-4">
                <x-input-label for="password" value="Password" />
                <x-text-input id="password" name="password" type="password" class="block w-full mt-1" required />
            </div>

            <div class="flex items-center justify-between mt-4">
                <x-primary-button class="w-full justify-center">Login</x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>