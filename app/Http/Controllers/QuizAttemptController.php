<?php

namespace App\Http\Controllers;

use App\Models\QuizAttempt;
use App\Models\Answer;

class QuizAttemptController extends Controller
{
    public function show($attemptId)
    {
        $attempt = QuizAttempt::with(['quiz', 'quiz.questions.QuestionOption', 'user'])
            ->findOrFail($attemptId);

        $answers = Answer::where('quiz_attempt_id', $attemptId)
            ->with(['question', 'option'])
            ->get();

        $totalQuestions = $attempt->quiz->questions->count();
        $correctAnswers = 0;
        $wrongAnswers = 0;

        foreach ($answers as $answer) {
            if ($answer->option->is_correct) {
                $correctAnswers++;
            } else {
                $wrongAnswers++;
            }
        }

        return view('dashboard.quiz.quiz-attempt-details', [
            'attempt' => $attempt,
            'questions' => $attempt->quiz->questions,
            'answers' => $answers,
            'totalQuestions' => $totalQuestions,
            'correctAnswers' => $correctAnswers,
            'wrongAnswers' => $wrongAnswers,
        ]);
    }
}
