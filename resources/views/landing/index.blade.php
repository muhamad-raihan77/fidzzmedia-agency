@extends('layouts.app')

@section('content')

@php
    $siteName = $settings['site_name'] ?? 'FidzzTeck';
    $siteTagline = $settings['site_tagline'] ?? 'Digital Solutions';
    $logoUrl = !empty($settings['site_logo']) ? asset('storage/' . $settings['site_logo']) : asset('images/logo.svg');
    $logoWhiteUrl = !empty($settings['site_logo']) ? asset('storage/' . $settings['site_logo']) : asset('images/logo-white.svg');
    $founderPhotoUrl = !empty($settings['founder_photo']) ? asset('storage/' . $settings['founder_photo']) : asset('images/branding/founder.jpg');
@endphp

<!-- ========================================================================= -->
<!-- NAVBAR                                                                    -->
<!-- ========================================================================= -->
<header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-100 transition-all">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <img src="{{ $logoUrl }}" alt="{{ $siteName }}" class="h-10 w-auto object-contain" onerror="this.onerror=null; this.src='{{ asset('images/logo.svg') }}'">
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden md:flex items-center gap-8 text-[15px] font-medium text-slate-600">
                <a href="#home" class="text-blue-600 font-semibold relative after:absolute after:bottom-[-6px] after:left-0 after:w-full after:h-[2px] after:bg-blue-600">Beranda</a>
                <a href="#services" class="hover:text-blue-600 transition-colors">Layanan</a>
                <a href="#projects" class="hover:text-blue-600 transition-colors">Proyek</a>
                <a href="#about" class="hover:text-blue-600 transition-colors">Tentang</a>
                <a href="#process" class="hover:text-blue-600 transition-colors">Alur Kerja</a>
                <a href="#contact" class="hover:text-blue-600 transition-colors">Kontak</a>
            </nav>

            <!-- CTA Button & Admin Link -->
            <div class="hidden md:flex items-center gap-4">
                <a href="#contact" class="inline-flex items-center gap-2 bg-amber-400 hover:bg-amber-300 text-slate-950 font-semibold text-sm px-5 py-2.5 rounded-full shadow-sm hover:shadow transition-all duration-200">
                    <span>Konsultasi Proyek</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="md:hidden flex items-center">
                <button type="button" id="mobile-menu-btn" class="p-2 text-slate-600 hover:text-slate-900 focus:outline-none" aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="hamburger-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-slate-200 px-4 pt-3 pb-6 space-y-3">
        <a href="#home" class="block px-3 py-2 text-base font-semibold text-blue-600 rounded-lg bg-blue-50">Beranda</a>
        <a href="#services" class="block px-3 py-2 text-base font-medium text-slate-700 hover:text-blue-600 hover:bg-slate-50 rounded-lg">Layanan</a>
        <a href="#projects" class="block px-3 py-2 text-base font-medium text-slate-700 hover:text-blue-600 hover:bg-slate-50 rounded-lg">Proyek</a>
        <a href="#about" class="block px-3 py-2 text-base font-medium text-slate-700 hover:text-blue-600 hover:bg-slate-50 rounded-lg">Tentang</a>
        <a href="#process" class="block px-3 py-2 text-base font-medium text-slate-700 hover:text-blue-600 hover:bg-slate-50 rounded-lg">Alur Kerja</a>
        <a href="#contact" class="block px-3 py-2 text-base font-medium text-slate-700 hover:text-blue-600 hover:bg-slate-50 rounded-lg">Kontak</a>
        <div class="pt-2">
            <a href="#contact" class="flex items-center justify-center gap-2 w-full bg-amber-400 text-slate-950 font-semibold text-sm px-4 py-3 rounded-full shadow-sm">
                <span>Konsultasi Proyek</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>
</header>


