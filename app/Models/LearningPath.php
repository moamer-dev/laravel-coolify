<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class LearningPath extends Model
{
    /** @use HasFactory<\Database\Factories\LearningPathFactory> */
    use SoftDeletes, HasFactory;
    protected $guarded = [];

    public function learningStacks()
    {
        return $this->belongsToMany(LearningStack::class, 'learning_path_learning_stack');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_learning_path');
    }
}
