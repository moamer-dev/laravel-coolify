<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Lesson extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = [];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($lesson) {
    //         if (empty($lesson->slug)) {
    //             $lesson->slug = Str::slug($lesson->name);
    //         }
    //     });

    //     static::updating(function ($lesson) {
    //         if ($lesson->isDirty('name') && empty($lesson->slug)) {
    //             $lesson->slug = Str::slug($lesson->name);
    //         }
    //     });
    // }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
