@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Ringkasan Dashboard')

@section('content')

<!-- Stat Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    
    <!-- Stat 1: Total Proyek -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Total Proyek</p>
            <h3 class="text-3xl font-extrabold text-slate-900 mt-1">{{ $stats['total_projects'] }}</h3>
            <p class="text-[11px] text-emerald-600 font-medium mt-1">{{ $stats['published_projects'] }} Terpublikasi</p>
        </div>
        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
        </div>
    </div>

    <!-- Stat 2: Layanan Aktif -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Layanan Aktif</p>
            <h3 class="text-3xl font-extrabold text-slate-900 mt-1">{{ $stats['active_services'] }}</h3>
            <p class="text-[11px] text-blue-600 font-medium mt-1">Siap Tampil di Landing Page</p>
        </div>
        <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        </div>
    </div>

    <!-- Stat 3: Pesan Masuk Baru -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Pesan Masuk Baru</p>
            <h3 class="text-3xl font-extrabold text-amber-500 mt-1">{{ $stats['new_inquiries'] }}</h3>
            <p class="text-[11px] text-slate-500 font-medium mt-1">Dari Total {{ $stats['total_inquiries'] }} Pesan</p>
        </div>
        <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
        </div>
    </div>

    <!-- Stat 4: Total FAQ -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Total FAQ</p>
            <h3 class="text-3xl font-extrabold text-slate-900 mt-1">{{ $stats['total_faqs'] }}</h3>
            <p class="text-[11px] text-slate-500 font-medium mt-1">Panduan & Pertanyaan Umum</p>
        </div>
        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
    </div>

</div>

<!-- Quick Actions -->
<div class="bg-blue-600 text-white rounded-2xl p-6 mb-8 flex flex-col sm:flex-row items-center justify-between gap-4 shadow-lg shadow-blue-600/20">
    <div>
        <h2 class="text-lg font-bold">Pintasan Manajemen Cepat</h2>
        <p class="text-xs text-blue-100 mt-0.5">Kelola konten website dan respon prospek klien dengan cepat.</p>
    </div>
    <div class="flex flex-wrap items-center gap-3">
        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 bg-white text-blue-700 hover:bg-blue-50 text-xs font-bold px-4 py-2.5 rounded-xl shadow transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Proyek</span>
        </a>
        <a href="{{ route('admin.settings.index') }}" class="inline-flex items-center gap-2 bg-blue-700 hover:bg-blue-800 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <span>Pengaturan Website</span>
        </a>
        <a href="{{ route('admin.inquiries.index') }}" class="inline-flex items-center gap-2 bg-amber-400 hover:bg-amber-300 text-slate-950 text-xs font-bold px-4 py-2.5 rounded-xl transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            <span>Lihat Semua Pesan</span>
        </a>
    </div>
</div>

<!-- Two Columns: Latest Inquiries & Recent Projects -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    
    <!-- Latest Inquiries Table -->
    <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-base font-extrabold text-slate-900">Pesan Masuk Terbaru</h2>
                <p class="text-xs text-slate-500">Calon klien yang mengisi formulir konsultasi</p>
            </div>
            <a href="{{ route('admin.inquiries.index') }}" class="text-xs font-bold text-blue-600 hover:underline">Lihat Semua →</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-slate-500 text-[11px] uppercase tracking-wider border-y border-slate-100">
                    <tr>
                        <th class="py-3 px-3">Nama</th>
                        <th class="py-3 px-3">Layanan</th>
                        <th class="py-3 px-3">Status</th>
                        <th class="py-3 px-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($latestInquiries as $inquiry)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="py-3 px-3">
                                <p class="font-bold text-slate-900">{{ $inquiry->name }}</p>
                                <p class="text-[11px] text-slate-400">{{ $inquiry->email }}</p>
                            </td>
                            <td class="py-3 px-3">
                                <span class="text-[11px] text-slate-600">{{ $inquiry->service_type ?? '-' }}</span>
                            </td>
                            <td class="py-3 px-3">
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold border {{ $inquiry->status_badge_class }}">
                                    {{ ucfirst($inquiry->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-3 text-right">
                                <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="inline-flex items-center text-xs font-semibold text-blue-600 hover:text-blue-800">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-6 text-center text-slate-400">Belum ada pesan inquiry masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Projects Preview -->
    <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-base font-extrabold text-slate-900">Proyek Portofolio</h2>
                <p class="text-xs text-slate-500">Daftar proyek yang ada di website</p>
            </div>
            <a href="{{ route('admin.projects.index') }}" class="text-xs font-bold text-blue-600 hover:underline">Kelola →</a>
        </div>

        <div class="space-y-3">
            @forelse($recentProjects as $proj)
                <div class="flex items-center gap-3 p-3 rounded-xl border border-slate-100 hover:border-slate-200 transition-colors">
                    <img src="{{ $proj->image_url }}" alt="{{ $proj->title }}" class="w-14 h-10 object-cover rounded-lg bg-slate-100 flex-shrink-0">
                    <div class="flex-1 min-w-0">
                        <h3 class="text-xs font-bold text-slate-900 truncate">{{ $proj->title }}</h3>
                        <p class="text-[11px] text-slate-500">{{ $proj->category }}</p>
                    </div>
                    <a href="{{ route('admin.projects.edit', $proj->id) }}" class="text-slate-400 hover:text-blue-600 p-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    </a>
                </div>
            @empty
                <p class="py-6 text-center text-xs text-slate-400">Belum ada proyek.</p>
            @endforelse
        </div>
    </div>

</div>

@endsection

