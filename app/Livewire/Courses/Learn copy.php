<?php

namespace App\Livewire\Courses;

use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Course;
use App\Models\Project;
use App\Models\Series;
use App\Models\Quiz;
use App\Models\Category;
use App\Models\Level;

class Learn extends Component
{

    public $items;
    #[Url(as: 'm')]
    public $model = 'courses';
    #[Url(as: 'c')]
    public $selectedCategories = [];
    #[Url(as: 'l')]
    public $selectedLevels = [];
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

        // Apply category filter
        if (!empty($this->selectedCategories)) {
            $query = $this->applyCategoryFilter($query);
        }

        // Apply type filter for quizzes only
        if ($this->model === 'quizzes' && request()->has('type')) {
            $query->where('type', request()->get('type'));
        }

        // Apply level filter (not applicable for series or quizzes)
        if (!in_array($this->model, ['series', 'quizzes']) && !empty($this->selectedLevels)) {
            $query->whereIn('level_id', $this->selectedLevels);
        }

        // Sorting logic
        $query = match ($this->sortBy) {
            'Newest' => $query->latest(),
            'Oldest' => $query->oldest(),
            'A-Z' => $query->orderBy('name'),
            'Z-A' => $query->orderByDesc('name'),
            'All' => $query,
            default => $query,
        };

        // Fetch items with relationships based on model
        $this->items = match ($this->model) {
            'courses', 'projects' => $query->with('creator', 'categories', 'level')->get(),
            'series' => $query->with('category')->get(),
            'quizzes' => $query->with('category')->get(),
            default => $query->get(),
        };
    }


    private function applyCategoryFilter($query)
    {
        if ($this->model === 'series' || $this->model === 'quizzes') {
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
        $levels = $this->model !== 'series' ? Level::all() : collect();
        $categories = Category::all();
        return view('livewire.courses.learn', compact('levels', 'categories'));
    }
}