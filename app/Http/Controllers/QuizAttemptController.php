<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizAttempt;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class QuizAttemptController extends Controller
{
    public function show($attemptId)
    {
        // Fetch the quiz attempt
        $attempt = QuizAttempt::with(['quiz', 'quiz.questions.QuestionOption', 'user'])
            ->findOrFail($attemptId);

        // Fetch user's answers for this attempt
        // $answers = $attempt->quiz
        //     ->questions()
        //     ->with(['QuestionOption', 'answers' => function ($query) use ($attempt) {
        //         $query->where('quiz_id', $attempt->quiz_id)
        //             ->where('user_id', $attempt->user_id);
        //     }])
        //     ->get();

        $answers = Answer::where('quiz_attempt_id', $attemptId)
            ->with(['question', 'option'])
            ->get();
        //dd($answers);

        //dd($answers);

        // Calculate Summary Data
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
