@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Paket</p>
                <p class="text-3xl font-bold text-gray-900">{{ $stats['total_packages'] }}</p>
            </div>
            <div class="text-4xl">📦</div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Paket Aktif</p>
                <p class="text-3xl font-bold text-green-600">{{ $stats['active_packages'] }}</p>
            </div>
            <div class="text-4xl">✅</div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Pesanan</p>
                <p class="text-3xl font-bold text-gray-900">{{ $stats['total_orders'] }}</p>
            </div>
            <div class="text-4xl">🛒</div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Pesanan Pending</p>
                <p class="text-3xl font-bold text-yellow-600">{{ $stats['pending_orders'] }}</p>
            </div>
            <div class="text-4xl">⏳</div>
        </div>
    </div>
</div>

<!-- Revenue Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-gradient-purple text-white rounded-lg shadow p-6">
        <p class="text-white/80 text-sm mb-2">Total Pendapatan</p>
        <p class="text-4xl font-bold">Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <p class="text-gray-600 text-sm mb-2">Pendapatan Bulan Ini</p>
        <p class="text-4xl font-bold text-purple-600">Rp {{ number_format($stats['monthly_revenue'], 0, ',', '.') }}</p>
    </div>
</div>

<!-- Recent Orders -->
<div class="bg-white rounded-lg shadow mb-8">
    <div class="p-6 border-b">
        <h3 class="text-xl font-bold">Pesanan Terbaru</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pelanggan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Paket</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($recentOrders as $order)
                <tr>
                    <td class="px-6 py-4 text-sm">#{{ $order->id }}</td>
                    <td class="px-6 py-4 text-sm">{{ $order->customer_name }}</td>
                    <td class="px-6 py-4 text-sm">{{ $order->package->name }}</td>
                    <td class="px-6 py-4 text-sm font-semibold">{{ $order->formatted_total_price }}</td>
                    <td class="px-6 py-4 text-sm">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-{{ $order->status_color }}-100 text-{{ $order->status_color }}-800">
                            {{ $order->status_label }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $order->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">Belum ada pesanan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Popular Packages -->
<div class="bg-white rounded-lg shadow">
    <div class="p-6 border-b">
        <h3 class="text-xl font-bold">Paket Populer</h3>
    </div>
    <div class="p-6">
        <div class="space-y-4">
            @foreach($popularPackages as $package)
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                <div>
                    <h4 class="font-semibold">{{ $package->name }}</h4>
                    <p class="text-sm text-gray-600">{{ $package->speed }} - {{ $package->formatted_price }}/bulan</p>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold text-purple-600">{{ $package->orders_count }}</p>
                    <p class="text-xs text-gray-600">pesanan</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
