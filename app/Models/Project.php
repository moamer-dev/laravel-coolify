<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Project extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = [];
    protected $casts = [
        'tags' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $slug = Str::slug($model->name);
            $originalSlug = $slug;
            $counter = 1;

            while (self::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $model->slug = $slug;
        });
    }
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
