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
        $user = User::find($userId)->load('profile');
        $pathCourses = $user->pathCourses();
        $pathQuizzes = $user->pathQuizzes();
        $pathProjects = $user->pathProjects();
        $pathSeries = $user->pathSeries();
        return view('dashboard.learning-path.index-learning-path', compact('user', 'pathCourses', 'pathQuizzes', 'pathProjects', 'pathSeries'));
    }

    public function visualize()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId)->load('profile');
        $pathCourses = $user->pathCourses();
        $pathQuizzes = $user->pathQuizzes();
        $pathProjects = $user->pathProjects();
        $pathSeries = $user->pathSeries();
        return view('dashboard.learning-path.path-visualize', compact('user', 'pathCourses', 'pathQuizzes', 'pathProjects', 'pathSeries'));
    }

    public function vapi($id)
    {
        //$userId = Auth::user()->id;
        $user = User::find($id);
        //$firstUser = User::first();
        $pathCourses = $user->pathCourses();
        $pathQuizzes = $user->pathQuizzes();
        $pathProjects = $user->pathProjects();
        $pathSeries = $user->pathSeries();
        return response()->json([
            'courses' => $pathCourses,
            'quizzes' => $pathQuizzes,
            'projects' => $pathProjects,
            'series' => $pathSeries
            //['message' => 'API route is working']
        ]);
    }
}
