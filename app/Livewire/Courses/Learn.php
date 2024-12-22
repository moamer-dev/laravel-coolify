<?php

namespace App\Livewire\Courses;

use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Course;
use App\Models\Project;
use App\Models\Series;
use App\Models\Category;
use App\Models\Level;
use App\Models\Quiz;

class Learn extends Component
{

    public $items;
    #[Url(as: 'm')]
    public $model = 'courses';
    #[Url(as: 'c')]
    public $selectedCategories = [];
    #[Url(as: 'l')]
    public $selectedLevels = [];
    #[Url(as: 't')]
    public $selectedTypes = [];
    #[Url(as: 's')]
    public $sortBy = 'Newest';

    public function mount()
    {
        $this->loadItems();
    }

    public function loadItems()
    {
        $query = match ($this->model) {
            'courses' => Course::query(),
            'projects' => Project::query(),
            'series' => Series::query(),
            'quizzes' => Quiz::query(),
            default => Course::query(),
        };

        if (!empty($this->selectedCategories)) {
            $query = $this->applyCategoryFilter($query);
        }

        if ($this->model !== 'series' && !empty($this->selectedLevels)) {
            $query->whereIn('level_id', $this->selectedLevels);
        }

        if ($this->model === 'quizzes' && !empty($this->selectedTypes)) {
            $query->whereIn('type', $this->selectedTypes);
        }

        $query = match ($this->sortBy) {
            'Newest' => $query->latest(),
            'Oldest' => $query->oldest(),
            'A-Z' => $query->orderBy('name'),
            'Z-A' => $query->orderByDesc('name'),
            'All' => $query,
            default => $query,
        };

        $this->items = match ($this->model) {
            'courses', 'projects' => $query->with('creator', 'categories', 'level')->get(),
            'series' => $query->with('category')->get(),
            'quizzes' => $query->with('category')->get(),
            default => $query->get(),
        };
    }

    private function applyCategoryFilter($query)
    {
        if ($this->model === 'quizzes') {
            return $query->whereIn('category_id', $this->selectedCategories);
        }

        if ($this->model === 'series') {
            return $query->whereIn('category_id', $this->selectedCategories);
        }

        return $query->whereHas('categories', function ($q) {
            $q->whereIn('categories.id', $this->selectedCategories);
        });
    }

    public function updatedSelectedCategories()
    {
        $this->loadItems();
    }

    public function updatedSelectedLevels()
    {
        $this->loadItems();
    }

    public function updatedSelectedTypes()
    {
        $this->loadItems();
    }

    public function updatedSortBy()
    {
        $this->loadItems();
    }

    public function setModel($model)
    {
        $this->model = $model;
        $this->selectedLevels = [];
        $this->loadItems();
    }

    public function render()
    {
        $levels = $this->model !== 'series' ? Level::all() : collect(); // Hide levels for Series
        $categories = Category::all();
        return view('livewire.courses.learn', compact('levels', 'categories'));
    }
}
