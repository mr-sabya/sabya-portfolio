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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('website_link')->nullable()->after('slug');
            $table->string('project_image')->nullable()->after('thumbnail');
            $table->date('start_date')->nullable()->after('project_date');
            $table->date('end_date')->nullable()->after('start_date');
            $table->date('client_deadline')->nullable()->after('end_date');
            $table->string('budget')->nullable()->after('client_deadline'); // Use string for currency symbols like "$5,000" or decimal for math
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['website_link', 'project_image', 'start_date', 'end_date', 'client_deadline', 'budget']);
        });
    }
};
