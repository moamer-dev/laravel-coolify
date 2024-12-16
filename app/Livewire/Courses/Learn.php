<?php

namespace App\Livewire\Courses;

use Livewire\Component;
use App\Models\Course;
use App\Models\Category;
use App\Models\Level;

class Learn extends Component
{
    public $courses;
    public $selectedCategories = [];
    public $selectedLevels = [];

    public function mount()
    {
        if (!empty($this->selectedCategories) || !empty($this->selectedLevels)) {
            $this->filterCourses();
        } else {
            $this->courses = Course::with('creator', 'categories', 'level', 'projects')->get();
        }
    }

    protected $queryString = [
        'selectedCategories' => [
            'as' => 'categories',
            'except' => [],
        ],
        'selectedLevels' => [
            'as' => 'levels',
            'except' => [],
        ],
    ];

    public function filterCourses()
    {
        $query = Course::query();

        if (!empty($this->selectedCategories)) {
            $query->whereHas('categories', function ($q) {
                $q->whereIn('categories.id', $this->selectedCategories);
            });
        }

        if (!empty($this->selectedLevels)) {
            $query->whereIn('level_id', $this->selectedLevels);
        }

        $this->courses = $query->with('creator', 'categories', 'level', 'projects')->get();
    }

    public function updatedSelectedCategories()
    {
        $this->filterCourses();
    }

    public function updatedSelectedLevels()
    {
        $this->filterCourses();
    }

    public function render()
    {
        $levels = Level::all();
        $categories = Category::all();
        return view('livewire.courses.learn', compact('levels', 'categories'));
    }
}
