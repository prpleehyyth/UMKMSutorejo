<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UMKM Sutorejo') }}</title>

    {{-- Tailwind CSS & Konfigurasi Kustom --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#4F46E5',
                        'darkBlue': '#1E40AF',
                        'off-white': '#f8fafc',
                    },
                    fontFamily: {
                        'sans': ['Lato', 'sans-serif'],
                        'serif': ['Merriweather', 'serif'],
                    }
                }
            }
        }
    </script>

    {{-- Dependencies: Fonts & Icons --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Merriweather:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-off-white flex flex-col justify-center items-center py-12 px-6 sm:px-12 relative">
        <a href="/" class="absolute top-6 left-6 text-slate-500 hover:text-primary font-semibold text-sm flex items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Beranda
        </a>

        <div class="w-full max-w-2xl"> {{-- Ubah lebar sesuai kebutuhan, contoh: max-w-4xl --}}
            <div class="flex justify-center mb-6">
                <a href="/" class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 h-16">
                    <div>
                        <h1 class="font-serif text-xl font-bold text-slate-800">UMKM</h1>
                        <p class="text-sm text-slate-500">Dukuh Sutorejo</p>
                    </div>
                </a>
            </div>

            <div class="bg-white shadow-xl rounded-xl p-8">
                {{ $slot }}
            </div>
        </div>
    </div>
    @stack('scripts')
</body>


</html>