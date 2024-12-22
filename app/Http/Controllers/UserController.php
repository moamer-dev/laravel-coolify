<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;


class UserController extends Controller
{
    public function quizAttempts(Request $request): View
    {
        $user = $request->user()->load('quizAttempts');
        return view('dashboard.profile.quiz-attempts', compact('user'),  ['title' => 'محاولات الإختبارات', 'subtitle' =>  'يمكنك مشاهدة نتائج الإختبارات التي قمت بها']);
    }
}
