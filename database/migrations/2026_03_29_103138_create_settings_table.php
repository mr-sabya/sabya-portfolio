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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('group')->default('general');    // Branding, SEO, Contact
            $table->string('name');                          // Display Label (e.g. "Site Logo")
            $table->string('slug')->unique();                // Key used in code (e.g. "site_logo")
            $table->string('type')->default('text');        // text, textarea, select, file, email
            $table->text('value')->nullable();               // The actual content
            $table->text('options')->nullable();             // JSON for Select/Radio options
            $table->string('description')->nullable();      // Admin helper text
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
