<?php

namespace App\Livewire\User\LearningPaths;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use Livewire\Attributes\On;

class SubtaskView extends Component
{
    public $task;
    public $subtask_to_view;
    public $subtasks = [];
    public $subtask_progress = [];
    public $commentContent;
    public $editingCommentId = null;
    public $editingCommentContent = '';

    public function mount()
    {
        $this->loadProgress();
    }

    public function loadProgress()
    {
        $user = Auth::user();
        if ($this->subtask_to_view == null) {
        }
        $this->subtasks = $this->task->subtasks;
        foreach ($this->subtasks as $subtask) {
            $progress = $user->progress()->where('subtask_id', $subtask->id)->first();
            $this->subtask_progress[$subtask->id] = $progress ? $progress->status : 'in_completed';
        }
    }

    public function toggleSubtaskStatus($subtaskId)
    {
        $user = Auth::user();

        $progress = $user->progress()->firstOrNew(['subtask_id' => $subtaskId]);

        $progress->status = $progress->status === 'completed' ? 'in_completed' : 'completed';
        $progress->completion_percentage = $progress->status === 'completed' ? 100 : 0;
        $progress->save();

        // Update the local state
        $this->subtask_progress[$subtaskId] = $progress->status;

        $this->dispatch('toastify', [
            'message' => 'تم تغيير حالة المهمة الى ' . ucfirst($progress->status),
            'type' => $progress->status === 'completed' ? 'success' : 'warning',
        ]);

        $this->dispatch('updateStyles', [
            'id' => $subtaskId,
            'status' => $progress->status,
        ]);

        // $this->subtask_progress[$subtaskId] = $progress->status;
    }

    public function format_subtask_status($subtask_id = null)
    {
        if ($subtask_id == null) {
            return 'In Completed';
        }
        $status = $this->subtask_progress[$subtask_id];
        return $status === 'completed' ? 'Completed' : 'In Completed';
    }

    public function addComment()
    {
        //dd($this->subtask_to_view);
        $this->validate([
            'commentContent' => 'required|string|max:500',
        ]);

        if (!$this->subtask_to_view) {
            return;
        }

        $this->subtask_to_view->comments()->create([
            'user_id' => Auth::id(),
            'content' => $this->commentContent,
            'is_approved' => false,
        ]);

        // Reset the comment content
        $this->commentContent = '';

        // Emit a browser event or show a success message
        $this->dispatch('toastify', [
            'message' => 'تم اضافة تعليقك بنجاح!',
            'type' => 'success',
        ]);
    }

    public function startEditComment($commentId)
    {
        $this->editingCommentId = $commentId;
        $this->editingCommentContent = Comment::find($commentId)->content;
    }

    public function toggleEditComment($commentId)
    {
        if ($this->editingCommentId === $commentId) {
            // Close edit mode
            $this->editingCommentId = null;
            $this->editingCommentContent = '';
        } else {
            // Enter edit mode
            $this->editingCommentId = $commentId;
            $this->editingCommentContent = Comment::find($commentId)->content;
        }
    }

    public function saveCommentEdit($commentId)
    {
        $this->validate([
            'editingCommentContent' => 'required|string|max:500',
        ]);

        $comment = Comment::findOrFail($commentId);

        if ($comment->user_id !== Auth::id()) {
            return;
        }

        $comment->update(['content' => $this->editingCommentContent]);

        $this->editingCommentId = null;
        $this->editingCommentContent = '';

        $this->dispatch('toastify', [
            'message' => 'Comment updated successfully!',
            'type' => 'success',
        ]);
    }

    #[On('delete-comment')]
    public function deleteComment($commentId)
    {
        //dd($commentId);
        $comment = Comment::findOrFail($commentId);

        if ($comment->user_id !== Auth::id()) {
            return;
        }

        $comment->delete();

        $this->dispatch('toastify', [
            'message' => 'تم حذف التعليق بنجاح!',
            'type' => 'success',
        ]);
    }


    public function render()
    {
        return view('livewire.user.learning-paths.subtask-view');
    }
}
