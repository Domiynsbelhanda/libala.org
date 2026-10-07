<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('civil_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('key')->unique();
            $table->timestamps();
        });
        // Some existing installations use MyISAM for events, which cannot be referenced by an InnoDB FK.
        $canReferenceEvents = DB::getDriverName() !== 'mysql' || strtolower(DB::selectOne("SELECT ENGINE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'events'")->ENGINE ?? '') === 'innodb';
        Schema::create('civil_weddings', function (Blueprint $table) use ($canReferenceEvents) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('name', 100);
            $table->foreignId('event_id')->nullable()->index();
            if ($canReferenceEvents) $table->foreign('event_id')->references('id')->on('events')->nullOnDelete();
            $table->foreignId('civil_template_id')->constrained()->restrictOnDelete();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('venue', 100)->nullable();
            $table->string('address', 160)->nullable();
            $table->timestamps();
        });
        Schema::create('civil_guests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('civil_wedding_id')->constrained()->cascadeOnDelete();
            $table->string('name', 100);
            $table->string('phone', 30)->nullable();
            $table->string('code', 40)->unique();
            $table->timestamps();
            $table->unique(['civil_wedding_id', 'name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('civil_guests');
        Schema::dropIfExists('civil_weddings');
        Schema::dropIfExists('civil_templates');
    }
};
