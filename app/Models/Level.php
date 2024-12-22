<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = [];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
}
