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
        Schema::table('mission_visions', function (Blueprint $table) {
            if (!Schema::hasColumn('mission_visions', 'subtitle')) {
                $table->string('subtitle')->nullable()->after('id');
            }

            // 2. Check if 'status' is missing (used in the component for toggling)
            if (!Schema::hasColumn('mission_visions', 'status')) {
                $table->boolean('status')->default(true)->after('description');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mission_visions', function (Blueprint $table) {
            $table->dropColumn('subtitle');
        });
    }
};
