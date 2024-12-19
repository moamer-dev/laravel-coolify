<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizAttemptController;
use App\Http\Controllers\LearningPathController;
use App\Livewire\Quizzes\Quiz;
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
    Route::get('/learning-center', [ProfileController::class, 'learningCenter'])->name('profile.learningCenter');
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::get('/profile/billing', [ProfileController::class, 'billing'])->name('profile.billing');
    Route::get('/profile/learning-path', [ProfileController::class, 'learning_path'])->name('profile.learning-path');
    Route::patch('/profile/learning-path', [ProfileController::class, 'update_path'])->name('profile.update-path');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/course/{slug}', [CourseController::class, 'view'])->name('course.view');
    Route::get('/quiz/{slug}', Quiz::class)->name('quiz.index');
    Route::get('/profile/quiz-attempts', [UserController::class, 'quizAttempts'])->name('user.quiz-attempts');
    Route::get('/quiz-attempts/{attemptId}', [QuizAttemptController::class, 'show'])->name('quiz.attempt.show');
    Route::get('/course/{course}/{lesson}', [CourseController::class, 'lesson_view'])->name('lesson.view');
    Route::get('/series/{series}/{zaytonah}', [SeriesController::class, 'zaytonah_view'])->name('zaytonah.view');
    Route::get('/user/paths/', [LearningPathController::class, 'view'])->name('user.path-view');
    //Route::get('/quiz/{slug}', Quiz::class)->name('quiz.index');
});

require __DIR__ . '/auth.php';
