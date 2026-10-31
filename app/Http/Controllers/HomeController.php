<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Inquiry;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Tampilkan landing page FidzzTeck.
     */
    public function index(): View
    {
        $settings = Setting::getAll();
        
        $services = Service::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        $projects = Project::where('is_published', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        $faqs = Faq::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('landing.index', compact('settings', 'services', 'projects', 'faqs'));
    }

    /**
     * Simpan formulir konsultasi / pesan proyek (Inquiry).
     */
    public function storeInquiry(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'service_type' => 'nullable|string|max:100',
            'message' => 'required|string|max:3000',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'message.required' => 'Deskripsi kebutuhan proyek wajib diisi.',
        ]);

        Inquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'service_type' => $validated['service_type'] ?? 'Konsultasi Umum',
            'message' => $validated['message'],
            'status' => 'baru',
        ]);

        return redirect()->to(url('/#contact'))
            ->with('success', 'Terima kasih! Pesan dan konsultasi Anda telah kami terima. Tim FidzzTeck akan segera menghubungi Anda.');
    }

    /**
     * Detail proyek jika diakses langsung.
     */
    public function showProject(string $slug): View
    {
        $project = Project::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $settings = Setting::getAll();

        return view('landing.project-detail', compact('project', 'settings'));
    }
}

