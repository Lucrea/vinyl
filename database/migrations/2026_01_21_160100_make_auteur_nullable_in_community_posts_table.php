<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('community_posts', function (Blueprint $table) {
            // Maak 'auteur' nullable
            $table->string('auteur')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('community_posts', function (Blueprint $table) {
            // Zet terug naar NOT NULL als je rollback doet
            $table->string('auteur')->nullable(false)->change();
        });
    }
};
