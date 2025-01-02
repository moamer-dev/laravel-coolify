<?php

namespace App\Http\Controllers\Plan;

use Illuminate\Http\Request;
use App\Models\TechnologyStack;
use App\Http\Controllers\Controller;

class TechnologyStackController extends Controller
{
    public function technology_view($slug)
    {
        $technology = TechnologyStack::where('slug', $slug)
            ->with(['courses.projects', 'quizzes', 'series'])
            ->first();
        return view('front.front-technology-view', compact('technology'));
    }
}
