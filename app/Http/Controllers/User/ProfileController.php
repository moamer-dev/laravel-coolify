<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\PathUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\LearningPath;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    private $profile_header_items;
    private $user;

    public function __construct(Request $request)
    {
        $this->profile_header_items = get_data('profile_header_items');
        $this->user = $request->user();
    }

    public function overview(Request $request): View
    {
        $user = $this->user->load('profile') ?? null;
        if ($user) {
            $user->learningStacks = $user->getLearningStacks();
            $notifications = $user->notifications;
            $unreadNotifications = $user->unreadNotifications;
        }
        $profile_header_items = $this->profile_header_items;
        return view('dashboard.profile.profile-index', compact('user', 'profile_header_items'));
    }

    public function settings(Request $request): View
    {
        $user = $this->user->load('profile') ?? null;
        $profile_header_items = $this->profile_header_items;
        return view('dashboard.profile.settings', compact('user', 'profile_header_items'));
    }

    public function billing(Request $request): View
    {
        $user = $this->user->load('profile') ?? null;
        $profile_header_items = $this->profile_header_items;
        return view('dashboard.profile.billing', compact('user', 'profile_header_items'));
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $validated = $request->validated();
        $user = $request->user();
        $user->fill([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $user->save();

        $user->profile->update([
            'phone' => $validated['phone'] ?? null,
            'bio' => $validated['bio'] ?? null,
            'country_id' => $validated['country_id'] ?? null,
            'level_id' => $validated['level_id'] ?? null,
            'is_public' => $validated['is_public'] ?? false,
        ]);

        return Redirect::route('profile.settings')->with('status', 'profile-updated');
    }

    public function update_path(PathUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $user = $this->user;
        if (empty($validated['learning_paths'])) {
            $user->learningPaths()->detach();
        } else {
            $user->learningPaths()->sync($validated['learning_paths']);
        }

        return Redirect::route('profile.learningCenter')->with('status', 'profile-updated');
    }

    public function update_level_id(Request $request): RedirectResponse
    {
        //dd($request->all());
        $user = $this->user;
        $user->profile->update([
            'level_id' => $request->level_id,
        ]);

        return Redirect::route('profile.learningCenter')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function learningCenter(Request $request): View
    {
        $user = $this->user->load('profile', 'learningPaths');
        if ($user) {
            $pathCourses = $user->pathCourses();
            $pathQuizzes = $user->pathQuizzes();
            $pathProjects = $user->pathProjects()->load('courses');
            $pathSeries = $user->pathSeries();
            $userTechnologies = $user->getTechnologyStacks()->take(6);
        }
        if ($pathCourses->count() > 0) {
            $tasksCount = $pathCourses->count() + $pathQuizzes->count() + $pathProjects->count() + $pathSeries->count();
        } else {
            $tasksCount = 0;
        }
        if ($pathQuizzes) {
            $assement_quiz = $pathQuizzes->where('type', 'assessment')->first();
        }
        $statistic_data = [
            'دورات' => $pathCourses->count(),
            'إختبارات' => $pathQuizzes->count(),
            'مشاريع' => $pathProjects->count(),
            'سلاسل تعليمية' => $pathSeries->count(),
        ];
        return view('dashboard.learning-center.index-learning-center', compact('user', 'statistic_data', 'assement_quiz', 'tasksCount', 'userTechnologies'));
    }

    public function learning_path(Request $request): View
    {
        $learningPaths = LearningPath::where('is_active', true)->get();
        $user = $request->user()->load('learningPaths.learningStacks.technologyStacks');
        $profile_header_items = $this->profile_header_items;
        return view('dashboard.profile.learning-path', compact('user', 'learningPaths', 'profile_header_items'));
    }

    public function dashboard(Request $request): View
    {
        $dashboard_options = get_data('dashboard_options');
        $user = $this->user;
        if ($user) {
            $data = [
                'level' => $user->profile->level?->name,
                'courses' => $user->pathCourses()->count(),
                'quizzes' => $user->pathQuizzes()->count(),
                'projects' => $user->pathProjects()->count(),
            ];
        }
        return view('dashboard.index-dashboard', compact('dashboard_options', 'data'));
    }

    public function progress(): View
    {
        $user = $this->user;
        return view('dashboard.index-progress');
    }
}
