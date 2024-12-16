<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    // public function index()
    // {
    //     return view('quizzes.index');
    // }

    public function show($slug)
    {
        return view('livewire.quizzes.quiz', compact('slug'));
    }
}
