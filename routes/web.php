<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Livewire\Courses\Learn;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/learn', function () {
    return view('dashboard.learn.index');
})->name('learn');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'overview'])->name('profile.overview');
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::get('/profile/billing', [ProfileController::class, 'billing'])->name('profile.billing');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/course/{slug}', [CourseController::class, 'view'])->name('course.view');
});

require __DIR__ . '/auth.php';
