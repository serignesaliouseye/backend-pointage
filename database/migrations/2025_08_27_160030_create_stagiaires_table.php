<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('promotion_id')->nullable(); 
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->timestamps();

            // Clés étrangères
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->foreign('promotion_id')
                  ->references('id')->on('promotions')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stagiaires');
    }
};
