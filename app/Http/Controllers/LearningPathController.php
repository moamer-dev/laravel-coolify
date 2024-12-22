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
        return view('dashboard.learning-path.index-learning-path', compact('user', 'pathCourses', 'pathQuizzes', 'pathProjects', 'pathSeries'), ['title' => 'مسارات التعلم', 'subtitle' => 'يمكنك مشاهدة مساراتك التعليمية من هنا']);
    }

    public function visualize()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId)->load('profile');
        $pathCourses = $user->pathCourses();
        $pathQuizzes = $user->pathQuizzes();
        $pathProjects = $user->pathProjects();
        $pathSeries = $user->pathSeries();
        return view('dashboard.learning-path.path-visualize', compact('user', 'pathCourses', 'pathQuizzes', 'pathProjects', 'pathSeries'), ['title' => 'مسارات التعلم', 'subtitle' => 'تجد هنا مخطط المسار التعليمي الخاص بك']);
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

    public function front_view($slug)
    {
        $path = LearningPath::where('slug', $slug)->first()->load('learningStacks.technologyStacks');
        //dd($path);
        return view('front.front-path-view', compact('path'));
    }

    public function todo_path()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId)->load('profile');
        $pathCourses = $user->pathCourses();
        $pathQuizzes = $user->pathQuizzes();
        $pathProjects = $user->pathProjects();
        $pathSeries = $user->pathSeries();
        return view('dashboard.learning-path.todo');
    }
}
