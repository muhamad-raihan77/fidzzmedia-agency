<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Services Table
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('number_badge', 10)->default('01'); // 01, 02, etc.
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('icon')->default('globe'); // globe, code, database, palette
            $table->text('description');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 2. Projects Table
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category'); // e.g. Website Development, Web Application, Mobile Application
            $table->text('description');
            $table->string('image')->nullable();
            $table->json('tech_stacks')->nullable(); // ['Laravel 12', 'Tailwind CSS', 'MySQL']
            $table->string('demo_url')->nullable();
            $table->string('repo_url')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_featured')->default(true);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        // 3. Inquiries Table
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('service_type')->nullable();
            $table->text('message');
            $table->enum('status', ['baru', 'diproses', 'selesai', 'diarsipkan'])->default('baru');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });

        // 4. FAQs Table
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 5. Settings Table
        Schema::create('settings', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->longText('value')->nullable();
            $table->string('group')->default('general');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('inquiries');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('services');
    }
};

