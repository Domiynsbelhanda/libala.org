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
        Schema::table('guest_table', function (Blueprint $table) {
            $table->boolean('is_attending')->nullable();
            $table->integer('number_of_people')->nullable();
            $table->text('additional_info')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guest_table', function (Blueprint $table) {
            $table->dropColumn(['is_attending', 'number_of_people', 'additional_info']);
        });
    }
};
