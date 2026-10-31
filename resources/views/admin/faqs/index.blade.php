@extends('layouts.admin')

@section('title', 'Kelola FAQ')
@section('page_title', 'Kelola Tanya Jawab (FAQ)')

@section('content')

<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-sm text-slate-500">Pertanyaan umum yang ditampilkan di bagian bawah landing page</h2>
        </div>
        <a href="{{ route('admin.faqs.create') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl shadow transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Pertanyaan FAQ</span>
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="divide-y divide-slate-100">
            @forelse($faqs as $faq)
                <div class="p-6 flex flex-col sm:flex-row items-start justify-between gap-4 hover:bg-slate-50/50 transition-colors">
                    <div class="flex-1 space-y-2">
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-bold text-slate-400">#{{ $faq->sort_order }}</span>
                            <h3 class="text-sm font-bold text-slate-900">{{ $faq->question }}</h3>
                            @if($faq->is_active)
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">Aktif</span>
                            @else
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200">Nonaktif</span>
                            @endif
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed max-w-3xl">{{ $faq->answer }}</p>
                    </div>

                    <div class="flex items-center gap-2 flex-shrink-0">
                        <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="p-2 text-slate-500 hover:text-blue-600 rounded-lg hover:bg-blue-50 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                        </a>
                        <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('Hapus pertanyaan FAQ ini?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-slate-500 hover:text-red-600 rounded-lg hover:bg-red-50 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-xs text-slate-400">Belum ada pertanyaan FAQ.</div>
            @endforelse
        </div>
    </div>
</div>

@endsection

