<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizAttempt;
use Illuminate\Support\Facades\Auth;

class QuizAttemptController extends Controller
{
    public function show($attemptId)
    {
        // Fetch the quiz attempt
        $attempt = QuizAttempt::with(['quiz', 'quiz.questions.QuestionOption', 'user'])
            ->findOrFail($attemptId);

        // Fetch user's answers for this attempt
        $answers = $attempt->quiz
            ->questions()
            ->with(['QuestionOption', 'answers' => function ($query) use ($attempt) {
                $query->where('quiz_id', $attempt->quiz_id)
                    ->where('user_id', $attempt->user_id);
            }])
            ->get();

        // Calculate Summary Data
        $totalQuestions = $answers->count();
        $correctAnswers = 0;
        $wrongAnswers = 0;

        foreach ($answers as $question) {
            $userAnswer = $question->answers->first()?->option_id;
            $correctOption = $question->QuestionOption->where('is_correct', 1)->pluck('id')->toArray();

            if ($userAnswer && in_array($userAnswer, $correctOption)) {
                $correctAnswers++;
            } else {
                $wrongAnswers++;
            }
        }

        return view('dashboard.quiz.quiz-attempt-details', [
            'attempt' => $attempt,
            'answers' => $answers,
            'totalQuestions' => $totalQuestions,
            'correctAnswers' => $correctAnswers,
            'wrongAnswers' => $wrongAnswers,
        ]);
    }
}