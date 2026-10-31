@extends('layouts.app')

@section('content')

@php
    $siteName = $settings['site_name'] ?? 'FidzzTeck';
    $logoUrl = !empty($settings['site_logo']) ? asset('storage/' . $settings['site_logo']) : asset('images/logo.svg');
    $logoWhiteUrl = !empty($settings['site_logo']) ? asset('storage/' . $settings['site_logo']) : asset('images/logo-white.svg');
@endphp

<!-- Header / Simple Nav -->
<header class="bg-white border-b border-slate-100 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <img src="{{ $logoUrl }}" alt="{{ $siteName }}" class="h-9 w-auto object-contain" onerror="this.onerror=null; this.src='{{ asset('images/logo.svg') }}'">
        </a>
        <a href="{{ route('home') }}#projects" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            <span>Kembali ke Beranda</span>
        </a>
    </div>
</header>

<main class="py-16 bg-slate-50 min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs text-slate-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-blue-600">Beranda</a>
            <span>/</span>
            <a href="{{ route('home') }}#projects" class="hover:text-blue-600">Proyek</a>
            <span>/</span>
            <span class="text-slate-800 font-semibold">{{ $project->title }}</span>
        </nav>

        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xl overflow-hidden">
            <!-- Project Main Image Banner -->
            <div class="relative aspect-[16/9] sm:aspect-[21/9] bg-slate-900 overflow-hidden">
                <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6">
                    <span class="inline-block text-xs font-semibold text-amber-300 bg-amber-950/70 border border-amber-500/30 px-3 py-1 rounded-full mb-2">
                        {{ $project->category }}
                    </span>
                    <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                        {{ $project->title }}
                    </h1>
                </div>
            </div>

            <!-- Content Area -->
            <div class="p-6 sm:p-10 space-y-8">
                
                <!-- Quick Meta & Links -->
                <div class="flex flex-wrap items-center justify-between gap-4 pb-6 border-b border-slate-100">
                    <div>
                        <h2 class="text-xs font-bold uppercase tracking-wider text-slate-400">Teknologi & Framework</h2>
                        <div class="flex flex-wrap gap-2 mt-2">
                            @if(!empty($project->tech_stacks) && is_array($project->tech_stacks))
                                @foreach($project->tech_stacks as $tech)
                                    <span class="text-xs font-semibold text-blue-700 bg-blue-50 border border-blue-100 px-3 py-1 rounded-lg">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        @if($project->demo_url)
                            <a href="{{ $project->demo_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl shadow transition-colors">
                                <span>Kunjungi Demo</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        @endif

                        @if($project->repo_url)
                            <a href="{{ $project->repo_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 bg-slate-800 hover:bg-slate-900 text-white text-xs font-bold px-4 py-2.5 rounded-xl shadow transition-colors">
                                <span>Repository</span>
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Description -->
                <div class="prose max-w-none text-slate-700 leading-relaxed text-base space-y-4">
                    <h2 class="text-lg font-bold text-slate-900">Tentang Proyek Ini</h2>
                    <p>{{ $project->description }}</p>
                </div>

                <!-- CTA Banner -->
                <div class="mt-10 p-6 sm:p-8 bg-blue-50 border border-blue-200/70 rounded-2xl flex flex-col sm:flex-row items-center justify-between gap-6">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900">Tertarik membuat produk digital serupa?</h3>
                        <p class="text-xs sm:text-sm text-slate-600 mt-1">Konsultasikan kebutuhan bisnis Anda langsung bersama tim developer FidzzTeck.</p>
                    </div>
                    <a href="{{ route('home') }}#contact" class="inline-flex items-center gap-2 bg-amber-400 hover:bg-amber-300 text-slate-950 font-bold text-sm px-6 py-3 rounded-full shadow flex-shrink-0 transition-all">
                        <span>Konsultasi Sekarang</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

            </div>
        </div>

    </div>
</main>

<footer class="bg-[#070D1E] text-slate-400 py-6 text-center text-xs border-t border-slate-800">
    <p>{{ $settings['footer_copyright'] ?? '© ' . date('Y') . ' FidzzTeck. All rights reserved.' }}</p>
</footer>

@endsection

