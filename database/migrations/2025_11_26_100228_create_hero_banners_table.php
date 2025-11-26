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
        Schema::create('hero_banners', function (Blueprint $table) {
            $table->id();
            // Left Section
            $table->string('greeting')->nullable()->default("Hello i’m");
            $table->string('name');
            $table->string('designation');
            $table->string('button_text')->default('View Portfolio');
            $table->string('button_url')->nullable();

            // Right Section (About)
            $table->string('about_title')->default('About Me');
            $table->text('about_description'); // Using text for longer content

            // Images and Background Effects
            $table->string('hero_image')->nullable();
            $table->string('bg_text_1')->default('WEB DESIGN');
            $table->string('bg_text_2')->default('WEB DESIGN');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_banners');
    }
};
