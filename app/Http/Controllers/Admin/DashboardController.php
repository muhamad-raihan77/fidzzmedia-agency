<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Inquiry;
use App\Models\Project;
use App\Models\Service;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman ringkasan dashboard admin.
     */
    public function index(): View
    {
        $stats = [
            'total_projects' => Project::count(),
            'published_projects' => Project::where('is_published', true)->count(),
            'active_services' => Service::where('is_active', true)->count(),
            'new_inquiries' => Inquiry::where('status', 'baru')->count(),
            'total_inquiries' => Inquiry::count(),
            'total_faqs' => Faq::count(),
        ];

        $latestInquiries = Inquiry::latest()->take(6)->get();
        $recentProjects = Project::latest()->take(4)->get();

        return view('admin.dashboard.index', compact('stats', 'latestInquiries', 'recentProjects'));
    }
}

