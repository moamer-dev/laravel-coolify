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

    public function notificationsList(Request $request): View
    {
        $user = $request->user()->load('notifications');
        return view('dashboard.profile.notifications', compact('user'),  ['title' => 'الإشعارات', 'subtitle' =>  'يمكنك مشاهدة جميع الإشعارات التي تصلك']);
    }
}
