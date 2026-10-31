@extends('layouts.admin')

@section('title', 'Detail Pesan Proyek')
@section('page_title', 'Detail Pesan dari: ' . $inquiry->name)

@section('content')

@php
    // Clean phone number for WhatsApp URL
    $cleanPhone = preg_replace('/[^0-9]/', '', $inquiry->phone ?? '');
    if (str_starts_with($cleanPhone, '0')) {
        $cleanPhone = '62' . substr($cleanPhone, 1);
    }
    $waGreeting = urlencode("Halo {$inquiry->name}, terima kasih telah menghubungi FidzzTeck terkait kebutuhan {$inquiry->service_type}.");
    $waUrl = $cleanPhone ? "https://wa.me/{$cleanPhone}?text={$waGreeting}" : null;
@endphp

<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.inquiries.index') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 hover:text-blue-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            <span>Kembali ke Daftar Pesan</span>
        </a>

        <div class="flex items-center gap-3">
            @if($waUrl)
                <a href="{{ $waUrl }}" target="_blank" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-3.5 py-2 rounded-xl shadow transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span>Hubungi via WhatsApp</span>
                </a>
            @endif

            <a href="mailto:{{ $inquiry->email }}?subject={{ urlencode('Tanggapan Konsultasi FidzzTeck - ' . $inquiry->service_type) }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-3.5 py-2 rounded-xl shadow transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span>Balas via Email</span>
            </a>
        </div>
    </div>

    <!-- Message Details Card -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-8 space-y-6">
        
        <!-- Header Meta -->
        <div class="flex flex-wrap items-center justify-between gap-4 pb-6 border-b border-slate-100">
            <div>
                <span class="text-xs text-slate-400">Pengirim</span>
                <h2 class="text-xl font-bold text-slate-900">{{ $inquiry->name }}</h2>
                <div class="flex flex-wrap items-center gap-4 text-xs text-slate-600 mt-1">
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>{{ $inquiry->email }}</span>
                    </span>
                    @if($inquiry->phone)
                        <span class="flex items-center gap-1 font-mono">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>{{ $inquiry->phone }}</span>
                        </span>
                    @endif
                </div>
            </div>

            <div class="text-right">
                <span class="text-xs text-slate-400 block mb-1">Status Prospek</span>
                <span class="px-3 py-1 rounded-full text-xs font-bold border {{ $inquiry->status_badge_class }}">
                    {{ ucfirst($inquiry->status) }}
                </span>
                <p class="text-[11px] text-slate-400 mt-1">Diterima {{ $inquiry->created_at->format('d M Y, H:i') }}</p>
            </div>
        </div>

        <!-- Service Chosen -->
        <div>
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Layanan yang Diminati</h3>
            <span class="inline-block px-3 py-1 bg-blue-50 text-blue-700 font-semibold text-xs rounded-lg">
                {{ $inquiry->service_type ?? 'Konsultasi Umum' }}
            </span>
        </div>

        <!-- Message Body -->
        <div>
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Deskripsi Kebutuhan Proyek</h3>
            <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 text-sm text-slate-800 leading-relaxed whitespace-pre-line">
                {{ $inquiry->message }}
            </div>
        </div>

        <!-- Status & Notes Form -->
        <form action="{{ route('admin.inquiries.update', $inquiry->id) }}" method="POST" class="pt-6 border-t border-slate-100 space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="status" class="block text-xs font-bold text-slate-700 mb-1">Perbarui Status</label>
                    <select id="status" name="status" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none bg-white font-semibold">
                        <option value="baru" {{ $inquiry->status === 'baru' ? 'selected' : '' }}>Baru (Belum Ditanggapi)</option>
                        <option value="diproses" {{ $inquiry->status === 'diproses' ? 'selected' : '' }}>Diproses (Sedang Diskusi / Negosiasi)</option>
                        <option value="selesai" {{ $inquiry->status === 'selesai' ? 'selected' : '' }}>Selesai (Deal / Selesai Konsultasi)</option>
                        <option value="diarsipkan" {{ $inquiry->status === 'diarsipkan' ? 'selected' : '' }}>Diarsipkan (Tidak Aktif)</option>
                    </select>
                </div>

                <div>
                    <label for="admin_notes" class="block text-xs font-bold text-slate-700 mb-1">Catatan Internal Admin</label>
                    <textarea id="admin_notes" name="admin_notes" rows="2" placeholder="Catatan internal tim developer..." class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">{{ old('admin_notes', $inquiry->admin_notes) }}</textarea>
                </div>
            </div>

            <div class="flex items-center justify-between pt-2">
                <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-xs font-semibold text-red-500 hover:text-red-700">
                        Hapus Pesan Ini
                    </button>
                </form>

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-6 py-2.5 rounded-xl shadow transition-colors">
                    Simpan Perubahan
                </button>
            </div>
        </form>

    </div>

</div>

@endsection

