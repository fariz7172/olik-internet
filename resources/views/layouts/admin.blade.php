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
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-purple text-white flex-shrink-0">
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
                <div class="px-6 py-4 flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                    <div class="flex items-center space-x-4">
                        @yield('action-button')
                        <div class="border-l pl-4 ml-2 flex items-center gap-4">
                            <div class="text-right">
                                <p class="text-sm text-gray-600">Halo,</p>
                                <p class="font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg font-medium transition-colors flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
