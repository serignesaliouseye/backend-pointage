<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sanctions', function (Blueprint $table) {
            $table->id();
            // Relation avec coach
            $table->foreignId('coach_id')
                  ->constrained('coaches')
                  ->onDelete('cascade'); // ✅ Syntaxe correcte
            
            // Relation avec stagiaire  
            $table->foreignId('stagiaire_id')
                  ->constrained('stagiaires')
                  ->onDelete('cascade'); // ✅ Syntaxe correcte
            
            $table->string('motif');
            $table->date('date_sanction');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sanctions');
    }
};