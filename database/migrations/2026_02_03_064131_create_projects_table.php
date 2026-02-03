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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained()->onDelete('cascade'); // The Client
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('thumbnail');

            // Content from your HTML
            $table->text('description_one'); // First paragraph
            $table->text('description_two')->nullable(); // Second paragraph
            $table->string('mini_title')->nullable(); // "Elevate Your Business..."
            $table->text('mini_description')->nullable();

            // Sidebar Info
            $table->string('author_name')->default('Admin');
            $table->date('project_date');
            $table->string('tags')->nullable(); // e.g., "Web Design, Hosting"

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
