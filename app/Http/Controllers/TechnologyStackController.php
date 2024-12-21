<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TechnologyStack;

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
