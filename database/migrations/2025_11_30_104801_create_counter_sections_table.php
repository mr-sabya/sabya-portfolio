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
        Schema::create('counter_sections', function (Blueprint $table) {
            $table->id();
            $table->integer('exp_number'); // e.g., 25
        $table->string('exp_title');   // e.g., Years Of experience
        $table->text('exp_description'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counter_sections');
    }
};
