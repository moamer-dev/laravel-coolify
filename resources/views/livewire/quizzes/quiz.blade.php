<section class="pt-5 pb-5">
    <div class="row g-5 g-xl-10">
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::Engage widget 1-->
            <div class="card h-md-100">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column flex-center">
                    <!--begin::Heading-->
                    <div class="mb-2 w-100">
                        @if (!$isSubmitted && $isStarted)
                            <div class="d-flex align-items-center">
                                <!-- Controls Section -->
                                <div class="d-flex align-items-center mx-3" style="flex: 5; direction: ltr">
                                    <!-- Previous Button -->
                                    <button wire:click="next" class="btn btn-outline-primary btn-sm"
                                        style="direction: ltr">
                                        <i class="bi bi-arrow-left"></i>
                                    </button>

                                    <!-- Progress Text -->
                                    <span class="fw-semibold text-gray-800 mx-2">
                                        {{ $currentStep + 1 }} / {{ count($quiz->questions) }}
                                    </span>

                                    <!-- Next Button -->
                                    <button wire:click="previous" class="btn btn-outline-primary btn-sm"
                                        style="direction: ltr">
                                        <i class="bi bi-arrow-right"></i>
                                    </button>
                                </div>
                                <div class="progress me-4" style="flex: 5; height: 20px;">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                        role="progressbar" aria-label="Quiz Progress"
                                        aria-valuenow="{{ (($currentStep + 1) / count($quiz->questions)) * 100 }}"
                                        aria-valuemin="0" aria-valuemax="100"
                                        style="width: {{ (($currentStep + 1) / count($quiz->questions)) * 100 }}%;">
                                    </div>
                                </div>
                            </div>
                        @endif


                        <!-- Title -->
                        <h1 class="fw-semibold text-gray-800 text-center lh-lg mt-4">Have you tried
                            <br>new
                            <span class="fw-bolder">Invoice Manager?</span>
                        </h1>

                        <!-- Illustration -->
                        <div class="py-10 text-center">
                            <img src="assets/media/svg/illustrations/easy/2.svg" class="theme-light-show w-200px"
                                alt="">
                            <img src="assets/media/svg/illustrations/easy/2-dark.svg" class="theme-dark-show w-200px"
                                alt="">
                        </div>
                    </div>
                    <!--end::Heading-->

                    <!-- Links -->
                    <div class="text-center mb-1">
                        <a href="{{ route('user.quiz-attempts') }}" class="btn btn-sm btn-primary me-2">Quiz
                            Attempts</a>
                        <a class="btn btn-sm btn-light" href="account/settings.html">Learn More</a>
                    </div>
                    <!--end::Links-->
                </div>
                <!--end::Body-->
            </div>


            <!--end::Engage widget 1-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-8">
            <!--begin::Table Widget 4-->
            @if (!$isSubmitted && !$isStarted)
                <div class="card mb-5 mb-xl-8 h-md-100">
                    <div class="card-body pb-0">
                        <div class="d-flex align-items-center mb-5">
                            <div class="d-flex align-items-center flex-grow-1">
                                <div class="symbol symbol-45px me-5">
                                    <img src="assets/media/avatars/300-25.jpg" alt="">
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="#"
                                        class="text-gray-900 text-hover-primary fs-4 fw-bold">{{ $quiz->title }}</a>
                                    <span class="text-gray-500 fw-bold">{{ $quiz->type }},
                                        {{ $quiz->category?->name }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="bgi-no-repeat bgi-size-cover rounded min-h-250px mb-5"
                                style="background-image:url('assets/media/stock/900x600/20.jpg');"></div>
                            <h5 class="card-title">Read the instructions before starting</h5>
                            <div class="text-gray-800 mb-5">{{ $quiz->description }}</div>
                            <div class="separator mb-4"></div>
                            <div class="d-flex align-items-center mb-5">
                                <a href="#" wire:click.prevent="startQuiz" class="btn btn-primary mt-4">Start
                                    Quiz</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (!$isSubmitted && $isStarted)
                <div class="card mb-5 mb-xl-8 h-md-100">
                    <div class="card-body pb-0">
                        <div class="d-flex align-items-center justify-content-between mb-5">
                            <div class="d-flex align-items-center flex-grow-1">
                                <div class="symbol symbol-45px me-5">
                                    <img src="assets/media/avatars/300-25.jpg" alt="">
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="#"
                                        class="text-gray-900 text-hover-primary fs-4 fw-bolder">{{ $quiz->title }}</a>
                                    <span class="text-gray-500 fw-bold">{{ $quiz->type }},
                                        {{ $quiz->category?->name }}</span>
                                </div>
                            </div>
                            <div>
                                @if ($quiz->is_timed)
                                    <div class="fw-bolder">
                                        Time remaining: <span>{{ gmdate('H:i:s', $timeRemaining) }}</span>
                                    </div>
                                    <div wire:poll.1s="decrementTimer"></div>
                                @endif
                            </div>
                        </div>
                        <style>
                        </style>

                        <div class="mb-5">
                            @if ($currentStep < count($quiz->questions))
                                @php
                                    $question = $quiz->questions[$currentStep];
                                @endphp
                                <div class="p-4 fw-bolder fs-4">
                                    {!! $question->title !!}
                                </div>

                                <div class="list-group" style="--bs-list-group-bg: none !important">
                                    @foreach ($question->QuestionOption as $option)
                                        <div class="list-group-item list-group-item-action" aria-current="true"
                                            onclick="document.getElementById('option_{{ $question->id }}_{{ $option->id }}').click();">
                                            <div class="form-check py-3">
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


                                <div class="mt-4">
                                    @if ($currentStep > 0)
                                        <button wire:click="previous" class="btn btn-light-primary">Previous</button>
                                    @endif
                                    @if ($currentStep == count($quiz->questions) - 1)
                                        <button wire:click="submitQuiz" class="btn btn-primary ms-2">Submit</button>
                                    @else
                                        <button wire:click="next" class="btn btn-light-primary">Next</button>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
            @if ($isSubmitted && $isFinished)
                <div class="card mb-5 mb-xl-8 h-md-100">
                    <div class="card-body border-bottom">
                        <div class="d-flex mb-5 align-items-center justify-content-between ">
                            <div class="d-flex align-items-center flex-grow-1">
                                <div class="symbol symbol-45px me-5">
                                    <img src="assets/media/avatars/300-25.jpg" alt="">
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="#"
                                        class="text-gray-900 text-hover-primary fs-4 fw-bold">{{ $quiz->title }}</a>
                                    <span class="text-gray-500 fw-bold">{{ $quiz->type }},
                                        {{ $quiz->category?->name }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="separator mb-4"></div>
                        <div>
                            <h3 class="my-7">Quiz Summary</h3>
                        </div>
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
                                                <span class="fs-3 text-danger fw-semibold">{{ $worngAnswers }}</span>
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
                                @if ($score >= $quiz->passing_score)
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
                        <div class="row row-cols-lg-12 row-cols-1 mt-3">
                            @if ($quiz->is_reviewable)
                                <div class="table-responsive">
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="border-0">
                                                <th class="p-0 text-gray-900 fw-bolder fs-5">Question</th>
                                                <th class="p-0 min-w-150px text-gray-900 fw-bolder fs-5">Your
                                                    Answer
                                                </th>
                                                <th class="p-0 min-w-150px text-gray-900 fw-bolder fs-5">Correct
                                                    Answer
                                                </th>
                                                <th class="p-0 min-w-100px text-gray-900 fw-bolder fs-5">Status
                                                </th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
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
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <span
                                                                    class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">
                                                                    {!! $question->title !!}</span>
                                                            </div>
                                                            <!--end::Name-->
                                                        </div>
                                                    </td>
                                                    <td class="">
                                                        @if ($userAnswer)
                                                            <span
                                                                class="{{ $userAnswer->id == $correctOption->id ? 'text-success' : 'text-danger' }}">
                                                                {{ $userAnswer->option_text }}
                                                            </span>
                                                        @else
                                                            Not attempted
                                                        @endif
                                                    </td>
                                                    <td class="">
                                                        {{ $correctOption->option_text }}
                                                    </td>
                                                    <td class="">
                                                        @if ($userAnswer)
                                                            @if ($userAnswer->id == $correctOption->id)
                                                                <span class="badge badge-light-success">Correct</span>
                                                            @else
                                                                <span class="badge badge-light-danger">Wrong</span>
                                                            @endif
                                                        @else
                                                            <span class="badge bg-light-warning">Not
                                                                attempted</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>
                            @endif
                        </div>
                        <div class="separator mb-4"></div>
                        <button wire:click="resetQuiz" class="btn btn-primary">Retry Quiz</button>
                    </div>
                </div>

            @endif
            <!--end::Table Widget 4-->
        </div>
        <!--end::Col-->
    </div>
</section>
