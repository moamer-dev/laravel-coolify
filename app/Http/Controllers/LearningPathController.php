<?php

namespace App\Http\Controllers;

use App\Models\LearningPath;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LearningPathController extends Controller
{
    public function view()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $pathCourses = $user->pathCourses();
        $pathQuizzes = $user->pathQuizzes();
        $pathProjects = $user->pathProjects();
        $pathSeries = $user->pathSeries();
        return view('dashboard.learning-path.index', compact('pathCourses', 'pathQuizzes', 'pathProjects', 'pathSeries'));
    }

    public function visualize()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $pathCourses = $user->pathCourses();
        $pathQuizzes = $user->pathQuizzes();
        $pathProjects = $user->pathProjects();
        $pathSeries = $user->pathSeries();
        return view('dashboard.learning-path.path-visualize', compact('pathCourses', 'pathQuizzes', 'pathProjects', 'pathSeries'));
    }
}
