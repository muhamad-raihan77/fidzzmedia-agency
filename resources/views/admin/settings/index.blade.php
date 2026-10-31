@extends('layouts.admin')

@section('title', 'Pengaturan Website')
@section('page_title', 'Pengaturan Umum Website')

@section('content')

<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-8">
        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
            @csrf

            <!-- Section 1: Identitas Brand -->
            <div>
                <h3 class="text-sm font-extrabold text-slate-900 mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <span>Identitas Brand & Perusahaan</span>
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="site_name" class="block text-xs font-bold text-slate-700 mb-1">Nama Perusahaan / Brand</label>
                        <input type="text" id="site_name" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? 'FidzzTeck') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                    </div>

                    <div>
                        <label for="site_tagline" class="block text-xs font-bold text-slate-700 mb-1">Tagline</label>
                        <input type="text" id="site_tagline" name="site_tagline" value="{{ old('site_tagline', $settings['site_tagline'] ?? 'Digital Solutions') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                    </div>
                </div>
            </div>

            <!-- Section 2: Hero Section -->
            <div>
                <h3 class="text-sm font-extrabold text-slate-900 mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <span>Hero Section (Bagian Atas Landing Page)</span>
                </h3>

                <div class="space-y-4">
                    <div>
                        <label for="hero_badge" class="block text-xs font-bold text-slate-700 mb-1">Badge Atas</label>
                        <input type="text" id="hero_badge" name="hero_badge" value="{{ old('hero_badge', $settings['hero_badge'] ?? 'AGENSI DIGITAL & PENGEMBANGAN SOFTWARE') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                    </div>

                    <div>
                        <label for="hero_subtitle" class="block text-xs font-bold text-slate-700 mb-1">Deskripsi Singkat Hero</label>
                        <textarea id="hero_subtitle" name="hero_subtitle" rows="3" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">{{ old('hero_subtitle', $settings['hero_subtitle'] ?? 'FidzzTeck merancang dan mengembangkan website, aplikasi web, dan solusi digital kustom yang membantu bisnis bekerja lebih cerdas dan berkembang.') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="hero_btn_primary" class="block text-xs font-bold text-slate-700 mb-1">Teks Tombol Utama (Biru)</label>
                            <input type="text" id="hero_btn_primary" name="hero_btn_primary" value="{{ old('hero_btn_primary', $settings['hero_btn_primary'] ?? 'Lihat Proyek') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                        </div>

                        <div>
                            <label for="hero_btn_secondary" class="block text-xs font-bold text-slate-700 mb-1">Teks Tombol Sekunder (Outline)</label>
                            <input type="text" id="hero_btn_secondary" name="hero_btn_secondary" value="{{ old('hero_btn_secondary', $settings['hero_btn_secondary'] ?? 'Diskusikan Proyek') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                        </div>
                    </div>

                    <!-- 3 Feature Highlights -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                        <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                            <label class="block text-[11px] font-bold text-slate-700 mb-1">Keunggulan 1</label>
                            <input type="text" name="hero_feature_1" value="{{ old('hero_feature_1', $settings['hero_feature_1'] ?? 'Kode Terstruktur') }}" class="w-full px-2.5 py-1.5 text-xs rounded-lg border border-slate-200 mb-1">
                            <input type="text" name="hero_feature_1_sub" value="{{ old('hero_feature_1_sub', $settings['hero_feature_1_sub'] ?? 'Performa Handal') }}" class="w-full px-2.5 py-1.5 text-xs rounded-lg border border-slate-200 text-slate-500">
                        </div>
                        <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                            <label class="block text-[11px] font-bold text-slate-700 mb-1">Keunggulan 2</label>
                            <input type="text" name="hero_feature_2" value="{{ old('hero_feature_2', $settings['hero_feature_2'] ?? 'Desain Modern') }}" class="w-full px-2.5 py-1.5 text-xs rounded-lg border border-slate-200 mb-1">
                            <input type="text" name="hero_feature_2_sub" value="{{ old('hero_feature_2_sub', $settings['hero_feature_2_sub'] ?? 'Pengalaman Pengguna Terbaik') }}" class="w-full px-2.5 py-1.5 text-xs rounded-lg border border-slate-200 text-slate-500">
                        </div>
                        <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                            <label class="block text-[11px] font-bold text-slate-700 mb-1">Keunggulan 3</label>
                            <input type="text" name="hero_feature_3" value="{{ old('hero_feature_3', $settings['hero_feature_3'] ?? 'Pengembangan Tepat Sasaran') }}" class="w-full px-2.5 py-1.5 text-xs rounded-lg border border-slate-200 mb-1">
                            <input type="text" name="hero_feature_3_sub" value="{{ old('hero_feature_3_sub', $settings['hero_feature_3_sub'] ?? 'Prioritas Bisnis Anda') }}" class="w-full px-2.5 py-1.5 text-xs rounded-lg border border-slate-200 text-slate-500">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 3: Kontak & Lokasi -->
            <div>
                <h3 class="text-sm font-extrabold text-slate-900 mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <span>Informasi Kontak & Lokasi</span>
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="contact_phone" class="block text-xs font-bold text-slate-700 mb-1">Nomor WhatsApp</label>
                        <input type="text" id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '+62 812-3456-7890') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                    </div>

                    <div>
                        <label for="contact_hours" class="block text-xs font-bold text-slate-700 mb-1">Jam Operasional</label>
                        <input type="text" id="contact_hours" name="contact_hours" value="{{ old('contact_hours', $settings['contact_hours'] ?? '(Senin - Jumat, 08:00 - 17:00)') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                    </div>

                    <div>
                        <label for="contact_email" class="block text-xs font-bold text-slate-700 mb-1">Email Resmi</label>
                        <input type="email" id="contact_email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? 'hello@fidzzteck.com') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                    </div>

                    <div>
                        <label for="contact_location" class="block text-xs font-bold text-slate-700 mb-1">Lokasi Perusahaan</label>
                        <input type="text" id="contact_location" name="contact_location" value="{{ old('contact_location', $settings['contact_location'] ?? 'Indonesia') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                    </div>
                </div>
            </div>

            <!-- Section 4: SEO & Footer -->
            <div>
                <h3 class="text-sm font-extrabold text-slate-900 mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <span>Metadata SEO & Footer</span>
                </h3>

                <div class="space-y-4">
                    <div>
                        <label for="meta_title" class="block text-xs font-bold text-slate-700 mb-1">Judul Halaman (Meta Title SEO)</label>
                        <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title', $settings['meta_title'] ?? 'FidzzTeck — Agensi Digital & Pengembangan Software') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                    </div>

                    <div>
                        <label for="meta_description" class="block text-xs font-bold text-slate-700 mb-1">Deskripsi Halaman (Meta Description SEO)</label>
                        <textarea id="meta_description" name="meta_description" rows="2" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">{{ old('meta_description', $settings['meta_description'] ?? 'Kami membangun website, aplikasi web, dan solusi digital kustom untuk membantu bisnis Anda berkembang.') }}</textarea>
                    </div>

                    <div>
                        <label for="footer_copyright" class="block text-xs font-bold text-slate-700 mb-1">Teks Hak Cipta Footer</label>
                        <input type="text" id="footer_copyright" name="footer_copyright" value="{{ old('footer_copyright', $settings['footer_copyright'] ?? '© 2025 FidzzTeck. All rights reserved.') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end pt-4 border-t border-slate-100">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-8 py-3 rounded-xl shadow-lg shadow-blue-500/25 transition-all">
                    Simpan Seluruh Pengaturan
                </button>
            </div>

        </form>
    </div>
</div>

@endsection

