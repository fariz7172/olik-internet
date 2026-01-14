<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Admin Panel' }} - Olik Internet</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Mobile Sidebar Styles */
        #mobile-sidebar-overlay {
            transition: opacity 0.3s ease;
        }
        #mobile-sidebar {
            transition: transform 0.3s ease;
        }
        .sidebar-open #mobile-sidebar {
            transform: translateX(0);
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Mobile Sidebar Overlay -->
        <div id="mobile-sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden hidden"></div>

        <!-- Sidebar -->
        <aside id="mobile-sidebar" class="fixed md:static w-64 bg-gradient-purple text-white flex-shrink-0 h-full z-50 transform -translate-x-full md:translate-x-0 transition-transform">
            <!-- Close button for mobile -->
            <div class="md:hidden absolute top-4 right-4">
                <button id="close-sidebar" class="text-white hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <div class="p-6">
                <h2 class="text-2xl font-bold">Olik Admin</h2>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="block px-6 py-3 hover:bg-white/10 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-white/20' : '' }}">
                    📊 Dashboard
                </a>
                <a href="{{ route('admin.categories.index') }}" class="block px-6 py-3 hover:bg-white/10 transition-colors {{ request()->routeIs('admin.categories.*') ? 'bg-white/20' : '' }}">
                    🏷️ Kategori
                </a>
                <a href="{{ route('admin.sliders.index') }}" class="block px-6 py-3 hover:bg-white/10 transition-colors {{ request()->routeIs('admin.sliders.*') ? 'bg-white/20' : '' }}">
                    🖼️ Slider
                </a>
                <a href="{{ route('admin.packages.index') }}" class="block px-6 py-3 hover:bg-white/10 transition-colors {{ request()->routeIs('admin.packages.*') ? 'bg-white/20' : '' }}">
                    📦 Paket Internet
                </a>
                <a href="{{ route('admin.orders.index') }}" class="block px-6 py-3 hover:bg-white/10 transition-colors {{ request()->routeIs('admin.orders.*') ? 'bg-white/20' : '' }}">
                    🛒 Pesanan
                </a>
                <a href="{{ route('home') }}" class="block px-6 py-3 hover:bg-white/10 transition-colors">
                    🏠 Lihat Website
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm">
                <div class="px-4 sm:px-6 py-3 sm:py-4 flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <!-- Mobile menu button -->
                        <button id="open-sidebar" class="md:hidden text-gray-600 hover:text-gray-900">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                        <h1 class="text-lg sm:text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                    </div>
                    <div class="flex items-center space-x-2 sm:space-x-4">
                        @yield('action-button')
                        <div class="border-l pl-2 sm:pl-4 ml-2 flex items-center gap-2 sm:gap-4">
                            <div class="text-right hidden sm:block">
                                <p class="text-sm text-gray-600">Halo,</p>
                                <p class="font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="px-3 py-2 sm:px-4 bg-red-500 hover:bg-red-600 text-white rounded-lg font-medium transition-colors flex items-center gap-2 text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    <span class="hidden sm:inline">Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Mobile sidebar toggle
        const openSidebar = document.getElementById('open-sidebar');
        const closeSidebar = document.getElementById('close-sidebar');
        const sidebar = document.getElementById('mobile-sidebar');
        const overlay = document.getElementById('mobile-sidebar-overlay');

        function toggleSidebar(show) {
            if (show) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        openSidebar?.addEventListener('click', () => toggleSidebar(true));
        closeSidebar?.addEventListener('click', () => toggleSidebar(false));
        overlay?.addEventListener('click', () => toggleSidebar(false));
    </script>
</body>
</html>
