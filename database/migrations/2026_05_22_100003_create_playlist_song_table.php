<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lista_reproduccion_cancion', function (Blueprint $table) {
            $table->foreignId('playlist_id')->constrained('listas_reproduccion')->cascadeOnDelete();
            $table->foreignId('song_id')->constrained('canciones')->cascadeOnDelete();
            $table->primary(['playlist_id', 'song_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lista_reproduccion_cancion');
    }
};
