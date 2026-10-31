<?php

namespace Tests\Feature;

use App\Models\Faq;
use App\Models\Inquiry;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FidzzTeckTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\DatabaseSeeder::class);
    }

    public function test_landing_page_renders_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('FidzzTeck');
        $response->assertSee('Produk Digital');
        $response->assertSee('Layanan Kami');
        $response->assertSee('Proyek Terbaru Kami');
        $response->assertSee('Fauzan Dwi');
        $response->assertSee('Bagaimana Kami Bekerja');
        $response->assertSee('Konsultasikan Sekarang');
    }

    public function test_inquiry_form_submission_stores_to_database(): void
    {
        $formData = [
            'name' => 'Budi Santoso',
            'email' => 'budi@perusahaan.com',
            'phone' => '081234567890',
            'service_type' => 'Pembuatan Website',
            'message' => 'Halo tim FidzzTeck, kami butuh website company profile modern.',
        ];

        $response = $this->post('/inquiry', $formData);

        $response->assertRedirect('/#contact');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('inquiries', [
            'name' => 'Budi Santoso',
            'email' => 'budi@perusahaan.com',
            'service_type' => 'Pembuatan Website',
            'status' => 'baru',
        ]);
    }

    public function test_inquiry_validation_fails_when_fields_are_missing(): void
    {
        $response = $this->post('/inquiry', []);
        $response->assertSessionHasErrors(['name', 'email', 'message']);
    }

    public function test_project_detail_page_loads_for_published_project(): void
    {
        $project = Project::where('is_published', true)->first();
        if ($project) {
            $response = $this->get('/proyek/' . $project->slug);
            $response->assertStatus(200);
            $response->assertSee($project->title);
        }
    }

    public function test_admin_guest_is_redirected_to_login(): void
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/login');
    }

    public function test_admin_can_login_with_valid_credentials(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@fidzzteck.com'],
            ['name' => 'Admin Test', 'password' => Hash::make('admin123')]
        );

        $response = $this->post('/login', [
            'email' => 'admin@fidzzteck.com',
            'password' => 'admin123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_admin_can_view_all_management_modules(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@fidzzteck.com'],
            ['name' => 'Admin Test', 'password' => Hash::make('admin123')]
        );

        $this->actingAs($admin);

        $this->get('/admin/dashboard')->assertStatus(200)->assertSee('Ringkasan Dashboard');
        $this->get('/admin/projects')->assertStatus(200)->assertSee('Kelola Proyek');
        $this->get('/admin/services')->assertStatus(200)->assertSee('Kelola Layanan');
        $this->get('/admin/inquiries')->assertStatus(200)->assertSee('Kelola Pesan');
        $this->get('/admin/settings')->assertStatus(200)->assertSee('Pengaturan Umum Website');
        $this->get('/admin/branding')->assertStatus(200)->assertSee('Kelola Branding & Logo');
        $this->get('/admin/founder')->assertStatus(200)->assertSee('Kelola Profil Founder');
        $this->get('/admin/faqs')->assertStatus(200)->assertSee('Kelola Tanya Jawab');
    }

    public function test_admin_can_create_and_delete_project(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@fidzzteck.com'],
            ['name' => 'Admin Test', 'password' => Hash::make('admin123')]
        );

        $this->actingAs($admin);

        $response = $this->post('/admin/projects', [
            'title' => 'Test Portal Project',
            'category' => 'Web Application',
            'description' => 'Aplikasi portal pengujian sistem.',
            'tech_stacks' => 'Laravel 12, MySQL, Vite',
            'is_published' => '1',
            'sort_order' => 99,
        ]);

        $response->assertRedirect(route('admin.projects.index'));

        $project = Project::where('title', 'Test Portal Project')->first();
        $this->assertNotNull($project);

        // Delete test project
        $delResponse = $this->delete('/admin/projects/' . $project->id);
        $delResponse->assertRedirect(route('admin.projects.index'));
        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }
}

