<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

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
