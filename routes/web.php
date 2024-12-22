<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizAttemptController;
use App\Http\Controllers\LearningPathController;
use App\Http\Controllers\TechnologyStackController;
use App\Http\Controllers\QuizController;
use App\Livewire\Quizzes\Quiz;
use App\Livewire\Courses\Learn;
use App\Models\LearningPath;

Route::get('/new', function () {
    return view('/new');
});


Route::get('/', function () {
    $paths = LearningPath::where("is_active", 1)->get();
    return view('/front/landing', compact('paths'));
});
Route::get('/path/{slug}', [LearningPathController::class, 'front_view'])->name('path-front-view');
Route::get('/path/technology/{slug}', [TechnologyStackController::class, 'technology_view'])->name('technology-view');
Route::get('/learn', function () {
    return view('dashboard.learn.index', ['title' => 'المصاد التعليمية', 'subtitle' => 'دورات - مشاريع - سلسلات - اختبارات']);
})->name('learn');
Route::get('/dashboard', function () {
    return view('dashboard.index-dashboard', ['title' => 'لوحة التحكم', 'subtitle' => 'يمكنك إدارة كل شئ خاص بحسابك ومسارات تعلمك من هنا']);
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {

    // Profile-related routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'overview')->name('profile.overview');
        Route::get('/learning-center', 'learningCenter')->name('profile.learningCenter');
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
    });

    // Series-related routes
    Route::controller(SeriesController::class)->group(function () {
        Route::get('/series/{series}/{zaytonah}', 'zaytonah_view')->name('zaytonah.view');
    });

    // Learning Path-related routes
    Route::controller(LearningPathController::class)->group(function () {
        Route::get('/user/paths', 'view')->name('user.path-view');
        Route::get('/user/paths/visualize', 'visualize')->name('user.path-visualize');
        Route::get('/user/paths/todo/', 'todo_path')->name('user.path-todo');
    });
});

require __DIR__ . '/auth.php';
