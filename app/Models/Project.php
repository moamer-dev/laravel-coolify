<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = [];
    protected $casts = [
        'tags' => 'array',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_project');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function sections()
    {
        return $this->morphMany(Section::class, 'sectionable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
