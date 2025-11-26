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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');              // Used in BOTH

            // For Design 1 (Grid)
            $table->string('icon_class')->nullable(); // e.g. fa-light fa-pen-ruler
            $table->string('short_description')->nullable(); // e.g. "120 Projects"

            // For Design 2 (List)
            $table->text('description')->nullable(); // Long paragraph text

            $table->string('details_url')->nullable();
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
        Schema::dropIfExists('services');
    }
};
