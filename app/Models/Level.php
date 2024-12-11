<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}