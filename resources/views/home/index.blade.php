@extends('layouts.app')

@section('content')
<!-- Hero Carousel -->
<div id="hero-carousel" class="relative h-[500px] md:h-[600px] overflow-hidden">
    @foreach($heroSlides as $index => $slide)
    <div class="carousel-slide absolute inset-0 {{ $index === 0 ? 'active' : '' }}" style="display: {{ $index === 0 ? 'block' : 'none' }};">
        <div class="relative h-full">
            <!-- Background Image -->
            <div class="absolute inset-0 bg-gray-900">
                <!-- Mobile: object-contain agar gambar full visible, Desktop: object-cover -->
                <img src="{{ asset('storage/' . $slide->image) }}" alt="Hero Background" class="w-full h-full object-contain md:object-cover">
                <div class="absolute inset-0 bg-gradient-purple/80 mix-blend-multiply"></div>
            </div>
            
            <!-- Content -->
            <div class="relative z-10 h-full flex items-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="text-white max-w-2xl animate-fade-in-up">
                        <h1 class="text-3xl md:text-6xl font-bold mb-4 bg-[#B153D7] inline-block px-4 py-2 rounded-lg">{{ $slide->title }}</h1>
                        <p class="text-lg md:text-2xl mb-8 bg-[#B153D7] inline-block px-4 py-2 rounded-lg">{{ $slide->subtitle }}</p>
                        @if($slide->cta_text)
                        <a href="{{ $slide->cta_link ?: ($slide->slug ? route('promo.show', $slide->slug) : '#') }}" class="btn-primary inline-block">
                            {{ $slide->cta_text }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Navigation Arrows -->
    <button class="carousel-prev absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/30 hover:bg-white/50 text-white p-3 rounded-full transition-all z-20">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>
    <button class="carousel-next absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/30 hover:bg-white/50 text-white p-3 rounded-full transition-all z-20">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </button>

    <!-- Dots Navigation -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
        @foreach($heroSlides as $index => $slide)
        <button class="carousel-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all {{ $index === 0 ? 'active bg-white' : '' }}"></button>
        @endforeach
    </div>
</div>


<!-- Modern Hero Section with Glassmorphism -->
<section class="relative overflow-hidden bg-gradient-to-br from-purple-50 via-white to-indigo-50 py-20 lg:py-32">
    <!-- Animated Background Blobs -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-[-10%] left-[-5%] w-96 h-96 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
        <div class="absolute top-[-5%] right-[-5%] w-96 h-96 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-[-10%] left-[20%] w-96 h-96 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-4000"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Left Column: Content -->
            <div class="text-center lg:text-left space-y-8 animate-fade-in-up">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white/80 backdrop-blur-sm shadow-lg border border-purple-100">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-purple-500"></span>
                    </span>
                    <span class="text-sm font-semibold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
                        #InternetTerbaik Seluruh Indonesia
                    </span>
                </div>

                <!-- Main Headline -->
                <h1 class="text-5xl lg:text-6xl xl:text-7xl font-extrabold leading-tight">
                    <span class="text-gray-900">Internet Cepat</span>
                    <br>
                    <span class="bg-gradient-to-r from-purple-600 via-indigo-600 to-purple-800 bg-clip-text text-transparent">
                        Tanpa Batas
                    </span>
                    <br>
                    <span class="text-gray-900">untuk Rumah Anda</span>
                </h1>

                <!-- Description -->
                <p class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    Nikmati pengalaman browsing, streaming 4K, dan gaming tanpa lag dengan teknologi <span class="font-semibold text-purple-600">fiber optic tercanggih</span> dari Olik Internet.
                </p>

                <!-- Features List -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4">
                    <div class="flex items-center gap-3 bg-white/60 backdrop-blur-sm rounded-xl p-4 shadow-md border border-purple-50">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center text-white text-xl">
                            ⚡
                        </div>
                        <div class="text-left">
                            <div class="font-bold text-gray-900">1 Gbps Speed</div>
                            <div class="text-sm text-gray-600">Ultra Cepat</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 bg-white/60 backdrop-blur-sm rounded-xl p-4 shadow-md border border-purple-50">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center text-white text-xl">
                            ♾️
                        </div>
                        <div class="text-left">
                            <div class="font-bold text-gray-900">Unlimited Kuota</div>
                            <div class="text-sm text-gray-600">Tanpa FUP</div>
                        </div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4">
                    <!-- Primary Button -->
                    <a href="#packages" class="group btn-primary px-8 py-4 rounded-2xl shadow-xl hover:shadow-purple-200 transition-all flex items-center gap-3">
                        <span>Lihat Paket Internet</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>

                    <!-- WhatsApp Button with Inline Style for Guaranteed Visibility -->
                    <a href="https://api.whatsapp.com/send?phone=6285714017756&text=Halo%20Olik,%20saya%20tertarik%20berlangganan%20internet&type=phone_number&app_absent=0" 
                       target="_blank"
                       style="background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);"
                       class="group flex items-center gap-3 text-white px-8 py-4 rounded-2xl shadow-xl hover:shadow-2xl font-bold transition-all transform hover:scale-105 hover:brightness-110">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 448 512">
                            <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                        </svg>
                        <span>Hubungi Admin</span>
                    </a>
                </div>

                <!-- Trust Indicators -->
                <div class="flex items-center justify-center lg:justify-start gap-8 pt-6 text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">Instalasi Gratis</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">Support 24/7</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">Garansi 30 Hari</span>
                    </div>
                </div>
            </div>

            <!-- Right Column: Visual -->
            <div class="relative animate-slide-in-right">
                <!-- Main Image with Glassmorphism Card -->
                <div class="relative">
                    <!-- Decorative Elements -->
                    <div class="absolute -top-8 -right-8 w-72 h-72 bg-gradient-to-br from-purple-400 to-indigo-500 rounded-full filter blur-3xl opacity-20 animate-pulse"></div>
                    
                    <!-- Image Container -->
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl transform hover:scale-[1.02] transition-transform duration-500">
                        <div class="aspect-w-4 aspect-h-5">
                            <img src="{{ asset('img/holik.png') }}" alt="Olik Internet - Internet Fiber Terbaik" class="w-full h-full object-cover">
                        </div>
                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-900/30 via-transparent to-transparent"></div>
                    </div>

                    <!-- Floating Speed Card -->
                    <div class="absolute -bottom-6 -left-6 bg-white/90 backdrop-blur-lg p-6 rounded-2xl shadow-2xl border border-white/20 transform hover:-translate-y-2 transition-transform">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center">
                                <span class="text-3xl">🚀</span>
                            </div>
                            <div>
                                <div class="text-sm text-gray-600 font-medium">Kecepatan Maksimal</div>
                                <div class="text-3xl font-black bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
                                    1 Gbps
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Customer Count Card -->
                    <div class="absolute -top-6 -right-6 bg-white/90 backdrop-blur-lg p-4 rounded-xl shadow-xl border border-white/20 transform hover:-translate-y-2 transition-transform">
                        <div class="flex items-center gap-3">
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-pink-400 to-purple-500 border-2 border-white"></div>
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-400 to-blue-500 border-2 border-white"></div>
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-400 to-pink-500 border-2 border-white"></div>
                            </div>
                            <div>
                                <div class="text-lg font-bold text-gray-900">300+</div>
                                <div class="text-xs text-gray-600">Pelanggan Puas</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Featured Packages Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Paket Unggulan</h2>
            <p class="text-xl text-gray-600">Pilih paket internet terbaik sesuai kebutuhan Anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredPackages as $package)
            <div class="package-card overflow-hidden group">
                @if($package->discount_percentage > 0)
                <div class="package-badge">
                    Hemat {{ $package->discount_percentage }}%
                </div>
                @endif

                <div class="p-6">
                    <!-- Package Icon/Image -->
                    <!-- Package Icon/Image -->
                    @if($package->image)
                    <div class="-mx-6 -mt-6 mb-6 h-56 overflow-hidden relative group">
                        <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->name }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                    </div>
                    @else
                    <div class="w-16 h-16 bg-gradient-purple-light rounded-full flex items-center justify-center mb-4">
                        <span class="text-3xl">{{ $package->category->icon ?? '📡' }}</span>
                    </div>
                    @endif

                    <!-- Package Name & Category -->
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $package->name }}</h3>
                    <p class="text-purple-600 font-semibold mb-4">{{ $package->category->name }}</p>

                    <!-- Speed -->
                    <div class="mb-6">
                        <div class="text-4xl font-bold text-gradient-purple">{{ $package->speed }}</div>
                        <p class="text-gray-600">Kecepatan Internet</p>
                    </div>

                    <!-- Price -->
                    <div class="mb-6">
                        @if($package->original_price)
                        <p class="text-gray-400 line-through text-sm">{{ $package->formatted_original_price }}</p>
                        @endif
                        <div class="text-3xl font-bold text-gray-900">{{ $package->formatted_price }}</div>
                        <p class="text-gray-600">per bulan</p>
                    </div>

                    <!-- Features -->
                    <ul class="space-y-3 mb-6">
                        @foreach($package->features ?? [] as $feature)
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>

                    <!-- CTA Buttons Group -->
                    <div class="space-y-3">
                        <!-- Primary CTA - View Details -->
                        <a href="{{ route('packages.show', $package->slug) }}" class="btn-primary w-full text-center block">
                            Lihat Detail Paket
                        </a>
                        
                        <!-- Secondary CTA - WhatsApp with Package Data -->
                        @php
                            $whatsappMessage = "Halo Olik Internet!\n\n";
                            $whatsappMessage .= "Saya tertarik berlangganan:\n";
                            $whatsappMessage .= "Paket: {$package->name}\n";
                            $whatsappMessage .= "Kecepatan: {$package->speed}\n";
                            $whatsappMessage .= "Harga: {$package->formatted_price}/bulan\n";
                            if($package->original_price) {
                                $whatsappMessage .= "Hemat: {$package->discount_percentage}%\n";
                            }
                            $whatsappMessage .= "\nMohon info lebih lanjut. Terima kasih!";
                            $whatsappUrl = 'https://api.whatsapp.com/send?phone=6285714017756&text=' . urlencode($whatsappMessage) . '&type=phone_number&app_absent=0';
                        @endphp
                        
                        <a href="{{ $whatsappUrl }}" 
                           target="_blank"
                           style="background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);"
                           class="group flex items-center justify-center gap-2 text-white px-6 py-3 rounded-lg shadow-lg hover:shadow-xl font-semibold transition-all transform hover:scale-105 hover:brightness-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 448 512">
                                <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                            </svg>
                            <span>Chat via WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('packages.index') }}" class="btn-outline">
                Lihat Semua Paket
            </a>
        </div>
    </div>
