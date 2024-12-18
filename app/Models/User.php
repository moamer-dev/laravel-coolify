<?php

namespace App\Models;

use App\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Course;
use App\Models\Quiz;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
    ];
    // protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'creator_id');
    }

    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }

    public function learningPaths()
    {
        return $this->belongsToMany(LearningPath::class, 'user_learning_path')
            ->withTimestamps();
    }

    public function pathCourses()
    {
        return Course::whereHas('technologyStacks', function ($query) {
            $query->whereHas('learningStacks', function ($subQuery) {
                $subQuery->whereHas('learningPaths', function ($pathQuery) {
                    $pathQuery->whereIn('learning_paths.id', $this->learningPaths->pluck('id'));
                });
            });
        })->get();
    }

    public function pathQuizzes()
    {
        return Quiz::whereHas('technologyStacks', function ($query) {
            $query->whereHas('learningStacks', function ($subQuery) {
                $subQuery->whereHas('learningPaths', function ($pathQuery) {
                    $pathQuery->whereIn('learning_paths.id', $this->learningPaths->pluck('id'));
                });
            });
        })->get();
    }

    public function pathProjects()
    {
        return Project::whereHas('courses', function ($query) {
            $query->whereHas('technologyStacks', function ($techQuery) {
                $techQuery->whereHas('learningStacks', function ($stackQuery) {
                    $stackQuery->whereHas('learningPaths', function ($pathQuery) {
                        $pathQuery->whereIn('learning_paths.id', $this->learningPaths->pluck('id'));
                    });
                });
            });
        })->get();
    }
}
