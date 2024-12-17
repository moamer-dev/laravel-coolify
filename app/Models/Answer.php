<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\QuestionOption;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function option()
    {
        return $this->belongsTo(QuestionOption::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function quizAttempt()
    {
        return $this->belongsTo(QuizAttempt::class);
    }
}
