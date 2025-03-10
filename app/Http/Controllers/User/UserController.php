<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    private $profile_header_items;
    private $user;

    public function __construct(Request $request)
    {
        $this->profile_header_items = get_data('profile_header_items');
        $this->user = $request->user();
    }

    public function quizAttempts(Request $request): View
    {
        $user = $this->user->load('quizAttempts');
        $profile_header_items = $this->profile_header_items;
        return view('dashboard.profile.quiz-attempts', compact('user', 'profile_header_items'));
    }

    public function notificationsList(Request $request): View
    {
        $user = $this->user->load('notifications');
        return view('dashboard.profile.notifications', compact('user'));
    }
}
