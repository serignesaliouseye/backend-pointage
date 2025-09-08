<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/me', fn () => auth()->user());

    // Routes Admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', fn () => 'Bienvenue Admin');
    });

    // Routes Coach
    Route::middleware('role:coach')->group(function () {
        Route::get('/coach/dashboard', fn () => 'Bienvenue Coach');
    });

    // Routes Stagiaire
    Route::middleware('role:stagiaire')->group(function () {
        Route::get('/stagiaire/dashboard', fn () => 'Bienvenue Stagiaire');
    });
});