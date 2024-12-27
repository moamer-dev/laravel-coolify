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
        return view('courses.course-view', compact('course'));
    }

    public function lesson_view($course, $lesson)
    {
        $course = Course::with('categories', 'creator.profile', 'sections.lessons', 'currency', 'level', 'projects')
            ->where('slug', $course)
            ->first();
        $lesson = $course->sections->flatMap->lessons->where('id', $lesson)->first();
        if (!$lesson) {
            abort(404, 'Lesson not found');
        }
        //dd($lesson);
        return view('courses.lesson-view', compact('course', 'lesson'));
    }
}
