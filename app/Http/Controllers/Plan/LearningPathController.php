<?php

namespace App\Http\Controllers\Plan;

use App\Models\LearningPath;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Subtask;
use App\Http\Controllers\Controller;

class LearningPathController extends Controller
{
    public function view()
    {
        $userId = Auth::user()->id;
        if (!$userId) {
            return redirect()->route('login')->with('error', 'You must be logged in.');
        }
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
        $user = User::with('learningPaths.learningStacks.modules.tasks.subtasks')->find($userId);
        //dd($user);
        return view('dashboard.learning-path.todo', compact('user'), ['title' => 'خطة المسار', 'subtitle' => 'يمكنك مشاهدة مساراتك التعليمية من هنا']);
    }

    public function task_view($id)
    {
        $task = Task::find($id);
        return view('dashboard.learning-path.task-view', compact('task'), ['title' => 'خطة المسار', 'subtitle' => 'يمكنك مشاهدة مساراتك التعليمية من هنا']);
    }

    public function subtask_view($id, $subtask = null)
    {
        $task = Task::find($id);
        //$subtask_progress_status = Auth::user()->progress()->where('subtask_id', $subtask)->first()->status;
        $subtask_to_view = Subtask::with('comments')->find($subtask);
        return view('dashboard.learning-path.task-view', compact('task', 'subtask_to_view'), ['title' => 'خطة المسار', 'subtitle' => 'يمكنك مشاهدة مساراتك التعليمية من هنا']);
    }
}
