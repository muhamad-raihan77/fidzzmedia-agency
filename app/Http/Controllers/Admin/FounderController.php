<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FounderController extends Controller
{
    public function index(): View
    {
        $settings = Setting::getAll();
        return view('admin.founder.index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'founder_name' => 'required|string|max:100',
            'founder_role' => 'required|string|max:100',
            'founder_badge' => 'nullable|string|max:100',
            'founder_bio' => 'required|string',
            'founder_skills' => 'nullable|string',
        ], [
            'founder_name.required' => 'Nama founder wajib diisi.',
            'founder_role.required' => 'Jabatan founder wajib diisi.',
            'founder_bio.required' => 'Biografi founder wajib diisi.',
        ]);

        foreach ($validated as $key => $val) {
            Setting::set($key, $val, 'founder');
        }

        Setting::clearCache();

        return redirect()->route('admin.founder.index')
            ->with('success', 'Profil founder berhasil diperbarui.');
    }
}

