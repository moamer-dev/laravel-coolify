<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = [];

    public function sectionable()
    {
        return $this->morphTo();
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
