@extends('layouts.admin')

@section('page-title', 'Manajemen Paket')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold">Daftar Paket Internet</h2>
    <a href="{{ route('admin.packages.create') }}" class="btn-primary">
        + Tambah Paket Baru
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Paket</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kecepatan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($packages as $package)
                <tr>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            @if($package->is_featured)
                            <span class="mr-2">⭐</span>
                            @endif
                            <span class="font-semibold">{{ $package->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm">{{ $package->category->name }}</td>
                    <td class="px-6 py-4 text-sm font-semibold text-purple-600">{{ $package->speed }}</td>
                    <td class="px-6 py-4 text-sm font-semibold">{{ $package->formatted_price }}</td>
                    <td class="px-6 py-4 text-sm">
                        @if($package->is_active)
                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">Aktif</span>
                        @else
                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">Nonaktif</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.packages.edit', $package) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                            <form action="{{ route('admin.packages.destroy', $package) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus paket ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">Belum ada paket</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($packages->hasPages())
    <div class="px-6 py-4 border-t">
        {{ $packages->links() }}
    </div>
    @endif
</div>
@endsection
