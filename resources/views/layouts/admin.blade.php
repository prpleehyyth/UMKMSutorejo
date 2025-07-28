<!-- layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard Admin' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="w-64 bg-gradient-to-b from-blue-800 to-blue-900 text-white fixed lg:static h-full z-50 transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
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

            <nav class="mt-4 overflow-y-auto">
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

                <div class="px-4 space-y-2">
                    {{-- Tab Data UMKM --}}
                    <a href="{{ route('admin.umkm.index') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors
   {{ request()->routeIs('admin.umkm.index') ? 'bg-blue-600 text-white' : 'text-blue-200 hover:bg-blue-700 hover:text-white' }}">
                        <i class="fas fa-briefcase"></i>
                        <span>Data UMKM</span>
                    </a>

                    {{-- Tab Verifikasi Data --}}
                    <a href="{{ route('admin.umkm.unverified') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors
   {{ request()->routeIs('admin.umkm.unverified') ? 'bg-blue-600 text-white' : 'text-blue-200 hover:bg-blue-700 hover:text-white' }}">
                        <i class="fas fa-check-circle"></i>
                        <span>Verifikasi Data</span>
                    </a>


                    <a href="{{ Route::has('admin.aspirations.index') ? route('admin.aspirations.index') : '#' }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors
                        {{ Route::has('admin.aspirations.index') && request()->routeIs('admin.aspirations*') ? 'bg-blue-600 text-white' : 'text-blue-200 hover:bg-blue-700 hover:text-white' }}
                        {{ !Route::has('admin.aspirations.index') ? 'opacity-50 cursor-not-allowed' : '' }}">
                        <i class="fas fa-heart"></i>
                        <span>Aspirasi</span>
                        @if(!Route::has('admin.aspirations.index'))
                        <span class="text-xs bg-yellow-500 text-white px-2 py-1 rounded ml-auto">Soon</span>
                        @endif
                    </a>

                    <a href="{{ route('admin.logout') }}"
                        class="flex items-center space-x-3 px-4 py-3 text-blue-200 hover:bg-red-600 hover:text-white rounded-lg transition-colors"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                        <!-- Logout Icon (Heroicons) -->
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5m-6 7h13" />
                        </svg>

                        <span>Keluar</span>
                    </a>


                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>

                </div>
            </nav>
        </div>

        <!-- Overlay for mobile -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col lg:ml-0">
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center space-x-4">
                        <button id="sidebar-toggle" class="lg:hidden text-gray-600 hover:text-gray-800 p-2">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h2 class="text-xl font-semibold text-gray-800">{{ $header ?? 'Dashboard' }}</h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <span class="text-sm text-gray-600">
                                Admin
                                @if(auth()->check())
                                - {{ auth()->user()->name }}
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6 lg:p-8 overflow-y-auto">
                <div class="max-w-6xl mx-auto">
                    <!-- Flash Messages -->
                    @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    <script>
        // Mobile sidebar toggle
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            }

            sidebarToggle.addEventListener('click', toggleSidebar);
            overlay.addEventListener('click', toggleSidebar);

            // Close sidebar when clicking on a link (mobile)
            const sidebarLinks = sidebar.querySelectorAll('a:not([href="#"])');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 1024) {
                        toggleSidebar();
                    }
                });
            });
        });
    </script>
</body>

</html>