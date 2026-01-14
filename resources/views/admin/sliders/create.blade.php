@extends('layouts.admin')

@section('page-title', 'Tambah Slide Baru')

@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

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
                <label class="block text-gray-700 font-semibold mb-2">Judul Utama</label>
                <input type="text" name="title" class="form-input" required value="{{ old('title') }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Subjudul</label>
                <input type="text" name="subtitle" class="form-input" value="{{ old('subtitle') }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Deskripsi Lengkap (Halaman Promo)</label>
                <textarea name="description" class="form-input" rows="6">{{ old('description') }}</textarea>
                <p class="text-sm text-gray-500 mt-1">Isi deskripsi ini untuk halaman detail promo.</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Gambar Background</label>
                <input type="file" name="image" accept="image/*" class="form-input" required>
                <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, WEBP. Max: 2MB.</p>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Teks Tombol (Opsional)</label>
                    <input type="text" name="cta_text" class="form-input" value="{{ old('cta_text') }}" placeholder="Lihat Paket">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Link Tombol (Opsional)</label>
                    <input type="text" name="cta_link" class="form-input" value="{{ old('cta_link') }}" placeholder="http://...">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Urutan</label>
                    <input type="number" name="sort_order" class="form-input" value="{{ old('sort_order', 0) }}">
                </div>
                <div class="flex items-center mt-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" checked class="mr-2">
                        <span class="text-gray-700">Aktif</span>
                    </label>
                </div>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="btn-primary">Simpan Slide</button>
                <a href="{{ route('admin.sliders.index') }}" class="btn-outline">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
