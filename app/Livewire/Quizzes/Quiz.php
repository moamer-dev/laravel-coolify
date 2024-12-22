<?php

namespace App\Livewire\Quizzes;

use Livewire\Component;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use App\Models\QuizAttempt;
use App\Models\QuestionOption;
use App\Models\Quiz as QuizModel;

class Quiz extends Component
{
    public $quizId;
    public $quiz;
    public $currentStep = 0;
    public $answers = [];
    public $score = 0;
    public $isStarted = false;
    public $isSubmitted = false;
    public $isFinished = false;
    public $correctAnswers = 0;
    public $worngAnswers = 0;
    public $totalQuestionsPoints = 0;
    public $timeRemaining;
    public $quizDurationInSeconds;

    public function mount($slug)
    {
        $quiz = QuizModel::with('questions.QuestionOption')->where('slug', $slug)->firstOrFail();
        $this->quiz = $quiz;
        $this->quizId = $quiz->id;

        foreach ($this->quiz->questions as $question) {
            $this->answers[$question->id] = null;
        }

        $this->correctAnswers = 0;
        $this->worngAnswers = 0;
        $this->totalQuestionsPoints = $this->quiz->questions->sum('points');

        if ($this->quiz->is_timed) {
            $this->quizDurationInSeconds = $this->convertDurationToSeconds($this->quiz->duration, $this->quiz->duration_unit);
            $this->timeRemaining = $this->quizDurationInSeconds;
        }

        $this->isStarted = false;
        $this->isSubmitted = false;
        $this->isFinished = false;
    }

    public function convertDurationToSeconds($duration, $unit)
    {
        switch ($unit) {
            case 'hours':
                return $duration * 3600;
            case 'minutes':
                return $duration * 60;
            default:
                return $duration;
        }
    }

    public function decrementTimer()
    {
        if ($this->quiz->is_timed) {
            if ($this->timeRemaining > 0) {
                $this->timeRemaining--;
            }
            if ($this->timeRemaining == 0 && !$this->isSubmitted) {
                //dd('Time is up!');
                $this->submitQuiz();
            }
        }
    }

    public function startQuiz()
    {
        $this->isStarted = true;
    }

    public function submitAnswer($questionId, $optionId)
    {
        $this->answers[$questionId] = $optionId;
    }

    public function next()
    {
        if ($this->currentStep < count($this->quiz->questions) - 1) {
            $this->currentStep++;
        }
    }

    public function previous()
    {
        if ($this->currentStep > 0) {
            $this->currentStep--;
        }
    }

    public function submitQuiz()
    {
        $this->score = 0;
        $user = Auth::user();
        $quizAttempt = QuizAttempt::create([
            'user_id' => $user->id,
            'quiz_id' => $this->quizId,
            'score' => $this->score,
        ]);
        foreach ($this->answers as $questionId => $optionId) {
            $option = QuestionOption::find($optionId);
            if ($option && $option->is_correct) {
                $question = $option->question;
                $this->score += $question->points;
                $this->correctAnswers++;
                Answer::create([
                    'user_id' => Auth::user()->id,
                    'quiz_id' => $this->quizId,
                    'question_id' => $questionId,
                    'option_id' => $optionId,
                    'quiz_attempt_id' => $quizAttempt->id,
                ]);
            } else {
                $this->worngAnswers++;
                Answer::create([
                    'user_id' => Auth::user()->id,
                    'quiz_id' => $this->quizId,
                    'question_id' => $questionId,
                    'option_id' => $optionId,
                    'quiz_attempt_id' => $quizAttempt->id,
                ]);
            }

            $quizAttempt->update([
                'score' => $this->score,
            ]);
            $quizAttempt->save();
        }

        $this->isSubmitted = true;
        $this->isFinished = true;

        $this->dispatch(
            'alert',
            type: 'success',
            title: 'Quiz submitted successfully!',
            position: 'top-end',
            timer: 1500,
        );
    }

    public function resetQuiz()
    {
        $this->currentStep = 0;
        foreach ($this->answers as $questionId => $value) {
            $this->answers[$questionId] = null;
        }
        $this->score = 0;
        $this->isSubmitted = false;
        $this->isFinished = false;
        $this->timeRemaining = $this->quizDurationInSeconds;
    }

    public function render()
    {
        return view('livewire.quizzes.quiz', [
            'title' => $this->quiz->title,
            'subtitle' => '',
        ]);
    }
}
