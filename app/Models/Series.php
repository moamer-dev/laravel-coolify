<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Series extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function zaytonahs()
    {
        return $this->belongsToMany(Zaytonah::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function technologyStack()
    {
        return $this->belongsTo(TechnologyStack::class);
    }
}
