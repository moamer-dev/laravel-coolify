<?php

namespace App\Livewire\Shared;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class Review extends Component
{
    public $model;
    public $course;
    public $series;
    public $project;
    public $title;
    public $review = '';
    public $rating = 0;

    public function mount($series = null, $course = null)
    {
        //dd($series, $course);
        $this->series = $series;
        $this->course = $course;
        $this->render_title();
    }

    public function render_title()
    {
        if ($this->course) {
            $this->model = $this->course;
            $this->title = 'لقد حصلت هذه الدورة على تقييم';
        } elseif ($this->series) {
            $this->model = $this->series;
            $this->title = 'لقد حصلت هذه السلسة على تقييم';
        }
    }

    public function setRating($value)
    {
        $this->rating = $value;
    }

    public function addReview()
    {
        $this->validate([
            'review' => 'required|string|max:500',
            'rating' => 'required|integer|between:1,5',
        ]);

        $this->model->reviews()->create([
            'user_id' => Auth::id(),
            'review' => $this->review,
            'rating' => $this->rating,
            'is_approved' => false,
        ]);

        $this->review = '';
        $this->rating = '';

        $this->dispatch('toastify', [
            'message' => 'تم اضافة تقييمك بنجاح!',
            'type' => 'success',
        ]);
    }

    public function userReviewd()
    {
        return $this->model->reviews->contains('user_id', Auth::id());
    }

    public function render()
    {
        return view('livewire.shared.review');
    }
}
