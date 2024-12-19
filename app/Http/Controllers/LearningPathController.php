<?php

namespace App\Http\Controllers;

use App\Models\LearningPath;
use Illuminate\Http\Request;

class LearningPathController extends Controller
{
    public function view()
    {
        //$learningPath = LearningPath::where('slug', $path)->firstOrFail();
        return view('dashboard.learning-path.index');
    }
}
