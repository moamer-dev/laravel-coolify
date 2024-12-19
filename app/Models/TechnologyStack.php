<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TechnologyStack extends Model
{
    /** @use HasFactory<\Database\Factories\TechnologyStackFactory> */
    use SoftDeletes, HasFactory;
    protected $guarded = [];

    public function learningStacks()
    {
        return $this->belongsToMany(LearningStack::class, 'learning_stack_technology_stack');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_technology_stack');
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_technology_stack');
    }

    public function series()
    {
        return $this->hasMany(Series::class, 'technology_stack_id');
    }
}
