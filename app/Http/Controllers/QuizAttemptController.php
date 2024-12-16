<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizAttemptController extends Controller
{
    // public function getUserAttempts()
    // {
    //     $user = Auth::User();
    //     $attempts = $user->quizAttempts()->with('quiz')->get();
    //     return view('dashboard.quiz-attempts.index', compact('attempts'));
    // }
}
