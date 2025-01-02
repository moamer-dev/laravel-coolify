<?php

namespace App\Livewire\Technologies;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Models\Course;
use App\Models\Project;
use App\Models\Series;
use App\Models\Quiz;

class Resources extends Component
{
    public $technology;
    public $items;
    #[Url(as: 'm')]
    public $model = 'courses';


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

        if ($this->model === 'series') {
            $query->where('technology_stack_id', $this->technology->id);
        }

        if ($this->model === 'projects') {
            $query->whereHas('courses', function ($query) {
                $query->whereHas('technologyStacks', function ($query) {
                    $query->where('technology_stack_id', $this->technology->id);
                });
            });
        }

        if ($this->model === 'courses') {
            $query->whereHas('technologyStacks', function ($query) {
                $query->where('technology_stack_id', $this->technology->id);
            });
        }

        if ($this->model === 'quizzes') {
            $query->whereHas('technologyStacks', function ($query) {
                $query->where('technology_stack_id', $this->technology->id);
            });
        }

        $this->items = $query->get();
    }

    public function setModel($model)
    {
        $this->model = $model;
        //$this->selectedLevels = [];
        $this->loadItems();
    }

    public function render()
    {
        return view('livewire.technologies.resources');
    }
}
