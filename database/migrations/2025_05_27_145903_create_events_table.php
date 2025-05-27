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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique(); // ID unique alphanumérique

            // Authentification
            $table->string('password'); // sera bcrypté à la création

            // Infos des mariés
            $table->string('bride_name');
            $table->string('groom_name');
            $table->date('wedding_date');

            // Mariage religieux
            $table->string('church_name')->nullable();
            $table->string('church_address')->nullable();
            $table->date('church_date')->nullable();
            $table->time('church_time')->nullable();

            // Mariage civil
            $table->string('civil_commune')->nullable();
            $table->date('civil_date')->nullable();
            $table->time('civil_time')->nullable();

            // Soirée
            $table->string('reception_hall')->nullable();
            $table->string('reception_address')->nullable();
            $table->date('reception_date')->nullable();
            $table->time('reception_time')->nullable();

            // Autres
            $table->string('theme')->nullable();
            $table->string('manager_name');
            $table->string('manager_contact');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
