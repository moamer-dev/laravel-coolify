<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearningStack extends Model
{
    /** @use HasFactory<\Database\Factories\LearningStackFactory> */
    use SoftDeletes, HasFactory;
    protected $guarded = [];

    public function learningPaths()
    {
        return $this->belongsToMany(LearningPath::class, 'learning_path_learning_stack');
    }

    public function technologyStacks()
    {
        return $this->belongsToMany(TechnologyStack::class, 'learning_stack_technology_stack');
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
