<aside class="sticky top-0 h-screen bg-gradient-to-b from-blue-600 via-blue-700 to-blue-800 w-64 flex flex-col text-white">
    <!-- Header Section with Logo -->
    <div class="flex-shrink-0 px-6 py-6 border-b border-blue-500/30">
        <div class="flex items-center space-x-3">
            <!-- Logo/Badge -->
            <div class="flex-shrink-0">
                <div class="w-10 h-10 bg-yellow-400 rounded-lg flex items-center justify-center">
                    <i class="fas fa-store text-blue-800 text-lg"></i>
                </div>
            </div>
            <!-- Title -->
            <div>
                <h1 class="text-lg font-bold text-white leading-tight">UMKM</h1>
                <p class="text-sm text-blue-200 leading-tight">Dukuh Sutorejo</p>
            </div>
        </div>
    </div>

    <!-- Dashboard Item - Fixed Active State -->
    <div class="flex-shrink-0 px-4 py-3">
        <a href="{{ route('dashboard') }}"
            class="flex items-center px-4 py-3 rounded-lg font-medium transition-all duration-200 group {{ request()->routeIs('dashboard') ? 'bg-blue-500 text-white' : 'text-blue-100 hover:bg-blue-600/50 hover:text-white' }}">
            <i class="fas fa-th-large mr-3 text-lg group-hover:scale-110 transition-transform duration-200"></i>
            <span>Dashboard</span>
        </a>
    </div>

    <!-- Menu Section -->
    <nav class="flex-1 px-4 pb-4 overflow-y-auto">
        <!-- MENU Label -->
        <div class="px-4 py-3">
            <h2 class="text-xs font-semibold text-blue-200 uppercase tracking-wide">MENU</h2>
        </div>

        <!-- Menu Items -->
        <div class="space-y-1">
            <a href="{{ route('products.index') }}"
                class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('products.*') ? 'bg-blue-500 text-white' : 'text-blue-100 hover:bg-blue-600/50 hover:text-white' }}">
                <i class="fas fa-box mr-3 text-lg group-hover:scale-110 transition-transform duration-200"></i>
                <span class="font-medium">Data Produk</span>
            </a>

            <a href="{{ route('aspirations.index') }}"
                class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('aspirations.*') ? 'bg-blue-500 text-white' : 'text-blue-100 hover:bg-blue-600/50 hover:text-white' }}">
                <i class="fas fa-comment mr-3 text-lg group-hover:scale-110 transition-transform duration-200"></i>
                <span class="font-medium">Aspirasi</span>
            </a>
        </div>
    </nav>

    <!-- User Info + Logout - Fixed at bottom -->
    <div class="flex-shrink-0 border-t border-blue-500/30 bg-blue-800/50 p-4">
        <!-- User Info -->
        <div class="flex items-center mb-4">
            <div class="flex-shrink-0">
                <div class="h-10 w-10 bg-blue-500 rounded-full flex items-center justify-center border-2 border-blue-300">
                    <span class="text-sm font-bold text-white">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </span>
                </div>
            </div>
            <div class="ml-3 min-w-0 flex-1">
                <div class="text-sm font-medium text-white truncate">
                    {{ Auth::user()->name }}
                </div>
                <div class="text-xs text-blue-200 truncate">
                    {{ Auth::user()->email }}
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="space-y-2">
            <a href="{{ route('profile.edit') }}"
                class="flex items-center w-full px-3 py-2 text-sm rounded-lg transition-all duration-200 group {{ request()->routeIs('profile.*') ? 'bg-blue-500 text-white' : 'text-blue-100 hover:bg-blue-600/50 hover:text-white' }}">
                <i class="fas fa-user-edit mr-3 w-4 text-center group-hover:scale-110 transition-transform duration-200"></i>
                <span>{{ __('Profile') }}</span>
            </a>

            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit"
                    class="flex items-center w-full px-3 py-2 text-sm text-blue-100 rounded-lg hover:bg-red-500/80 hover:text-white transition-all duration-200 group"
                    onclick="return confirm('{{ __('Apakah Anda yakin ingin keluar?') }}')">
                    <i class="fas fa-sign-out-alt mr-3 w-4 text-center group-hover:scale-110 transition-transform duration-200"></i>
                    <span>{{ __('Keluar') }}</span>
                </button>
            </form>
        </div>
    </div>
</aside>

<style>
    /* Custom gradient and animations */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-10px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .nav-item-enter {
        animation: slideIn 0.3s ease-out;
    }

    /* Scrollbar styling for the blue theme */
    .overflow-y-auto::-webkit-scrollbar {
        width: 4px;
    }

    .overflow-y-auto::-webkit-scrollbar-track {
        background: rgba(59, 130, 246, 0.1);
    }

    .overflow-y-auto::-webkit-scrollbar-thumb {
        background: rgba(59, 130, 246, 0.5);
        border-radius: 2px;
    }

    .overflow-y-auto::-webkit-scrollbar-thumb:hover {
        background: rgba(59, 130, 246, 0.7);
    }

    /* Hover effects */
    .group:hover i {
        transform: scale(1.1);
    }

    /* Active state glow */
    .bg-blue-500 {
        box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
    }
</style>