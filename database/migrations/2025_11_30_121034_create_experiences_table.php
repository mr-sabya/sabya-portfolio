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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle')->default('experience'); // e.g., experience
            $table->string('name');         // e.g., Fatima Asrafy (Company or Person Name)
            $table->string('designation');  // e.g., UI/UX Designer
            $table->string('duration');    // e.g., 2005-2009
            $table->text('description');
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
        Schema::dropIfExists('experiences');
    }
};
