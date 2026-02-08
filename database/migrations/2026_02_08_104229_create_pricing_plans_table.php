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
        Schema::create('pricing_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Starter, Basic, etc.
            $table->decimal('price', 10, 2); // 230.00
            $table->string('currency')->default('$');
            $table->string('period_label'); // e.g., "Per Month"
            $table->string('period_range')->nullable(); // e.g., "Jan - Dec" or "Start to End"
            $table->json('features'); // Array of features
            $table->boolean('is_featured')->default(false); // For the "active" highlight
            $table->string('button_text')->default('Get Started');
            $table->string('button_url')->default('contact.html');
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
        Schema::dropIfExists('pricing_plans');
    }
};
