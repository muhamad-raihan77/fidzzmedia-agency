<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@fidzzteck.com'],
            [
                'name' => 'Fauzan Dwi - Admin',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Services
        $services = [
            [
                'number_badge' => '01',
                'name' => 'Website Development',
                'slug' => 'website-development',
                'icon' => 'globe',
                'description' => 'Company profile, landing page, e-commerce, dan lainnya. Kami membangun website modern yang berpenampilan menarik dan berkinerja tinggi.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'number_badge' => '02',
                'name' => 'Web Application Development',
                'slug' => 'web-application-development',
                'icon' => 'code',
                'description' => 'Aplikasi web kustom sesuai kebutuhan bisnis Anda. Skalabel, aman, dan mudah dikelola untuk jangka panjang.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'number_badge' => '03',
                'name' => 'Sistem Informasi Custom',
                'slug' => 'sistem-informasi-custom',
                'icon' => 'database',
                'description' => 'Dari sistem internal hingga dashboard manajemen, kami membangun solusi terintegrasi yang meningkatkan efisiensi operasional.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'number_badge' => '04',
                'name' => 'UI/UX Design',
                'slug' => 'ui-ux-design',
                'icon' => 'palette',
                'description' => 'Kami merancang antarmuka yang intuitif dan menarik secara visual untuk memberikan pengalaman pengguna terbaik.',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($services as $srv) {
            Service::updateOrCreate(['slug' => $srv['slug']], $srv);
        }

        // 3. Projects
        $projects = [
            [
                'title' => 'Company Profile Website',
                'slug' => 'company-profile-website',
                'category' => 'Website Development',
                'description' => 'Website company profile dengan desain modern, tajam, dan responsif untuk memperkuat reputasi bisnis.',
                'image' => 'projects/project-1.jpg',
                'tech_stacks' => ['Laravel 12', 'Tailwind CSS', 'MySQL'],
                'demo_url' => 'https://fidzzteck.com',
                'sort_order' => 1,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Inventory Management System',
                'slug' => 'inventory-management-system',
                'category' => 'Web Application',
                'description' => 'Aplikasi manajemen stok barang, pencatatan transaksi masuk-keluar, dan laporan akurat untuk operasional bisnis.',
                'image' => 'projects/project-2.jpg',
                'tech_stacks' => ['Laravel 12', 'Alpine.js', 'MySQL'],
                'demo_url' => 'https://fidzzteck.com',
                'sort_order' => 2,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Mobile App Pemesanan',
                'slug' => 'mobile-app-pemesanan',
                'category' => 'Mobile Application',
                'description' => 'Aplikasi pemesanan berbasis mobile dengan alur belanja mulus, katalog dinamis, dan notifikasi real-time.',
                'image' => 'projects/project-3.jpg',
                'tech_stacks' => ['Laravel 12', 'Flutter', 'Firebase'],
                'demo_url' => 'https://fidzzteck.com',
                'sort_order' => 3,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Website Restaurant',
                'slug' => 'website-restaurant',
                'category' => 'Website Development',
                'description' => 'Website untuk restoran dengan tampilan elegan, menu digital interaktif, dan sistem reservasi meja.',
                'image' => 'projects/project-4.jpg',
                'tech_stacks' => ['Laravel 12', 'Tailwind CSS', 'MySQL'],
                'demo_url' => 'https://fidzzteck.com',
                'sort_order' => 4,
                'is_featured' => true,
                'is_published' => true,
            ],
        ];

        foreach ($projects as $proj) {
            Project::updateOrCreate(['slug' => $proj['slug']], $proj);
        }

        // 4. Settings
        $settings = [
            'site_name' => 'FidzzTeck',
            'site_tagline' => 'Digital Solutions',
            'hero_badge' => 'AGENSI DIGITAL & PENGEMBANGAN SOFTWARE',
            'hero_title' => 'Kami Membangun Produk Digital yang Memajukan Bisnis.',
            'hero_subtitle' => 'FidzzTeck merancang dan mengembangkan website, aplikasi web, dan solusi digital kustom yang membantu bisnis bekerja lebih cerdas dan berkembang.',
            'hero_btn_primary' => 'Lihat Proyek',
            'hero_btn_secondary' => 'Diskusikan Proyek',
            'hero_feature_1' => 'Kode Terstruktur',
            'hero_feature_1_sub' => 'Performa Handal',
            'hero_feature_2' => 'Desain Modern',
            'hero_feature_2_sub' => 'Pengalaman Pengguna Terbaik',
            'hero_feature_3' => 'Pengembangan Tepat Sasaran',
            'hero_feature_3_sub' => 'Prioritas Bisnis Anda',

            // About & Founder
            'about_tag' => 'TENTANG FIDZZTECK',
            'about_title' => 'Dibangun dengan Tujuan. Dikembangkan dengan Ketelitian.',
            'about_description' => 'FidzzTeck membantu bisnis mengubah ide menjadi produk digital yang praktis melalui desain matang, pengembangan teruji, dan solusi yang disesuaikan dengan kebutuhan Anda.',
            'founder_name' => 'Fauzan Dwi',
            'founder_role' => 'CEO & Lead Developer',
            'founder_badge' => 'CEO & Founder FidzzTeck',
            'founder_bio' => 'Dengan pengalaman di bidang pengembangan web dan aplikasi, saya percaya bahwa teknologi adalah alat untuk menciptakan solusi nyata yang berdampak. FidzzTeck hadir untuk menjadi partner digital yang bisa diandalkan.',
            'founder_photo' => 'branding/founder.jpg',
            'founder_skills' => 'Laravel, Tailwind CSS, MySQL, JavaScript, Git, Figma',

            // Contact
            'contact_phone' => '+62 812-3456-7890',
            'contact_hours' => '(Senin - Jumat, 08:00 - 17:00)',
            'contact_email' => 'hello@fidzzteck.com',
            'contact_location' => 'Indonesia',

            // Branding
            'site_logo' => '',
            'site_favicon' => '',
            'primary_color' => '#2563EB',
            'accent_color' => '#F59E0B',

            // SEO & Footer
            'meta_title' => 'FidzzTeck — Agensi Digital & Pengembangan Software',
            'meta_description' => 'Kami membangun website, aplikasi web, dan solusi digital kustom untuk membantu bisnis Anda berkembang.',
            'footer_copyright' => '© ' . date('Y') . ' FidzzTeck. All rights reserved.',
        ];

        foreach ($settings as $key => $val) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $val, 'group' => 'general']
            );
        }

        // 5. Sample FAQs
        $faqs = [
            [
                'question' => 'Berapa lama estimasi waktu pengerjaan sebuah proyek?',
                'answer' => 'Waktu pengerjaan bervariasi bergantung pada skala dan kompleksitas proyek. Untuk landing page dan company profile berkisar 1-2 minggu, sedangkan sistem informasi dan aplikasi web kustom berkisar 3-8 minggu.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'Teknologi apa saja yang digunakan oleh FidzzTeck?',
                'answer' => 'Kami menggunakan stack modern yang teruji seperti Laravel 12, PHP 8.2+, Tailwind CSS, MySQL, Alpine.js/Vue, RESTful API, dan arsitektur server yang aman.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah ada garansi atau pemeliharaan setelah proyek selesai?',
                'answer' => 'Ya, kami menyediakan garansi perbaikan bug gratis serta opsi layanan maintenance berkelanjutan untuk memastikan sistem Anda selalu berjalan optimal dan aman.',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(['question' => $faq['question']], $faq);
        }
    }
}
