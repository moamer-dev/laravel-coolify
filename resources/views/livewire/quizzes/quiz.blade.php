<section class="pt-5 pb-5">
    <div class="container">
        <div class="row mt-0 mt-md-4 justify-content-center">
            <div class="col-lg-7 col-md-4 col-12">
                @if (!$isSubmitted && !$isStarted)
                    <div class="card">
                        <div class="card-header">
                            {{ $quiz->title }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Read the instructions before starting</h5>
                            <p class="card-text">{{ $quiz->description }}</p>
                            <a href="#" wire:click.prevent="startQuiz" class="btn btn-primary">Start Quiz</a>
                        </div>
                    </div>
                @endif
                @if (!$isSubmitted && $isStarted)
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class = "d-flex justify-content-between">
                                <h3 class="mb-3">{{ $quiz->title }}</h3>
                                @if ($quiz->is_timed)
                                    <div class="text-success fw-bolder">
                                        Time remaining: <span>{{ gmdate('H:i:s', $timeRemaining) }}</span>
                                    </div>
                                    <div wire:poll.1s="decrementTimer"></div>
                                @endif
                            </div>

                            @if ($currentStep < count($quiz->questions))
                                @php
                                    $question = $quiz->questions[$currentStep];
                                @endphp
                                @if ($quiz->description)
                                    <p>{{ $quiz->description }}</p>
                                @endif
                                <h3>{{ $question->title }}</h3>

                                <div class="list-group">
                                    @foreach ($question->QuestionOption as $option)
                                        <div class="list-group-item list-group-item-action" aria-current="true">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="answer_{{ $question->id }}"
                                                    id="option_{{ $question->id }}_{{ $option->id }}"
                                                    wire:click="submitAnswer({{ $question->id }}, {{ $option->id }})"
                                                    {{ $answers[$question->id] == $option->id ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="option_{{ $question->id }}_{{ $option->id }}">
                                                    {{ $option->option_text }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mt-2">
                                    @if ($currentStep > 0)
                                        <button wire:click="previous" class="btn btn-outline-primary">Previous</button>
                                    @endif
                                    @if ($currentStep == count($quiz->questions) - 1)
                                        <button wire:click="submitQuiz"
                                            class="btn btn-outline-success ms-2">Submit</button>
                                    @else
                                        <button wire:click="next" class="btn btn-outline-primary">Next</button>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
                @if ($isSubmitted && $isFinished)
                    <div class="card mb-4">
                        <!-- Card body -->
                        <div class="card-header">
                            <h3 class="mb-0">Result of {{ $quiz->title }}</h3>
                        </div>
                        <!-- card -->
                        <div class="card-body border-bottom">
                            <!-- row -->
                            <div class="row row-cols-lg-3 row-cols-1">
                                <div class="col">
                                    <!-- card -->
                                    <div class="card bg-gray-100 shadow-none mb-3 mb-lg-0">
                                        <!-- card body -->
                                        <div class="card-body">
                                            <h4 class="mb-0">Total Questions</h4>
                                            <div class="mt-5 d-flex justify-content-between align-items-center lh-1">
                                                <div>
                                                    <span
                                                        class="fs-3 text-primary fw-semibold">{{ count($quiz->questions) }}</span>
                                                </div>
                                                <div class="align-middle">
                                                    <i class="fe fe-users h2 text-primary"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- col -->
                                <div class="col">
                                    <!-- card -->
                                    <div class="card bg-gray-100 shadow-none mb-3 mb-lg-0">
                                        <!-- card body -->
                                        <div class="card-body">
                                            <h4 class="mb-0">Correct Answers</h4>
                                            <div class="mt-5 d-flex justify-content-between align-items-center lh-1">
                                                <div>
                                                    <span
                                                        class="fs-3 text-success fw-semibold">{{ $correctAnswers }}</span>
                                                </div>
                                                <div class="align-middle">
                                                    <i class="fe fe-clipboard h2 text-success"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- card -->
                                    <div class="card bg-gray-100 shadow-none mb-3 mb-lg-0">
                                        <!-- card body -->
                                        <div class="card-body">
                                            <h4 class="mb-0">Wrong Answers</h4>
                                            <div class="mt-5 d-flex justify-content-between align-items-center lh-1">
                                                <div>
                                                    <span
                                                        class="fs-3 text-danger fw-semibold">{{ $worngAnswers }}</span>
                                                </div>
                                                <div class="align-middle">
                                                    <i class="fe fe-clock h2 text-danger"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-cols-lg-12 row-cols-1 mt-3">
                                <div class="col-12">
                                    @if ($score >= $quiz->passing_percentage)
                                        <div class="alert bg-light-success fade show" role="alert">
                                            <p>Your score: <strong>{{ $score }} </strong> out of
                                                <strong>{{ $totalQuestionsPoints }}</strong>
                                            </p>
                                            <p> <strong> Congratulations! </strong> You passed the quiz.</p>
                                        </div>
                                    @else
                                        <div class="alert bg-light-warning text-dark-warning fade show" role="alert">
                                            <p>Your score: <strong>{{ $score }} </strong> out of
                                                <strong>{{ $totalQuestionsPoints }}</strong>
                                            </p>
                                            <p><strong> Sorry, </strong> you did not pass the quiz.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <button wire:click="resetQuiz" class="btn btn-outline-primary">Retry Quiz</button>
                        </div>
                    </div>
                    @if ($quiz->is_reviewable)
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-header">
                                <h3 class="mb-0">Your Answers</h3>
                            </div>
                            <!-- card -->
                            <div class="card-body border-bottom">
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered text-nowrap">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Question</th>
                                                <th>Your Answer</th>
                                                <th>Correct Answer</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($quiz->questions as $question)
                                                @php
                                                    $correctOption = $question->QuestionOption
                                                        ->where('is_correct', true)
                                                        ->first();
                                                    $userAnswer = isset($answers[$question->id])
                                                        ? $question->QuestionOption->firstWhere(
                                                            'id',
                                                            $answers[$question->id],
                                                        )
                                                        : null;
                                                @endphp
                                                <tr>
                                                    <td>{{ $question->title }}</td>
                                                    <td>
                                                        @if ($userAnswer)
                                                            <span
                                                                class="{{ $userAnswer->id == $correctOption->id ? 'text-success' : 'text-danger' }}">
                                                                {{ $userAnswer->option_text }}
                                                            </span>
                                                        @else
                                                            Not attempted
                                                        @endif
                                                    </td>
                                                    <td>{{ $correctOption->option_text }}</td>
                                                    <td>
                                                        @if ($userAnswer)
                                                            @if ($userAnswer->id == $correctOption->id)
                                                                <span class="badge bg-success">Correct</span>
                                                            @else
                                                                <span class="badge bg-danger">Wrong</span>
                                                            @endif
                                                        @else
                                                            <span class="badge bg-warning">Not attempted</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</section>
