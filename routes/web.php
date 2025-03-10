<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Learn\CourseController;
use App\Http\Controllers\Learn\SeriesController;
use App\Http\Controllers\Plan\LearningPathController;
use App\Http\Controllers\Quiz\QuizAttemptController;
use App\Http\Controllers\Front\FrontController;
use App\Livewire\Quizzes\Quiz;


Route::get('/learn', function () {
    return view('dashboard.learn.index', ['title' => 'المصاد التعليمية', 'subtitle' => 'دورات - مشاريع - سلسلات - اختبارات']);
})->name('learn');


Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/blog/{slug}', 'post_view')->name('post-view');
    Route::get('/path/{slug}', 'front_view')->name('path-front-view');
    Route::get('/path/technology/{slug}', 'technology_view')->name('technology-view');
});

Route::middleware('auth')->group(function () {
    // Profile-related routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile/overview', 'overview')->name('profile.overview');
        Route::get('/user/learning-center/overview', 'learningCenter')->name('profile.learningCenter');
        Route::get('/user/dashboard', 'dashboard')->name('dashboard');
        Route::get('/user/progress', 'progress')->name('user.progress');
        Route::get('/profile/settings', 'settings')->name('profile.settings');
        Route::get('/profile/billing', 'billing')->name('profile.billing');
        Route::get('/profile/learning-path', 'learning_path')->name('profile.learning-path');
        Route::patch('/profile/learning-path', 'update_path')->name('profile.update-path');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::patch('/learning-center', 'update_level_id')->name('profile.update-level-id');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // Course-related routes
    Route::controller(CourseController::class)->group(function () {
        Route::get('/course/{slug}', 'view')->name('course.view');
        Route::get('/course/{course}/{lesson}', 'lesson_view')->name('lesson.view');
    });

    // Quiz-related routes
    Route::get('/quiz/{slug}', Quiz::class)->name('quiz.index');
    Route::get('/quiz-attempts/{attemptId}', [QuizAttemptController::class, 'show'])->name('quiz.attempt.show');

    // User-related routes
    Route::controller(UserController::class)->group(function () {
        Route::get('/profile/quiz-attempts', 'quizAttempts')->name('user.quiz-attempts');
        Route::get('/user/notifications', 'notificationsList')->name('user.notifications');
    });

    // Series-related routes
    Route::controller(SeriesController::class)->group(function () {
        Route::get('/series/{series}/{zaytonah}', 'zaytonah_view')->name('zaytonah.view');
    });

    // Learning Path-related routes
    Route::controller(LearningPathController::class)->group(function () {
        Route::get('/user/paths', 'view')->name('user.path-view');
        Route::get('/user/paths/visualize', 'visualize')->name('user.path-visualize');
        Route::get('/user/learning-center/plan', 'todo_path')->name('user.path-todo');
        Route::get('/user/learning-center/technologies', 'user_technologies')->name('user.teschnologies');
        Route::get('/user/learning-center/plan/task/{id}/{subtask?}', 'subtask_view')->name('user.subtask-view');
    });
});

require __DIR__ . '/auth.php';
