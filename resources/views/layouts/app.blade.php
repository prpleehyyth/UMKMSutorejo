<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard UMKM' }}</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // Mobile menu toggle functionality
        function toggleMobileMenu() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Close sidebar when clicking overlay
        function closeMobileMenu() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }
    </script>
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex relative">
        <!-- Mobile menu overlay -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden hidden" onclick="closeMobileMenu()"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-white shadow-md z-50 fixed md:relative h-full md:h-auto transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
            <!-- Mobile menu close button -->
            <div class="md:hidden p-4 border-b">
                <button onclick="closeMobileMenu()" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            @include('layouts.navigation')
        </aside>

        <!-- Main content wrapper -->
        <div class="flex-1 flex flex-col md:ml-0">
            <!-- Mobile menu button -->
            <div class="md:hidden bg-white shadow-sm p-4 sticky top-0 z-30">
                <button onclick="toggleMobileMenu()" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>

            <!-- Page Heading -->
            @isset($header)
            <header class="bg-white shadow sticky top-0 md:top-0 z-30">
                <div class="max-w-7xl mx-auto py-4 md:py-6 px-4 sm:px-6 lg:px-8">
                    <!-- Mobile menu button in header -->
                    <div class="flex items-center justify-between">
                        <button onclick="toggleMobileMenu()" class="md:hidden text-gray-600 hover:text-gray-900 mr-4">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <div class="flex-1">
                            {{ $header }}
                        </div>
                    </div>
                </div>
            </header>
            @else
            <!-- Mobile menu button when no header -->
            <div class="md:hidden bg-white shadow-sm p-4 sticky top-0 z-30">
                <button onclick="toggleMobileMenu()" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
            @endisset

            <!-- Page Content -->
            <main class="flex-1 py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    {{-- Flash messages --}}
                    @if(session('success'))
                    <div class="bg-green-50 border-l-4 border-green-400 text-green-800 px-4 py-3 rounded-r mb-4 shadow-sm" role="alert">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-2"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="bg-red-50 border-l-4 border-red-400 text-red-800 px-4 py-3 rounded-r mb-4 shadow-sm" role="alert">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-400 text-red-800 px-4 py-3 rounded-r mb-4 shadow-sm" role="alert">
                        <div class="flex items-start">
                            <i class="fas fa-exclamation-triangle mr-2 mt-1"></i>
                            <div>
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>

</html>