<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Progress extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $table = 'progresses';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function subtask()
    {
        return $this->belongsTo(Subtask::class);
    }

    public function calculateCompletionTime()
    {
        if ($this->status === 'completed') {
            return $this->updated_at->diffInSeconds($this->created_at);
        }

        return null;
    }
}
