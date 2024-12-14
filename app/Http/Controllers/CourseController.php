<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function view($slug)
    {
        $course = Course::with('categories', 'creator.profile', 'sections.lessons', 'currency', 'level', 'projects')
            ->where('slug', $slug)
            ->first();
        return view('courses.view', compact('course'));
    }
}
