<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TerrainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
// Route::get('/terrains', [TerrainController::class, 'index'])->name('terrains.index');
// Route::get('/terrains/{terrain}', [TerrainController::class,'show'])->name('terrains.show');
// Route::get('/terrains/create', [TerrainController::class, 'create'])->name('terrains.create');
// Route::post('/terrains', [TerrainController::class, 'store'])->name('terrains.store');
// Route::get('/terrains/{terrain}/edit', [TerrainController::class, 'edit'])->name('terrains.edit');
// Route::patch('/terrains/{terrain}', [TerrainController::class, 'update'])->name('terrains.update');
// Route::delete('/terrains/{terrain}', [TerrainController::class, 'destroy'])->name('terrains.destroy');
Route::resource('terrains', TerrainController::class);
Route::post('/terrains/{terrain}/comments', [TerrainController::class, 'storeComment'])->name('terrains.comments.store');
// Route pour afficher le formulaire de création de réservation
Route::get('/reservations/create/{id}', [ReservationController::class, 'create'])->name('reservations.create');

// Autres routes pour la gestion des réservations
Route::get('/reservations/verify/{id}', [ReservationController::class, 'verify'])->name('reservations.verify');
Route::post('/reservations/confirm/{id}', [ReservationController::class, 'confirm'])->name('reservations.confirm');
Route::resource('reservations', ReservationController::class)->except(['create']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])->name('dashboard');

Route::get('/user-count', [DashboardController::class, 'userCount'])
    ->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
