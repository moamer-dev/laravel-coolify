<?php

namespace App\Livewire\User\LearningPaths;

use Livewire\Attributes\Url;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Index extends Component
{
    public $user;
    public $userPaths = [];

    #[Url(as: 'lp')]
    public $activePath;

    #[Url(as: 'ls')]
    public $activeStack = null;

    #[Url(as: 'ts')]
    public $activeTechnology = null;

    #[Url(as: 'ct')]
    public $contentType = null;

    public $selectedPath;
    public $selectedStack;
    public $selectedTechnology;
    public $showLearningCards = false;

    public function mount()
    {
        $userId = Auth::user()->id;
        $this->user = User::find($userId);
        $this->userPaths = $this->user->learningPaths()
            ->with(
                'learningStacks.technologyStacks.courses',
                'learningStacks.technologyStacks.quizzes',
                'learningStacks.technologyStacks.series'
            )
            ->get();
        // courses count

        // Load persisted states from URL
        $this->loadSelections();
        $this->syncUrlState();
    }

    private function loadSelections()
    {
        // Persist Learning Path
        if ($this->activePath) {
            $this->selectedPath = collect($this->userPaths)->firstWhere('id', $this->activePath);
        }

        // Persist Learning Stack
        if ($this->activeStack && $this->selectedPath) {
            $this->selectedStack = $this->selectedPath->learningStacks->find($this->activeStack);
        }

        // Persist Technology Stack
        if ($this->activeTechnology && $this->selectedStack) {
            $this->selectedTechnology = $this->selectedStack->technologyStacks->find($this->activeTechnology);
        }

        // Default content type
        $this->contentType = $this->contentType ?? 'courses';
    }



    public function selectPath($pathId, $updateUrl = true)
    {
        $this->activePath = $pathId;
        $this->selectedPath = collect($this->userPaths)->firstWhere('id', $pathId);
        $this->activeStack = null;
        $this->activeTechnology = null;
        $this->contentType = null;

        if ($updateUrl) {
            $this->syncUrlState();
        }
    }

    public function selectStack($stackId, $updateUrl = true)
    {
        $this->activeStack = $stackId;
        $this->selectedStack = $this->selectedPath->learningStacks->find($stackId);
        $this->activeTechnology = null;
        $this->contentType = null;

        if ($updateUrl) {
            $this->syncUrlState();
        }
    }

    public function selectTechnology($techId, $updateUrl = true)
    {
        $this->activeTechnology = $techId;
        $this->selectedTechnology = $this->selectedStack->technologyStacks->find($techId);
        $this->contentType = 'courses';

        if ($updateUrl) {
            $this->syncUrlState();
        }
    }

    public function showContent($type)
    {
        $this->contentType = $type;
        $this->syncUrlState();
    }

    private function syncUrlState()
    {
        // Automatically handled by #[Url] attributes
    }

    public function toggleLearningCards()
    {
        $this->showLearningCards = !$this->showLearningCards;
    }

    public function resetSelectTechnology()
    {
        $this->activeTechnology = null;
        $this->contentType = null;
        $this->syncUrlState();
    }

    public function render()
    {
        return view('livewire.user.learning-paths.index');
    }
}
