@extends('layouts.admin')

@section('title', 'Tambah FAQ')
@section('page_title', 'Tambah Pertanyaan FAQ Baru')

@section('content')

<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-8">
        <form action="{{ route('admin.faqs.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="question" class="block text-xs font-bold text-slate-700 mb-1">Pertanyaan <span class="text-red-500">*</span></label>
                <input type="text" id="question" name="question" value="{{ old('question') }}" required placeholder="Contoh: Berapa lama waktu pengerjaan sebuah website?" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
            </div>

            <div>
                <label for="answer" class="block text-xs font-bold text-slate-700 mb-1">Jawaban Lengkap <span class="text-red-500">*</span></label>
                <textarea id="answer" name="answer" rows="4" required placeholder="Jelaskan jawaban secara transparan dan mudah dimengerti..." class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none leading-relaxed">{{ old('answer') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="sort_order" class="block text-xs font-bold text-slate-700 mb-1">Urutan Tampil</label>
                    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 1) }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none">
                </div>

                <div class="flex items-center pt-5">
                    <label class="flex items-center gap-2 text-xs font-bold text-slate-700 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded border-slate-300">
                        <span>Aktif dan tampil di website</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.faqs.index') }}" class="px-4 py-2.5 text-xs font-semibold text-slate-600 hover:text-slate-800 rounded-xl hover:bg-slate-100 transition-colors">
                    Batal
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-6 py-2.5 rounded-xl shadow transition-colors">
                    Simpan FAQ
                </button>
            </div>

        </form>
    </div>
</div>

@endsection

