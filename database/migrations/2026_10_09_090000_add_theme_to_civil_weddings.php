<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('civil_weddings', function (Blueprint $table) {
            $table->string('theme_title', 120)->nullable();
            $table->string('theme_image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('civil_weddings', fn (Blueprint $table) => $table->dropColumn(['theme_title', 'theme_image']));
    }
};
