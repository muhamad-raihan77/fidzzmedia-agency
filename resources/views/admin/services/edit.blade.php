@extends('layouts.admin')

@section('title', 'Edit Layanan')
@section('page_title', 'Edit Layanan: ' . $service->name)

@section('content')

<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-8">
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-xs font-bold text-slate-700 mb-1">Nama Layanan <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $service->name) }}" required class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                </div>

                <div>
                    <label for="number_badge" class="block text-xs font-bold text-slate-700 mb-1">Nomor Urut Badge <span class="text-red-500">*</span></label>
                    <input type="text" id="number_badge" name="number_badge" value="{{ old('number_badge', $service->number_badge) }}" required class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="icon" class="block text-xs font-bold text-slate-700 mb-1">Ikon Layanan</label>
                    <select id="icon" name="icon" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none bg-white">
                        <option value="globe" {{ old('icon', $service->icon) === 'globe' ? 'selected' : '' }}>Globe / Web (Website Development)</option>
                        <option value="code" {{ old('icon', $service->icon) === 'code' ? 'selected' : '' }}>Code / Brackets (Web Application)</option>
                        <option value="database" {{ old('icon', $service->icon) === 'database' ? 'selected' : '' }}>Database / Server (Sistem Informasi)</option>
                        <option value="palette" {{ old('icon', $service->icon) === 'palette' ? 'selected' : '' }}>Palette / Design (UI/UX Design)</option>
                        <option value="default" {{ old('icon', $service->icon) === 'default' ? 'selected' : '' }}>Lightning / Bolt</option>
                    </select>
                </div>

                <div>
                    <label for="sort_order" class="block text-xs font-bold text-slate-700 mb-1">Urutan</label>
                    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $service->sort_order) }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                </div>
            </div>

            <div>
                <label for="description" class="block text-xs font-bold text-slate-700 mb-1">Deskripsi Singkat <span class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="4" required class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">{{ old('description', $service->description) }}</textarea>
            </div>

            <div>
                <label class="flex items-center gap-2 text-xs font-bold text-slate-700 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded border-slate-300">
                    <span>Aktifkan dan tampilkan di website</span>
                </label>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.services.index') }}" class="px-4 py-2.5 text-xs font-semibold text-slate-600 hover:text-slate-800 rounded-xl hover:bg-slate-100 transition-colors">
                    Batal
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-6 py-2.5 rounded-xl shadow transition-colors">
                    Perbarui Layanan
                </button>
            </div>

        </form>
    </div>
</div>

@endsection

