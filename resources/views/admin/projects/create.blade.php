@extends('layouts.admin')

@section('title', 'Tambah Proyek')
@section('page_title', 'Tambah Proyek Baru')

@section('content')

<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-8">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Title & Category -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block text-xs font-bold text-slate-700 mb-1">Judul Proyek <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="Contoh: Website Company Profile" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                </div>

                <div>
                    <label for="category" class="block text-xs font-bold text-slate-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                    <input type="text" id="category" name="category" value="{{ old('category', 'Website Development') }}" required placeholder="Website Development, Web Application, dll" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                </div>
            </div>

            <!-- Slug & Sort Order -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="slug" class="block text-xs font-bold text-slate-700 mb-1">Slug URL <span class="text-slate-400 font-normal">(opsional, dibuat otomatis jika kosong)</span></label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug') }}" placeholder="company-profile-website" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                </div>

                <div>
                    <label for="sort_order" class="block text-xs font-bold text-slate-700 mb-1">Urutan Tampil</label>
                    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 1) }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-xs font-bold text-slate-700 mb-1">Deskripsi Proyek <span class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="4" required placeholder="Jelaskan tujuan, fitur, dan pencapaian dari proyek ini..." class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">{{ old('description') }}</textarea>
            </div>

            <!-- Tech Stacks -->
            <div>
                <label for="tech_stacks" class="block text-xs font-bold text-slate-700 mb-1">Teknologi yang Digunakan <span class="text-slate-400 font-normal">(pisahkan dengan koma)</span></label>
                <input type="text" id="tech_stacks" name="tech_stacks" value="{{ old('tech_stacks', 'Laravel 12, Tailwind CSS, MySQL') }}" placeholder="Laravel 12, Tailwind CSS, MySQL, Alpine.js" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
            </div>

            <!-- Image Upload -->
            <div>
                <label for="image" class="block text-xs font-bold text-slate-700 mb-1">Gambar Utama Proyek</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full px-3.5 py-2 text-xs rounded-xl border border-slate-200 file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="text-[11px] text-slate-400 mt-1">Format: JPG, PNG, WEBP. Maksimal 3MB.</p>
            </div>

            <!-- External URLs -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="demo_url" class="block text-xs font-bold text-slate-700 mb-1">Tautan Demo Live <span class="text-slate-400 font-normal">(opsional)</span></label>
                    <input type="url" id="demo_url" name="demo_url" value="{{ old('demo_url') }}" placeholder="https://example.com" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                </div>

                <div>
                    <label for="repo_url" class="block text-xs font-bold text-slate-700 mb-1">Tautan Repository <span class="text-slate-400 font-normal">(opsional)</span></label>
                    <input type="url" id="repo_url" name="repo_url" value="{{ old('repo_url') }}" placeholder="https://github.com/..." class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                </div>
            </div>

            <!-- Checkboxes: Publish & Featured -->
            <div class="flex items-center gap-6 pt-2">
                <label class="flex items-center gap-2 text-xs font-bold text-slate-700 cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded border-slate-300">
                    <span>Publikasikan ke Website</span>
                </label>

                <label class="flex items-center gap-2 text-xs font-bold text-slate-700 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', true) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded border-slate-300">
                    <span>Tampilkan sebagai Proyek Unggulan</span>
                </label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.projects.index') }}" class="px-4 py-2.5 text-xs font-semibold text-slate-600 hover:text-slate-800 rounded-xl hover:bg-slate-100 transition-colors">
                    Batal
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-6 py-2.5 rounded-xl shadow transition-colors">
                    Simpan Proyek
                </button>
            </div>

        </form>
    </div>
</div>

@endsection

