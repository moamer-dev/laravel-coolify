<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TaskCreatedNotification;

class Subtask extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // protected static function booted()
    // {
    //     static::created(function ($subtask) {
    //         $users = $subtask->task->module->learningStack->learningPaths()
    //             ->with('users')
    //             ->get()
    //             ->pluck('users')
    //             ->flatten()
    //             ->unique('id');
    //         Notification::send($users, new TaskCreatedNotification($subtask));
    //     });
    // }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
