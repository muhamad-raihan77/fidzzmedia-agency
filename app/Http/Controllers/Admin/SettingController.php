<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index(): View
    {
        $settings = Setting::getAll();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $fields = [
            'site_name',
            'site_tagline',
            'hero_badge',
            'hero_title',
            'hero_subtitle',
            'hero_btn_primary',
            'hero_btn_secondary',
            'hero_feature_1',
            'hero_feature_1_sub',
            'hero_feature_2',
            'hero_feature_2_sub',
            'hero_feature_3',
            'hero_feature_3_sub',
            'about_tag',
            'about_title',
            'about_description',
            'contact_phone',
            'contact_hours',
            'contact_email',
            'contact_location',
            'social_facebook',
            'social_instagram',
            'social_linkedin',
            'social_youtube',
            'meta_title',
            'meta_description',
            'footer_copyright',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                Setting::set($field, $request->input($field), 'general');
            }
        }

        Setting::clearCache();

        return redirect()->route('admin.settings.index')
            ->with('success', 'Pengaturan website berhasil disimpan.');
    }
}

