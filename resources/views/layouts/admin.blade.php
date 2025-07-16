<!-- layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard Admin' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gradient-to-b from-blue-800 to-blue-900 text-white">
            <div class="p-4 border-b border-blue-700">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                        <i class="fas fa-store text-blue-800 text-sm"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold">UMKM</h1>
                        <p class="text-sm text-blue-200">Dukuh Sutorejo</p>
                    </div>
                </div>
            </div>

            <nav class="mt-4">
                <div class="px-4 mb-2">
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors
                        {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-blue-200 hover:bg-blue-700 hover:text-white' }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
                <div class="px-4 py-2">
                    <p class="text-xs text-blue-300 uppercase tracking-wider font-semibold">MENU</p>
                </div>

                <div class="px-4 mb-2">
                    <a href="{{ route('admin.umkm.index') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors
                        {{ request()->routeIs('admin.umkm.index') ? 'bg-blue-600 text-white' : 'text-blue-200 hover:bg-blue-700 hover:text-white' }}">
                        <i class="fas fa-database"></i>
                        <span>Data UMKM</span>
                    </a>

                    <a href="#" class="flex items-center space-x-3 px-4 py-3 text-blue-200 hover:bg-blue-700 hover:text-white rounded-lg transition-colors">
                        <i class="fas fa-check-circle"></i>
                        <span>Verifikasi Data</span>
                    </a>

                    <a href="#" class="flex items-center space-x-3 px-4 py-3 text-blue-200 hover:bg-blue-700 hover:text-white rounded-lg transition-colors">
                        <i class="fas fa-heart"></i>
                        <span>Aspirasi</span>
                    </a>

                    <a href="{{ route('logout') }}" class="flex items-center space-x-3 px-4 py-3 text-blue-200 hover:bg-blue-700 hover:text-white rounded-lg transition-colors"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Keluar</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center space-x-4">
                        <button class="lg:hidden text-gray-600 hover:text-gray-800">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h2 class="text-xl font-semibold text-gray-800">{{ $header ?? 'Dashboard' }}</h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <span class="text-sm text-gray-600">Admin</span>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-8">
                <div class="max-w-6xl mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>

</html>