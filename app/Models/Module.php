<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ModuleCreatedNotification;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected static function booted()
    {
        static::created(function ($module) {
            $users = $module->learningStack->learningPaths()
                ->with('users')
                ->get()
                ->pluck('users')
                ->flatten()
                ->unique('id');
            Notification::send($users, new ModuleCreatedNotification($module));
        });
    }

    public function learningStack()
    {
        return $this->belongsTo(LearningStack::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
