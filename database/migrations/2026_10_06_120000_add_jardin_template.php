<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        if (! DB::table('templates')->where('blade_path', 'pages.templates.jardin')->exists()) {
            DB::table('templates')->insert([
                'code' => (string) Str::uuid(),
                'name' => 'Jardin de promesses',
                'blade_path' => 'pages.templates.jardin',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        DB::table('templates')->where('blade_path', 'pages.templates.jardin')->delete();
    }
};
