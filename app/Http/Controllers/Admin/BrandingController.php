<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BrandingController extends Controller
{
    public function index(): View
    {
        $settings = Setting::getAll();
        return view('admin.branding.index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'site_favicon' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,ico|max:1024',
            'founder_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'primary_color' => 'nullable|string|max:20',
            'accent_color' => 'nullable|string|max:20',
        ]);

        if ($request->hasFile('site_logo')) {
            $oldLogo = Setting::get('site_logo');
            if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                Storage::disk('public')->delete($oldLogo);
            }
            $logoPath = $request->file('site_logo')->store('branding', 'public');
            Setting::set('site_logo', $logoPath, 'branding');
        }

        if ($request->hasFile('site_favicon')) {
            $oldFavicon = Setting::get('site_favicon');
            if ($oldFavicon && Storage::disk('public')->exists($oldFavicon)) {
                Storage::disk('public')->delete($oldFavicon);
            }
            $favPath = $request->file('site_favicon')->store('branding', 'public');
            Setting::set('site_favicon', $favPath, 'branding');
        }

        if ($request->hasFile('founder_photo')) {
            $oldPhoto = Setting::get('founder_photo');
            if ($oldPhoto && Storage::disk('public')->exists($oldPhoto)) {
                Storage::disk('public')->delete($oldPhoto);
            }
            $photoPath = $request->file('founder_photo')->store('branding', 'public');
            Setting::set('founder_photo', $photoPath, 'branding');
        }

        if ($request->filled('primary_color')) {
            Setting::set('primary_color', $request->input('primary_color'), 'branding');
        }

        if ($request->filled('accent_color')) {
            Setting::set('accent_color', $request->input('accent_color'), 'branding');
        }

        Setting::clearCache();

        return redirect()->route('admin.branding.index')
            ->with('success', 'Aset branding berhasil diperbarui.');
    }
}

