@extends('layouts.admin')

@section('title', 'Kelola Pesan Proyek')
@section('page_title', 'Kelola Pesan Proyek (Inquiries)')

@section('content')

<div class="space-y-6">

    <!-- Status Filter Badges -->
    <div class="flex flex-wrap items-center gap-2">
        <a href="{{ route('admin.inquiries.index') }}" class="px-3.5 py-1.5 rounded-full text-xs font-bold transition-colors {{ empty($status) ? 'bg-blue-600 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
            Semua ({{ $counts['all'] }})
        </a>
        <a href="{{ route('admin.inquiries.index', ['status' => 'baru']) }}" class="px-3.5 py-1.5 rounded-full text-xs font-bold transition-colors {{ $status === 'baru' ? 'bg-amber-400 text-slate-950' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
            Baru ({{ $counts['baru'] }})
        </a>
        <a href="{{ route('admin.inquiries.index', ['status' => 'diproses']) }}" class="px-3.5 py-1.5 rounded-full text-xs font-bold transition-colors {{ $status === 'diproses' ? 'bg-blue-600 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
            Diproses ({{ $counts['diproses'] }})
        </a>
        <a href="{{ route('admin.inquiries.index', ['status' => 'selesai']) }}" class="px-3.5 py-1.5 rounded-full text-xs font-bold transition-colors {{ $status === 'selesai' ? 'bg-emerald-600 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
            Selesai ({{ $counts['selesai'] }})
        </a>
        <a href="{{ route('admin.inquiries.index', ['status' => 'diarsipkan']) }}" class="px-3.5 py-1.5 rounded-full text-xs font-bold transition-colors {{ $status === 'diarsipkan' ? 'bg-slate-800 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
            Diarsipkan ({{ $counts['diarsipkan'] }})
        </a>
    </div>

    <!-- Search Form -->
    <div class="flex items-center justify-between">
        <form action="{{ route('admin.inquiries.index') }}" method="GET" class="relative flex-1 max-w-md">
            @if($status)
                <input type="hidden" name="status" value="{{ $status }}">
            @endif
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari nama, email, whatsapp, pesan..." class="w-full pl-10 pr-4 py-2.5 text-xs bg-white rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
            <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-slate-500 text-[11px] uppercase tracking-wider border-b border-slate-100">
                    <tr>
                        <th class="py-3.5 px-4">Pengirim</th>
                        <th class="py-3.5 px-4">Kontak</th>
                        <th class="py-3.5 px-4">Layanan</th>
                        <th class="py-3.5 px-4">Pesan</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4">Tanggal</th>
                        <th class="py-3.5 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($inquiries as $inquiry)
                        <tr class="hover:bg-slate-50/50 transition-colors {{ $inquiry->status === 'baru' ? 'bg-amber-50/20' : '' }}">
                            <td class="py-3.5 px-4">
                                <p class="font-bold text-slate-900">{{ $inquiry->name }}</p>
                            </td>
                            <td class="py-3.5 px-4">
                                <p class="text-slate-800">{{ $inquiry->email }}</p>
                                @if($inquiry->phone)
                                    <p class="text-[11px] text-slate-400 font-mono">{{ $inquiry->phone }}</p>
                                @endif
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="text-xs text-blue-700 font-medium">{{ $inquiry->service_type ?? 'Umum' }}</span>
                            </td>
                            <td class="py-3.5 px-4 max-w-xs">
                                <p class="truncate text-slate-600">{{ $inquiry->message }}</p>
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold border {{ $inquiry->status_badge_class }}">
                                    {{ ucfirst($inquiry->status) }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-slate-400 text-[11px]">
                                {{ $inquiry->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="py-3.5 px-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="inline-flex items-center gap-1 text-xs font-semibold text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 px-2.5 py-1 rounded-lg transition-colors">
                                        Lihat
                                    </a>
                                    <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini secara permanen?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1 text-slate-400 hover:text-red-600 rounded">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-400">Tidak ada pesan inquiry ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($inquiries->hasPages())
            <div class="p-4 border-t border-slate-100">
                {{ $inquiries->links() }}
            </div>
        @endif
    </div>

</div>

@endsection

