<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function reviewable()
    {
        return $this->morphTo();
    }
}
