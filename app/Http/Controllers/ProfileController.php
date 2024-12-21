<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\PathUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\LearningPath;

class ProfileController extends Controller
{
    public function overview(Request $request): View
    {
        $user = $request->user()->load('profile');
        return view('dashboard.profile.overview', compact('user'));
    }

    public function settings(Request $request): View
    {
        $user = $request->user()->load('profile');
        return view('dashboard.profile.settings', compact('user'));
    }

    public function billing(Request $request): View
    {
        $user = $request->user()->load('profile');
        return view('dashboard.profile.billing', compact('user'));
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
            'is_public' => $validated['is_public'] ?? false, // Ensure boolean
        ]);

        return Redirect::route('profile.settings')->with('status', 'profile-updated');
    }

    public function update_path(PathUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $user = $request->user();
        if (empty($validated['learning_paths'])) {
            $user->learningPaths()->detach();
        } else {
            $user->learningPaths()->sync($validated['learning_paths']);
        }

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
        $user = $request->user()->load('profile', 'learningPaths');
        $pathCourses = $user->pathCourses();
        $pathQuizzes = $user->pathQuizzes();
        $pathProjects = $user->pathProjects()->load('courses');
        $pathSeries = $user->pathSeries();
        $tasksCount = $pathCourses->count() + $pathQuizzes->count() + $pathProjects->count() + $pathSeries->count();
        //dd($pathProjects);
        return view('dashboard.learning-center.index-learning-center', compact('user', 'pathCourses', 'pathQuizzes', 'pathProjects', 'pathSeries', 'tasksCount'));
    }

    public function learning_path(Request $request): View
    {
        $learningPaths = LearningPath::all();
        $user = $request->user()->load('learningPaths.learningStacks.technologyStacks');
        return view('dashboard.profile.learning-path', compact('user', 'learningPaths'));
    }
}
