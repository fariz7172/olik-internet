@extends('layouts.admin')

@section('page-title', 'Edit Paket')

@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.packages.update', $package) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Ada kesalahan!</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Kategori</label>
                <select name="category_id" class="form-input" required>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $package->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Nama Paket</label>
                <input type="text" name="name" value="{{ $package->name }}" class="form-input" required>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Kecepatan</label>
                    <input type="text" name="speed" value="{{ $package->speed }}" class="form-input" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Urutan</label>
                    <input type="number" name="sort_order" value="{{ $package->sort_order }}" class="form-input">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Harga</label>
                    <input type="number" name="price" value="{{ $package->price }}" class="form-input" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Harga Asli (Opsional)</label>
                    <input type="number" name="original_price" value="{{ $package->original_price }}" class="form-input">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Fitur</label>
                <div id="features-container">
                    @foreach($package->features ?? [] as $feature)
                    <input type="text" name="features[]" value="{{ $feature }}" class="form-input mb-2">
                    @endforeach
                </div>
                <button type="button" onclick="addFeature()" class="text-purple-600 text-sm mt-2">+ Tambah Fitur</button>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Gambar</label>
                @if($package->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->name }}" class="w-32 h-32 object-cover rounded">
                </div>
                @endif
                <input type="file" name="image" accept="image/*" class="form-input">
            </div>

            <div class="mb-4 flex items-center space-x-6">
                <label class="flex items-center">
                    <input type="checkbox" name="is_featured" value="1" {{ $package->is_featured ? 'checked' : '' }} class="mr-2">
                    <span class="text-gray-700">Paket Unggulan</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ $package->is_active ? 'checked' : '' }} class="mr-2">
                    <span class="text-gray-700">Aktif</span>
                </label>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="btn-primary">Update Paket</button>
                <a href="{{ route('admin.packages.index') }}" class="btn-outline">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
function addFeature() {
    const container = document.getElementById('features-container');
    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'features[]';
    input.className = 'form-input mb-2';
    input.placeholder = 'Fitur baru';
    container.appendChild(input);
}
</script>
@endsection