<!-- ========================================================================= -->
<!-- SECTION: HERO                                                             -->
<!-- ========================================================================= -->
<section id="home" class="relative py-12 sm:py-16 lg:py-24 bg-gradient-to-b from-slate-50/90 via-white to-slate-50/40 overflow-hidden border-b border-slate-100">
    <!-- HD Ambient Lights & Crisp Grid Texture -->
    <div class="absolute inset-0 bg-[radial-gradient(#cbd5e1_1px,transparent_1px)] [background-size:24px_24px] opacity-40 pointer-events-none -z-10"></div>
    <div class="absolute -top-24 right-0 w-[550px] h-[550px] bg-gradient-to-br from-blue-500/15 via-sky-300/10 to-transparent rounded-full blur-3xl pointer-events-none -z-10"></div>
    <div class="absolute bottom-0 left-0 w-[450px] h-[450px] bg-gradient-to-tr from-amber-400/15 via-yellow-200/10 to-transparent rounded-full blur-3xl pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            
            <!-- Left Text Content -->
            <div class="lg:col-span-6 space-y-6 sm:space-y-7">
                <!-- Main Headline -->
                <h1 class="text-3xl sm:text-4xl lg:text-[3.15rem] font-extrabold text-slate-900 tracking-tight leading-[1.2] lg:leading-[1.18]">
                    Kami Membangun <span class="text-blue-600 relative inline-block">Produk Digital</span><br class="hidden sm:inline"> yang Memajukan Bisnis Anda
                </h1>

                <!-- Subtitle Description -->
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-xl">
                    {{ $settings['hero_subtitle'] ?? 'FidzzTeck merancang dan mengembangkan website, aplikasi web, dan solusi digital kustom yang membantu bisnis bekerja lebih cerdas dan berkembang.' }}
                </p>

                <!-- Call to Actions -->
                <div class="flex flex-wrap items-center gap-3.5 sm:gap-4 pt-1">
                    <a href="#projects" class="inline-flex items-center gap-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm sm:text-base px-6 py-3.5 rounded-full shadow-lg shadow-blue-500/25 hover:shadow-blue-500/35 hover:-translate-y-0.5 transition-all duration-200">
                        <span>{{ $settings['hero_btn_primary'] ?? 'Lihat Proyek' }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <a href="#contact" class="inline-flex items-center justify-center border border-slate-300 hover:border-blue-600 hover:text-blue-600 text-slate-700 font-semibold text-sm sm:text-base px-6 py-3.5 rounded-full hover:bg-blue-50/50 transition-all duration-200">
                        <span>{{ $settings['hero_btn_secondary'] ?? 'Diskusikan Proyek' }}</span>
                    </a>
                </div>

                <!-- Three Key Highlights -->
                <div class="pt-6 border-t border-slate-200/80 grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        </div>
                        <div>
                            <h2 class="text-xs sm:text-sm font-bold text-slate-900">{{ $settings['hero_feature_1'] ?? 'Kode Terstruktur' }}</h2>
                            <p class="text-[11px] sm:text-xs text-slate-500">{{ $settings['hero_feature_1_sub'] ?? 'Performa Handal' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                        </div>
                        <div>
                            <h2 class="text-xs sm:text-sm font-bold text-slate-900">{{ $settings['hero_feature_2'] ?? 'Desain Modern' }}</h2>
                            <p class="text-[11px] sm:text-xs text-slate-500">{{ $settings['hero_feature_2_sub'] ?? 'Pengalaman Pengguna Terbaik' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h2 class="text-xs sm:text-sm font-bold text-slate-900">{{ $settings['hero_feature_3'] ?? 'Pengembangan Tepat Sasaran' }}</h2>
                            <p class="text-[11px] sm:text-xs text-slate-500">{{ $settings['hero_feature_3_sub'] ?? 'Prioritas Bisnis Anda' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Visual Composition (HD Mockup Showcase) -->
            <div class="lg:col-span-6 relative flex justify-center items-center w-full">
                
                <!-- Hand-drawn Doodle Note (top right) -->
                <div class="absolute -top-7 right-4 z-20 hidden sm:flex items-center gap-1.5 font-handwriting text-blue-600 text-base lg:text-lg font-bold rotate-2">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    <span>100% Responsif di Semua Perangkat</span>
                </div>

                <!-- HD Soft Ambient Backdrop Glow -->
                <div class="absolute -inset-2 bg-gradient-to-r from-blue-500/20 via-sky-400/15 to-amber-400/20 rounded-3xl blur-2xl -z-10 opacity-70"></div>

                <!-- Main Device Mockup Frame (HD and Fully Responsive) -->
                <div class="relative w-full max-w-lg lg:max-w-none group">
                    <div class="relative z-10 mx-auto rounded-2xl sm:rounded-3xl overflow-hidden shadow-2xl border border-slate-200/90 bg-white hover:scale-[1.01] transition-transform duration-300">
                        <img src="{{ asset('images/hero/hero-mockup.jpg') }}" alt="FidzzTeck Digital Products" class="w-full h-auto object-cover aspect-[16/10] sm:aspect-[16/10.5]" loading="eager">
                    </div>

                    <!-- Floating Badge Card: Custom Solutions for Your Business -->
                    <div class="absolute -bottom-4 right-3 sm:-bottom-5 sm:right-6 z-20 bg-white/95 backdrop-blur-md px-3.5 sm:px-4 py-2 sm:py-2.5 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-2.5 sm:gap-3">
                        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold text-xs shadow-md shadow-blue-600/30 flex-shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <p class="text-[11px] sm:text-xs font-bold text-slate-900 leading-tight">Solusi Kustom</p>
                            <p class="text-[10px] sm:text-[11px] text-slate-500 leading-tight">Untuk Skalabilitas Bisnis</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>


<!-- ========================================================================= -->
<!-- SECTION: SERVICES ("What We Do" / "Layanan Kami")                         -->
<!-- ========================================================================= -->
<section id="services" class="py-20 bg-slate-50/70 border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-blue-600 mb-2 block">LAYANAN KAMI</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Layanan Kami</h2>
            </div>
            <div class="md:max-w-md flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <p class="text-sm text-slate-600 leading-relaxed">
                    Kami menyediakan solusi digital yang handal dan skalabel untuk membantu bisnis Anda berkembang di era digital.
                </p>
                <a href="#contact" class="hidden sm:inline-flex items-center gap-1.5 text-sm font-semibold text-blue-600 hover:text-blue-700 hover:underline flex-shrink-0">
                    <span>Lihat Semua Layanan</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <!-- 4 Services Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($services as $service)
                <div class="group relative bg-white p-7 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-xl hover:border-blue-500/50 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <!-- Top Icon & Number Badge -->
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-12 h-12 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-md shadow-blue-500/20 group-hover:scale-105 transition-transform duration-200">
                                @if($service->icon === 'globe')
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                                @elseif($service->icon === 'code')
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                                @elseif($service->icon === 'database')
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                                @elseif($service->icon === 'palette')
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                                @else
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                @endif
                            </div>
                            <span class="text-xl font-bold text-slate-200 group-hover:text-blue-200 transition-colors">
                                {{ $service->number_badge ?? sprintf('%02d', $loop->iteration) }}
                            </span>
                        </div>

                        <!-- Service Title -->
                        <h3 class="text-lg font-bold text-slate-900 mb-2.5 group-hover:text-blue-600 transition-colors">
                            {{ $service->name }}
                        </h3>

                        <!-- Service Description -->
                        <p class="text-sm text-slate-600 leading-relaxed">
                            {{ $service->description }}
                        </p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-blue-600">
                        <span>Konsultasi Layanan</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center py-12 text-slate-500">Belum ada layanan yang ditambahkan.</div>
            @endforelse
        </div>

    </div>
</section>


<!-- ========================================================================= -->
<!-- SECTION: PORTFOLIO ("Our Latest Work" / "Proyek Terbaru Kami")            -->
<!-- ========================================================================= -->
<section id="projects" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="flex items-end justify-between mb-12">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-blue-600 mb-2 block">PROYEK TERBARU</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Proyek Terbaru Kami</h2>
            </div>
            <a href="#contact" class="hidden sm:inline-flex items-center gap-1.5 text-sm font-semibold text-blue-600 hover:text-blue-700 hover:underline">
                <span>Lihat Semua Proyek</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <!-- 4 Projects Horizontal Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($projects as $project)
                <div class="group bg-white rounded-2xl border border-slate-200/90 overflow-hidden shadow-sm hover:shadow-xl hover:border-blue-400 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <!-- Project Image Container -->
                        <div class="relative overflow-hidden aspect-[16/10] bg-slate-100">
                            @php
                                $imgSrc = $project->image_url;
                            @endphp
                            <img src="{{ $imgSrc }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" onerror="this.onerror=null; this.src='{{ asset('images/projects/project-1.jpg') }}'">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                                <a href="{{ route('project.detail', $project->slug) }}" class="inline-flex items-center gap-1 text-xs font-semibold text-white bg-blue-600 hover:bg-blue-700 px-3 py-1.5 rounded-full shadow">
                                    <span>Detail Proyek</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>

                        <!-- Content Details -->
                        <div class="p-5">
                            <!-- Category Badge -->
                            <span class="inline-block text-[11px] font-semibold text-blue-700 bg-blue-50 px-2.5 py-0.5 rounded-full mb-2">
                                {{ $project->category }}
                            </span>

                            <!-- Title -->
                            <h3 class="text-base font-bold text-slate-900 group-hover:text-blue-600 transition-colors line-clamp-1">
                                <a href="{{ route('project.detail', $project->slug) }}">{{ $project->title }}</a>
                            </h3>

                            <!-- Short Description -->
                            <p class="text-xs text-slate-500 mt-2 line-clamp-2 leading-relaxed">
                                {{ $project->description }}
                            </p>
                        </div>
                    </div>

                    <!-- Tech Stack Pills Footer -->
                    <div class="px-5 pb-5 pt-3 border-t border-slate-100">
                        <div class="flex flex-wrap gap-1.5">
                            @if(!empty($project->tech_stacks) && is_array($project->tech_stacks))
                                @foreach($project->tech_stacks as $tech)
                                    <span class="text-[10px] font-medium text-slate-600 bg-slate-100 px-2 py-0.5 rounded">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            @else
                                <span class="text-[10px] font-medium text-slate-600 bg-slate-100 px-2 py-0.5 rounded">Laravel 12</span>
                                <span class="text-[10px] font-medium text-slate-600 bg-slate-100 px-2 py-0.5 rounded">Tailwind CSS</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center py-12 text-slate-500">Belum ada proyek yang dipublikasikan.</div>
            @endforelse
        </div>

    </div>
</section>


<!-- ========================================================================= -->
<!-- SECTION: ABOUT & FOUNDER PROFILE ("Built with Purpose...")                -->
<!-- ========================================================================= -->
<section id="about" class="py-20 bg-[#EDF4FE]/80 border-y border-blue-100/60 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <!-- Left: Founder Photo (with yellow background block & doodle) -->
            <div class="lg:col-span-4 flex flex-col items-center lg:items-start">
                <div class="relative">
                    <!-- Yellow offset backdrop card -->
                    <div class="absolute -top-3 -left-3 w-full h-full bg-amber-400 rounded-2xl -z-10 shadow-md"></div>
                    
                    <!-- Photo container -->
                    <div class="w-64 sm:w-72 aspect-[4/5] rounded-2xl overflow-hidden shadow-xl bg-slate-800 border-2 border-white">
                        <img src="{{ $founderPhotoUrl }}" alt="{{ $settings['founder_name'] ?? 'Fauzan Dwi' }}" class="w-full h-full object-cover object-top hover:scale-105 transition-transform duration-500" onerror="this.onerror=null; this.src='{{ asset('images/branding/founder.jpg') }}'">
                    </div>

                    <!-- Doodle / Signature under photo -->
                    <div class="mt-4 flex items-center justify-center lg:justify-start gap-2 font-handwriting text-blue-700 text-lg font-bold">
                        <svg class="w-6 h-6 text-blue-600 -rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/></svg>
                        <span>{{ $settings['founder_badge'] ?? 'CEO & Founder FidzzTeck' }}</span>
                    </div>
                </div>
            </div>

            <!-- Middle: Purpose & Key Pillars -->
            <div class="lg:col-span-4 space-y-5">
                <span class="text-xs font-bold uppercase tracking-wider text-blue-600 block">
                    {{ $settings['about_tag'] ?? 'TENTANG FIDZZTECK' }}
                </span>
                
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight leading-snug">
                    {{ $settings['about_title'] ?? 'Dibangun dengan Tujuan. Dikembangkan dengan Ketelitian.' }}
                </h2>

                <p class="text-sm text-slate-600 leading-relaxed">
                    {{ $settings['about_description'] ?? 'FidzzTeck membantu bisnis mengubah ide menjadi produk digital yang praktis melalui desain matang, pengembangan teruji, dan solusi yang disesuaikan dengan kebutuhan Anda.' }}
                </p>

                <!-- 4 Pillars with diamond icons -->
                <div class="grid grid-cols-2 gap-3 pt-2">
                    <div class="flex items-center gap-2.5 text-xs font-bold text-slate-800">
                        <div class="w-5 h-5 rounded bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span>Web Development</span>
                    </div>
                    <div class="flex items-center gap-2.5 text-xs font-bold text-slate-800">
                        <div class="w-5 h-5 rounded bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span>Problem Solving</span>
                    </div>
                    <div class="flex items-center gap-2.5 text-xs font-bold text-slate-800">
                        <div class="w-5 h-5 rounded bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span>Clean Code</span>
                    </div>
                    <div class="flex items-center gap-2.5 text-xs font-bold text-slate-800">
                        <div class="w-5 h-5 rounded bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span>Client Focus</span>
                    </div>
                </div>
            </div>

            <!-- Right: Founder Bio & Tech Stack -->
            <div class="lg:col-span-4 bg-white/90 backdrop-blur-sm p-6 sm:p-7 rounded-2xl border border-blue-100 shadow-sm space-y-5">
                <div>
                    <h3 class="text-xl font-extrabold text-slate-900">{{ $settings['founder_name'] ?? 'Fauzan Dwi' }}</h3>
                    <p class="text-xs font-semibold text-blue-600">{{ $settings['founder_role'] ?? 'CEO & Lead Developer' }}</p>
                </div>

                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed italic border-l-2 border-blue-500 pl-3">
                    "{{ $settings['founder_bio'] ?? 'Dengan pengalaman di bidang pengembangan web dan aplikasi, saya percaya bahwa teknologi adalah alat untuk menciptakan solusi nyata yang berdampak. FidzzTeck hadir untuk menjadi partner digital yang bisa diandalkan.' }}"
                </p>

                <div>
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Our Tech Stack</h4>
                    <div class="grid grid-cols-3 gap-2">
                        <div class="flex items-center gap-1.5 p-2 bg-slate-50 border border-slate-100 rounded-lg text-[11px] font-semibold text-slate-700">
                            <span class="w-2 h-2 rounded-full bg-red-500"></span>
                            <span>Laravel</span>
                        </div>
                        <div class="flex items-center gap-1.5 p-2 bg-slate-50 border border-slate-100 rounded-lg text-[11px] font-semibold text-slate-700">
                            <span class="w-2 h-2 rounded-full bg-sky-400"></span>
                            <span>Tailwind</span>
                        </div>
                        <div class="flex items-center gap-1.5 p-2 bg-slate-50 border border-slate-100 rounded-lg text-[11px] font-semibold text-slate-700">
                            <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                            <span>MySQL</span>
                        </div>
                        <div class="flex items-center gap-1.5 p-2 bg-slate-50 border border-slate-100 rounded-lg text-[11px] font-semibold text-slate-700">
                            <span class="w-2 h-2 rounded-full bg-yellow-400"></span>
                            <span>JavaScript</span>
                        </div>
                        <div class="flex items-center gap-1.5 p-2 bg-slate-50 border border-slate-100 rounded-lg text-[11px] font-semibold text-slate-700">
                            <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                            <span>Git</span>
                        </div>
                        <div class="flex items-center gap-1.5 p-2 bg-slate-50 border border-slate-100 rounded-lg text-[11px] font-semibold text-slate-700">
                            <span class="w-2 h-2 rounded-full bg-purple-500"></span>
                            <span>Figma</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ========================================================================= -->
<!-- SECTION: WORKFLOW / HOW WE WORK ("Bagaimana Kami Bekerja")                 -->
<!-- ========================================================================= -->
<section id="process" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <!-- Left Header -->
            <div class="lg:col-span-4 space-y-4">
                <span class="text-xs font-bold uppercase tracking-wider text-blue-600 block">ALUR KERJA</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Bagaimana Kami Bekerja</h2>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Kami memiliki alur kerja yang jelas dan terstruktur untuk memastikan setiap proyek berjalan dengan baik dan tepat waktu.
                </p>
                <a href="#contact" class="inline-flex items-center gap-1.5 text-sm font-semibold text-blue-600 hover:text-blue-700 hover:underline pt-2">
                    <span>Pelajari Lebih Lanjut</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Right: 4 Steps Horizontal Flow -->
            <div class="lg:col-span-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 relative">
                    
                    <!-- Step 1 -->
                    <div class="relative flex flex-col items-start group">
                        <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center border-2 border-blue-200 mb-4 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>
                        <span class="text-[11px] font-bold text-slate-400">01</span>
                        <h3 class="text-sm font-bold text-slate-900 mt-0.5 mb-1.5">Discovery</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">Kami memahami kebutuhan dan tujuan bisnis Anda.</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative flex flex-col items-start group">
                        <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center border-2 border-blue-200 mb-4 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <span class="text-[11px] font-bold text-slate-400">02</span>
                        <h3 class="text-sm font-bold text-slate-900 mt-0.5 mb-1.5">Planning</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">Menyusun ruang lingkup, alur, dan estimasi proyek.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative flex flex-col items-start group">
                        <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center border-2 border-blue-200 mb-4 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        </div>
                        <span class="text-[11px] font-bold text-slate-400">03</span>
                        <h3 class="text-sm font-bold text-slate-900 mt-0.5 mb-1.5">Design & Development</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">Membuat desain dan mengembangkan sistem.</p>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative flex flex-col items-start group">
                        <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center border-2 border-blue-200 mb-4 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <span class="text-[11px] font-bold text-slate-400">04</span>
                        <h3 class="text-sm font-bold text-slate-900 mt-0.5 mb-1.5">Launch & Support</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">Melakukan pengujian, deployment, dan dukungan berkala.</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<!-- ========================================================================= -->
<!-- SECTION: FAQ (Accordion)                                                  -->
<!-- ========================================================================= -->
@if(count($faqs) > 0)
<section class="py-16 bg-slate-50 border-t border-slate-100">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="text-xs font-bold uppercase tracking-wider text-blue-600 block mb-2">PERTANYAAN UMUM</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Pertanyaan yang Sering Diajukan</h2>
        </div>

        <div class="space-y-4" id="faq-accordion">
            @foreach($faqs as $faq)
                <div class="bg-white rounded-xl border border-slate-200/80 shadow-sm overflow-hidden">
                    <button type="button" onclick="toggleFaq({{ $faq->id }})" class="w-full px-6 py-4 text-left flex items-center justify-between font-bold text-slate-900 hover:text-blue-600 transition-colors">
                        <span>{{ $faq->question }}</span>
                        <svg id="faq-icon-{{ $faq->id }}" class="w-5 h-5 text-slate-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div id="faq-content-{{ $faq->id }}" class="hidden px-6 pb-5 text-sm text-slate-600 leading-relaxed border-t border-slate-50 pt-3">
                        {{ $faq->answer }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<script>
    function toggleFaq(id) {
        const content = document.getElementById('faq-content-' + id);
        const icon = document.getElementById('faq-icon-' + id);
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            icon.classList.add('rotate-180');
        } else {
            content.classList.add('hidden');
            icon.classList.remove('rotate-180');
        }
    }
</script>
@endif


<!-- ========================================================================= -->
<!-- SECTION: CONTACT ("Punya Ide Proyek? Konsultasikan Sekarang!")            -->
<!-- ========================================================================= -->
<section id="contact" class="py-20 bg-[#0B132B] text-white relative overflow-hidden">
    <!-- Subtle Background Glows -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Info Column -->
            <div class="lg:col-span-5 space-y-6">
                <span class="text-xs font-bold uppercase tracking-wider text-amber-400 block">MARI BERKOLABORASI</span>
                
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight leading-tight">
                    Punya Ide Project?<br>Konsultasikan Sekarang!
                </h2>

                <p class="text-slate-300 text-sm leading-relaxed max-w-md">
                    Kami siap membantu Anda mewujudkan solusi digital terbaik untuk mempercepat akselerasi dan kemajuan bisnis Anda.
                </p>

                <!-- Contact Detail Items -->
                <div class="space-y-4 pt-4 border-t border-slate-800">
                    <!-- WhatsApp -->
                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-blue-900/50 border border-blue-700/50 text-amber-400 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Chat via WhatsApp</p>
                            <p class="text-sm font-semibold text-white">{{ $settings['contact_phone'] ?? '+62 812-3456-7890' }}</p>
                            <p class="text-[11px] text-slate-400">{{ $settings['contact_hours'] ?? '(Senin - Jumat, 08:00 - 17:00)' }}</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-blue-900/50 border border-blue-700/50 text-amber-400 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Email Resmi</p>
                            <p class="text-sm font-semibold text-white">{{ $settings['contact_email'] ?? 'hello@fidzzteck.com' }}</p>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-blue-900/50 border border-blue-700/50 text-amber-400 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Lokasi Layanan</p>
                            <p class="text-sm font-semibold text-white">{{ $settings['contact_location'] ?? 'Indonesia' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Form Card (Crisp White Card Container) -->
            <div class="lg:col-span-7">
                <div class="bg-white text-slate-900 rounded-3xl p-6 sm:p-8 shadow-2xl border border-slate-100">
                    <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama Anda" required class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none transition-all">
                                @error('name')
                                    <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-xs font-bold text-slate-700 mb-1">Email <span class="text-red-500">*</span></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email Anda" required class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none transition-all">
                                @error('email')
                                    <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Phone / WhatsApp -->
                            <div>
                                <label for="phone" class="block text-xs font-bold text-slate-700 mb-1">Nomor WhatsApp <span class="text-slate-400 font-normal">(opsional)</span></label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+62 812-xxxx-xxxx" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none transition-all">
                                @error('phone')
                                    <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Service Type Dropdown -->
                            <div>
                                <label for="service_type" class="block text-xs font-bold text-slate-700 mb-1">Jenis Layanan</label>
                                <select id="service_type" name="service_type" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none transition-all bg-white">
                                    <option value="Pembuatan Website">Pembuatan Website</option>
                                    <option value="Pengembangan Aplikasi Web">Pengembangan Aplikasi Web</option>
                                    <option value="Sistem Informasi Custom">Sistem Informasi Custom</option>
                                    <option value="Desain UI/UX">Desain UI/UX</option>
                                    <option value="Lainnya">Lainnya / Konsultasi</option>
                                </select>
                            </div>
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-xs font-bold text-slate-700 mb-1">Deskripsi Kebutuhan <span class="text-red-500">*</span></label>
                            <textarea id="message" name="message" rows="3" placeholder="Ceritakan kebutuhan proyek, target waktu, atau ide digital Anda..." required class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none transition-all resize-none">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button type="submit" class="w-full flex items-center justify-center gap-2 bg-amber-400 hover:bg-amber-300 text-slate-950 font-bold text-sm px-6 py-3.5 rounded-xl shadow-md hover:shadow-lg transition-all duration-200">
                                <span>Kirim Pesan</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ========================================================================= -->
<!-- FOOTER                                                                    -->
<!-- ========================================================================= -->
<footer class="bg-[#070D1E] text-slate-400 pt-12 pb-8 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 pb-8 border-b border-slate-800/80">
            <!-- Footer Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <img src="{{ $logoWhiteUrl }}" alt="{{ $siteName }}" class="h-9 w-auto object-contain" onerror="this.onerror=null; this.src='{{ asset('images/logo-white.svg') }}'">
            </a>

            <!-- Footer Links -->
            <div class="flex flex-wrap items-center justify-center gap-6 text-xs font-semibold text-slate-400">
                <a href="#home" class="hover:text-white transition-colors">Beranda</a>
                <a href="#services" class="hover:text-white transition-colors">Layanan</a>
                <a href="#projects" class="hover:text-white transition-colors">Proyek</a>
                <a href="#about" class="hover:text-white transition-colors">Tentang</a>
                <a href="#process" class="hover:text-white transition-colors">Alur Kerja</a>
                <a href="#contact" class="hover:text-white transition-colors">Kontak</a>
                <a href="{{ route('login') }}" class="hover:text-amber-400 transition-colors">Admin Login</a>
            </div>

            <!-- Social Links -->
            <div class="flex items-center gap-3">
                <a href="#" class="w-8 h-8 rounded-full bg-slate-800/80 hover:bg-blue-600 text-slate-300 hover:text-white flex items-center justify-center transition-colors" aria-label="Facebook">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.374 14.5 5 15.667 5H18V0h-3.808C10.595 0 9 1.582 9 4.615V8z"/></svg>
                </a>
                <a href="#" class="w-8 h-8 rounded-full bg-slate-800/80 hover:bg-pink-600 text-slate-300 hover:text-white flex items-center justify-center transition-colors" aria-label="Instagram">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
                <a href="#" class="w-8 h-8 rounded-full bg-slate-800/80 hover:bg-blue-500 text-slate-300 hover:text-white flex items-center justify-center transition-colors" aria-label="LinkedIn">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg>
                </a>
                <a href="#" class="w-8 h-8 rounded-full bg-slate-800/80 hover:bg-red-600 text-slate-300 hover:text-white flex items-center justify-center transition-colors" aria-label="YouTube">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                </a>
            </div>
        </div>

        <div class="pt-6 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500">
            <p>{{ $settings['footer_copyright'] ?? '© ' . date('Y') . ' FidzzTeck. All rights reserved.' }}</p>
            <p class="mt-2 sm:mt-0">Dibuat dengan presisi & standar kode bersih.</p>
        </div>
    </div>
</footer>

<!-- Interactive Mobile Nav Toggle Script -->
<script>
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            const isExpanded = !mobileMenu.classList.contains('hidden');
            if (isExpanded) {
                mobileMenu.classList.add('hidden');
                hamburgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            } else {
                mobileMenu.classList.remove('hidden');
                hamburgerIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            }
        });

        // Close on link click
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                hamburgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            });
        });
    }
</script>

@endsection

