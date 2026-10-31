@extends('layouts.admin')

@section('title', 'Branding & Identitas Visual')
@section('page_title', 'Kelola Branding & Logo')

@section('content')

@php
    $currentLogo = !empty($settings['site_logo']) ? asset('storage/' . $settings['site_logo']) : asset('images/logo.svg');
    $currentFavicon = !empty($settings['site_favicon']) ? asset('storage/' . $settings['site_favicon']) : asset('favicon.svg');
    $currentFounder = !empty($settings['founder_photo']) ? asset('storage/' . $settings['founder_photo']) : asset('images/branding/founder.jpg');
@endphp

<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-8">
        
        <form action="{{ route('admin.branding.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- 1. Logo Utama -->
            <div>
                <h3 class="text-sm font-extrabold text-slate-900 mb-2 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <span>Logo Utama Website</span>
                </h3>
                <p class="text-xs text-slate-500 mb-4">Logo ini otomatis digunakan pada bagian Navbar dan Footer website.</p>

                <div class="flex flex-col sm:flex-row items-center gap-6 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                    <!-- Preview Box -->
                    <div class="flex flex-col items-center">
                        <span class="text-[11px] font-bold text-slate-400 mb-2">Pratinjau Saat Ini / Baru:</span>
                        <div class="w-52 h-20 bg-white border border-slate-200 rounded-xl p-3 flex items-center justify-center shadow-sm">
                            <img id="logo-preview" src="{{ $currentLogo }}" alt="Logo Preview" class="max-h-full max-w-full object-contain">
                        </div>
                    </div>

                    <!-- Upload Input -->
                    <div class="flex-1 space-y-2">
                        <label for="site_logo" class="block text-xs font-bold text-slate-700">Unggah Logo Baru</label>
                        <input type="file" id="site_logo" name="site_logo" accept="image/*" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <p class="text-[11px] text-slate-400">Rekomendasi format: SVG, PNG transparan. Maksimal 2MB.</p>
                    </div>
                </div>
            </div>

            <!-- 2. Favicon -->
            <div>
                <h3 class="text-sm font-extrabold text-slate-900 mb-2 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <span>Favicon Browser</span>
                </h3>
                <p class="text-xs text-slate-500 mb-4">Ikon kecil yang muncul di tab browser pengguna.</p>

                <div class="flex flex-col sm:flex-row items-center gap-6 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                    <div class="flex flex-col items-center">
                        <span class="text-[11px] font-bold text-slate-400 mb-2">Pratinjau Favicon:</span>
                        <div class="w-16 h-16 bg-white border border-slate-200 rounded-xl p-2 flex items-center justify-center shadow-sm">
                            <img id="favicon-preview" src="{{ $currentFavicon }}" alt="Favicon Preview" class="w-8 h-8 object-contain">
                        </div>
                    </div>

                    <div class="flex-1 space-y-2">
                        <label for="site_favicon" class="block text-xs font-bold text-slate-700">Unggah Favicon Baru</label>
                        <input type="file" id="site_favicon" name="site_favicon" accept="image/*,.ico" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <p class="text-[11px] text-slate-400">Rekomendasi ukuran: 32x32 atau 64x64 px (SVG, PNG, ICO).</p>
                    </div>
                </div>
            </div>

            <!-- 3. Foto Founder -->
            <div>
                <h3 class="text-sm font-extrabold text-slate-900 mb-2 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <span>Foto Founder / CEO</span>
                </h3>
                <p class="text-xs text-slate-500 mb-4">Foto resmi yang ditampilkan di section Tentang & Profil Founder.</p>

                <div class="flex flex-col sm:flex-row items-center gap-6 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                    <div class="flex flex-col items-center">
                        <span class="text-[11px] font-bold text-slate-400 mb-2">Pratinjau Foto:</span>
                        <div class="w-32 h-36 bg-slate-800 rounded-xl overflow-hidden border border-slate-200 shadow-sm">
                            <img id="founder-preview" src="{{ $currentFounder }}" alt="Founder Preview" class="w-full h-full object-cover object-top">
                        </div>
                    </div>

                    <div class="flex-1 space-y-2">
                        <label for="founder_photo" class="block text-xs font-bold text-slate-700">Unggah Foto Founder Baru</label>
                        <input type="file" id="founder_photo" name="founder_photo" accept="image/*" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <p class="text-[11px] text-slate-400">Rekomendasi rasio portrait 4:5. Maksimal 3MB.</p>
                    </div>
                </div>
            </div>

            <!-- 4. Warna Brand -->
            <div>
                <h3 class="text-sm font-extrabold text-slate-900 mb-2 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <span>Warna Utama Brand</span>
                </h3>
                <p class="text-xs text-slate-500 mb-4">Standar visual FidzzTeck adalah kombinasi Royal Blue dan Warm Yellow.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="primary_color" class="block text-xs font-bold text-slate-700 mb-1">Warna Utama (Primary Blue)</label>
                        <div class="flex items-center gap-3">
                            <input type="color" id="primary_color" name="primary_color" value="{{ old('primary_color', $settings['primary_color'] ?? '#2563EB') }}" class="w-10 h-10 rounded-lg border border-slate-200 cursor-pointer">
                            <input type="text" value="{{ old('primary_color', $settings['primary_color'] ?? '#2563EB') }}" readonly class="w-32 px-3 py-2 text-xs bg-slate-100 rounded-lg text-slate-600 font-mono">
                        </div>
                    </div>

                    <div>
                        <label for="accent_color" class="block text-xs font-bold text-slate-700 mb-1">Warna Aksen (Accent Yellow)</label>
                        <div class="flex items-center gap-3">
                            <input type="color" id="accent_color" name="accent_color" value="{{ old('accent_color', $settings['accent_color'] ?? '#F59E0B') }}" class="w-10 h-10 rounded-lg border border-slate-200 cursor-pointer">
                            <input type="text" value="{{ old('accent_color', $settings['accent_color'] ?? '#F59E0B') }}" readonly class="w-32 px-3 py-2 text-xs bg-slate-100 rounded-lg text-slate-600 font-mono">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end pt-4 border-t border-slate-100">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-8 py-3 rounded-xl shadow-lg shadow-blue-500/25 transition-all">
                    Simpan Perubahan Branding
                </button>
            </div>

        </form>

    </div>
</div>

<!-- Live Image Preview Script -->
<script>
    function setupPreview(inputId, imgId) {
        const input = document.getElementById(inputId);
        const img = document.getElementById(imgId);
        if (input && img) {
            input.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        img.src = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    }

    setupPreview('site_logo', 'logo-preview');
    setupPreview('site_favicon', 'favicon-preview');
    setupPreview('founder_photo', 'founder-preview');
</script>

@endsection

