<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QuizzCreatedNotification;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    protected static function booted()
    {
        static::created(function ($quiz) {
            $users = $quiz->technologyStacks()
                ->with('users')
                ->get()
                ->pluck('users')
                ->flatten()
                ->unique('id');
            Notification::send($users, new QuizzCreatedNotification($quiz));
        });
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function attempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }

    public function course()
    {
        return $this->hasOneThrough(Course::class, Section::class, 'id', 'id', 'section_id', 'course_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function technologyStacks()
    {
        return $this->belongsToMany(TechnologyStack::class, 'quiz_technology_stack');
    }
}
