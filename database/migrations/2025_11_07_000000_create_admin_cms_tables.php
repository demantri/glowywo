<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /**
         * PAGES
         */
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 50)->unique(); // contoh: home, about, contact
            $table->string('title', 150);
            $table->longText('content')->nullable();
            $table->string('meta_title', 150)->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });

        /**
         * PROJECTS
         */
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->string('slug', 150)->unique();
            $table->string('category', 50)->nullable(); // EO / WO
            $table->longText('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->date('project_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        /**
         * PROJECT_IMAGES
         */
        Schema::create('project_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')
                ->constrained('projects')
                ->onDelete('cascade');
            $table->string('image_path');
            $table->string('caption', 150)->nullable();
            $table->timestamps();
        });

        /**
         * TEAMS
         */
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('position', 100)->nullable();
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        /**
         * CONTACTS
         */
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('subject', 150)->nullable();
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });

        /**
         * SETTINGS
         */
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key', 100)->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        /**
         * MEDIA FILES (opsional)
         */
        Schema::create('media_files', function (Blueprint $table) {
            $table->id();
            $table->string('file_name', 150)->nullable();
            $table->string('file_path');
            $table->string('file_type', 50)->nullable();
            $table->bigInteger('file_size')->nullable();
            $table->foreignId('uploaded_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_files');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('project_images');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('pages');
    }
};
