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
       Schema::create('attendances', function (Blueprint $table) {
    $table->id();
    $table->foreignId('stagiaire_id')->constrained('stagiaires')->cascadeOnDelete();
    $table->foreignId('coach_id')->constrained('coaches')->cascadeOnDelete();
    $table->date('date');
    $table->time('arrived_at')->nullable();
    $table->time('left_at')->nullable();
    $table->enum('statut', ['on_time', 'late', 'absent'])->default('absent');
    $table->text('note')->nullable();
    $table->timestamps();

    $table->unique(['stagiaire_id','date']);
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
