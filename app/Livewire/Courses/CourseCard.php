<?php

namespace App\Livewire\Courses;

use Livewire\Component;


class CourseCard extends Component
{
    public $item;
    public function render()
    {
        return view('livewire.courses.course-card');
    }
}