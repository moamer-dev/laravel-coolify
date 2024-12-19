<?php

namespace App\Livewire\User\LearningPaths;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\TechnologyStack;

class Index extends Component
{
    public $user;

    public function mount()
    {
        $userId = Auth::user()->id;
        $this->user = User::find($userId);
    }

    public function loadData($techId, $type)
    {
        $technology = TechnologyStack::with([$type])->find($techId);
        $this->dispatchBrowserEvent('data-loaded', [
            'techId' => $techId,
            'type' => $type,
            'data' => $technology->$type,
        ]);
    }


    public function render()
    {
        $userPaths = $this->user->learningPaths()
            ->with([
                'learningStacks.technologyStacks.courses',
                'learningStacks.technologyStacks.quizzes',
                'learningStacks.technologyStacks.series',
            ])->get();
        return view('livewire.user.learning-paths.index', compact('userPaths'));
    }
}
