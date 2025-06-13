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
        Schema::table('events', function (Blueprint $table) {
            $table->string('husband_fullname')->nullable();
            $table->text('husband_description')->nullable();
            $table->string('husband_image')->nullable();

            $table->string('wife_fullname')->nullable();
            $table->text('wife_description')->nullable();
            $table->string('wife_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn([
                'husband_fullname', 'husband_description', 'husband_image',
                'wife_fullname', 'wife_description', 'wife_image',
            ]);
        });
    }
};
