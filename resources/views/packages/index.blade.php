@extends('layouts.app')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-br from-purple-600 to-indigo-700 py-16 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Semua Paket Internet</h1>
            <p class="text-xl text-purple-100 max-w-2xl mx-auto">
                Temukan paket internet terbaik yang sesuai dengan kebutuhan Anda
            </p>
        </div>
    </div>
</section>

<!-- Filter & Search Section -->
<section class="py-8 bg-white border-b sticky top-16 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
            <!-- Category Filter -->
            <div class="flex items-center gap-2 flex-wrap">
                <a href="{{ route('packages.index') }}" 
                   class="px-4 py-2 rounded-lg font-medium transition-all {{ !request('category') ? 'bg-purple-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Semua
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('packages.index', ['category' => $category->slug]) }}" 
                       class="px-4 py-2 rounded-lg font-medium transition-all {{ request('category') == $category->slug ? 'bg-purple-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        {{ $category->name }}
                        <span class="text-xs opacity-75">({{ $category->packages_count }})</span>
                    </a>
                @endforeach
            </div>

            <!-- Search Form -->
            <form method="GET" action="{{ route('packages.index') }}" class="w-full md:w-auto">
                <div class="relative">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}"
                           placeholder="Cari paket..." 
                           class="w-full md:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                    <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Packages Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($packages->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($packages as $package)
                <div class="package-card overflow-hidden group">
                    @if($package->discount_percentage > 0)
                    <div class="package-badge">
                        Hemat {{ $package->discount_percentage }}%
                    </div>
                    @endif

                    <div class="p-6">
                        <!-- Package Image -->
                        @if($package->image)
                        <div class="-mx-6 -mt-6 mb-6 h-48 overflow-hidden relative">
                            <img src="{{ asset('storage/' . $package->image) }}" 
                                 alt="{{ $package->name }}" 
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
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
                        @if($package->features)
                        <ul class="space-y-2 mb-6">
                            @foreach(array_slice($package->features, 0, 3) as $feature)
                            <li class="flex items-start text-sm">
                                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-700">{{ $feature }}</span>
                            </li>
                            @endforeach
                            @if(count($package->features) > 3)
                            <li class="text-sm text-purple-600 font-medium">
                                + {{ count($package->features) - 3 }} fitur lainnya
                            </li>
                            @endif
                        </ul>
                        @endif

                        <!-- CTA Buttons -->
                        <div class="space-y-3">
                            <a href="{{ route('packages.show', $package->slug) }}" 
                               class="btn-primary w-full text-center block">
                                Lihat Detail Paket
                            </a>
                            
                            @php
                                $whatsappMessage = "Halo Olik Internet! 🌐\n\n";
                                $whatsappMessage .= "Saya tertarik berlangganan:\n";
                                $whatsappMessage .= "📦 *{$package->name}*\n";
                                $whatsappMessage .= "⚡ Kecepatan: {$package->speed}\n";
                                $whatsappMessage .= "💰 Harga: {$package->formatted_price}/bulan\n";
                                if($package->original_price) {
                                    $whatsappMessage .= "🎉 Hemat {$package->discount_percentage}%\n";
                                }
                                $whatsappMessage .= "\nMohon info lebih lanjut. Terima kasih! 🙏";
                                $whatsappUrl = 'https://wa.me/6285714017756?text=' . urlencode($whatsappMessage);
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

            <!-- Pagination -->
            <div class="mt-12">
                {{ $packages->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3 class="mt-4 text-2xl font-bold text-gray-900">Tidak ada paket ditemukan</h3>
                <p class="mt-2 text-gray-600">
                    @if(request('search'))
                        Tidak ada paket yang cocok dengan pencarian "{{ request('search') }}"
                    @else
                        Belum ada paket internet tersedia saat ini
                    @endif
                </p>
                <div class="mt-6">
                    <a href="{{ route('packages.index') }}" class="btn-primary">
                        Lihat Semua Paket
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="bg-gradient-to-br from-purple-600 to-indigo-700 py-16 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold mb-4">Masih Bingung Pilih Paket?</h2>
        <p class="text-xl text-purple-100 mb-8">
            Hubungi tim kami untuk konsultasi gratis dan dapatkan rekomendasi paket terbaik
        </p>
        <a href="https://wa.me/6285714017756?text=Halo%20Olik,%20saya%20butuh%20bantuan%20memilih%20paket%20internet" 
           target="_blank"
           style="background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);"
           class="inline-flex items-center gap-3 text-white px-8 py-4 rounded-2xl shadow-xl hover:shadow-2xl font-bold transition-all transform hover:scale-105">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 448 512">
                <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
            </svg>
            Hubungi Customer Service
        </a>
    </div>
</section>
@endsection
