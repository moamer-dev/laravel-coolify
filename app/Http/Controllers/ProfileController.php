<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
}