</section>


<!-- Features Section -->
<section id="features" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Kenapa Pilih Kami?</h2>
            <p class="text-xl text-gray-600">Keunggulan layanan internet kami</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="card text-center">
                <div class="text-5xl mb-4">⚡</div>
                <h3 class="text-xl font-bold mb-2">Super Cepat</h3>
                <p class="text-gray-600">Kecepatan hingga 1 Gbps untuk streaming dan gaming</p>
            </div>
            <div class="card text-center">
                <div class="text-5xl mb-4">🔒</div>
                <h3 class="text-xl font-bold mb-2">Aman & Stabil</h3>
                <p class="text-gray-600">Koneksi fiber optic yang stabil 24/7</p>
            </div>
            <div class="card text-center">
                <div class="text-5xl mb-4">💰</div>
                <h3 class="text-xl font-bold mb-2">Harga Terjangkau</h3>
                <p class="text-gray-600">Paket mulai dari Rp 199.000/bulan</p>
            </div>
            <div class="card text-center">
                <div class="text-5xl mb-4">🎧</div>
                <h3 class="text-xl font-bold mb-2">Support 24/7</h3>
                <p class="text-gray-600">Customer service siap membantu kapan saja</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-purple text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Berlangganan?</h2>
        <p class="text-xl mb-8">Dapatkan internet super cepat dengan harga terbaik sekarang juga!</p>
        <a href="{{ route('packages.index') }}" class="bg-white text-purple-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-all inline-block">
            Lihat Paket Sekarang
        </a>
    </div>
</section>
@endsection
