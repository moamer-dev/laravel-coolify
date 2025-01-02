<?php

namespace App\Http\Controllers\Quiz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    public function show($slug)
    {
        return view('livewire.quizzes.quiz', compact('slug'));
    }
}
