@extends('layouts.admin')

@section('title', 'Profil Founder')
@section('page_title', 'Kelola Profil Founder & Tim')

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-8">
        
        <form action="{{ route('admin.founder.update') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label for="founder_name" class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap Founder <span class="text-red-500">*</span></label>
                    <input type="text" id="founder_name" name="founder_name" value="{{ old('founder_name', $settings['founder_name'] ?? 'Fauzan Dwi') }}" required class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                </div>

                <!-- Role -->
                <div>
                    <label for="founder_role" class="block text-xs font-bold text-slate-700 mb-1">Jabatan / Role <span class="text-red-500">*</span></label>
                    <input type="text" id="founder_role" name="founder_role" value="{{ old('founder_role', $settings['founder_role'] ?? 'CEO & Lead Developer') }}" required class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                </div>
            </div>

            <!-- Badge Text (Doodle) -->
            <div>
                <label for="founder_badge" class="block text-xs font-bold text-slate-700 mb-1">Teks Badge / Doodle di Bawah Foto</label>
                <input type="text" id="founder_badge" name="founder_badge" value="{{ old('founder_badge', $settings['founder_badge'] ?? 'CEO & Founder FidzzTeck') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                <p class="text-[11px] text-slate-400 mt-1">Ditampilkan dengan gaya font tulisan tangan santai dan ikon panah di landing page.</p>
            </div>

            <!-- Bio -->
            <div>
                <label for="founder_bio" class="block text-xs font-bold text-slate-700 mb-1">Biografi & Pernyataan Visi <span class="text-red-500">*</span></label>
                <textarea id="founder_bio" name="founder_bio" rows="4" required class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none leading-relaxed">{{ old('founder_bio', $settings['founder_bio'] ?? 'Dengan pengalaman di bidang pengembangan web dan aplikasi, saya percaya bahwa teknologi adalah alat untuk menciptakan solusi nyata yang berdampak. FidzzTeck hadir untuk menjadi partner digital yang bisa diandalkan.') }}</textarea>
            </div>

            <!-- Skills / Tech Stacks -->
            <div>
                <label for="founder_skills" class="block text-xs font-bold text-slate-700 mb-1">Daftar Keahlian Utama (Our Tech Stack)</label>
                <input type="text" id="founder_skills" name="founder_skills" value="{{ old('founder_skills', $settings['founder_skills'] ?? 'Laravel, Tailwind CSS, MySQL, JavaScript, Git, Figma') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                <p class="text-[11px] text-slate-400 mt-1">Pisahkan nama keahlian dengan tanda koma.</p>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <a href="{{ route('admin.branding.index') }}" class="text-xs text-blue-600 hover:underline">
                    Ganti Foto Founder di Menu Branding →
                </a>

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-6 py-2.5 rounded-xl shadow transition-colors">
                    Simpan Profil Founder
                </button>
            </div>

        </form>

    </div>
</div>

@endsection

