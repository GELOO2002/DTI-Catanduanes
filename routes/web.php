<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IslandProfileController;

Route::redirect('/login', '/admin/login');

Route::get('/island-profiles', [IslandProfileController::class, 'index'])->name('island-profiles.index');

Route::get('/', [DashboardController::class, 'index']);