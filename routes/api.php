<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearningPathController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/xxx', function () {
    return response()->json(['message' => 'API route is working']);
});

Route::get('/visualize/{id}', [LearningPathController::class, 'vapi']);

//Route::middleware('auth:sanctum')->get('/visualize', [LearningPathController::class, 'vapi']);
