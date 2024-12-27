<?php

namespace App\Livewire\User\LearningPaths;

use Livewire\Component;
use App\Models\Module;

class ModuleTasks extends Component
{
    public $module;
    public $userProgress;
    public $color;

    public function mount(Module $module)
    {
        $this->module = $module;
        $this->userProgress = auth()->user()->progress;
        $this->getRandomColor();
    }

    function getRandomColor()
    {
        $colors = ['bg-primary', 'bg-success', 'bg-warning', 'bg-danger', 'bg-info', 'bg-dark', 'bg-secondary'];
        $this->color = $colors[array_rand($colors)];
    }

    public function get_task_status($task)
    {
        $subtaskIds = $task->subtasks->pluck('id');

        $userSubtaskProgress = $this->userProgress->whereIn('subtask_id', $subtaskIds);
        if ($userSubtaskProgress->isEmpty()) {
            return 'pending';
        }

        $completedCount = $userSubtaskProgress->where('status', 'completed')->count();
        $totalCount = $subtaskIds->count();

        if ($completedCount === 0) {
            return 'pending';
        } elseif ($completedCount < $totalCount) {
            return 'in_progress';
        } else {
            return 'completed';
        }
    }

    public function get_task_color($task)
    {
        $status = $this->get_task_status($task);
        if ($status === 'completed') {
            return 'bg-success';
        } elseif ($status === 'in_progress') {
            return 'bg-warning';
        } else {
            return 'bg-primary';
        }
    }

    public function render()
    {
        return view('livewire.user.learning-paths.module-tasks');
    }
}
