@extends('layouts.dashboard')
@section('styles')
    <link href="{{ asset('assets') }}/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar d-flex flex-stack py-4 py-lg-8">
            <!--begin::Toolbar wrapper-->
            <div class="d-flex flex-grow-1 flex-stack flex-wrap gap-2 mb-n10" id="kt_toolbar">
                @include('components.profile.breadcrumb', [
                    'title' => 'Quiz Attempt Details',
                    'active' => $attempt->quiz->title,
                ])
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="card mb-5 mb-xl-8">
                <div class="card-body border-bottom">
                    <div class="d-flex mb-5 align-items-center justify-content-between ">
                        <div class="d-flex align-items-center flex-grow-1">
                            <div class="symbol symbol-45px me-5">
                                <img src="assets/media/avatars/300-25.jpg" alt="">
                            </div>
                            <div class="d-flex flex-column">
                                <a href="#"
                                    class="text-gray-900 text-hover-primary fs-2 fw-bold">{{ $attempt->quiz->title }}</a>
                                <span class="text-gray-500 fw-bold">{{ $attempt->quiz->type }},
                                    {{ $attempt->quiz->category?->name }}</span>
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
                                                class="fs-3 text-primary fw-semibold">{{ count($attempt->quiz->questions) }}</span>
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
                                            <span class="fs-3 text-success fw-semibold">{{ $correctAnswers }}</span>
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
                                            <span class="fs-3 text-danger fw-semibold">{{ $wrongAnswers }}</span>
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
                        @if ($attempt->quiz->is_reviewable)
                            <div class="table-responsive mt-7">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <thead>
                                        <tr class="border-0">
                                            <th class="p-0 text-gray-900 fw-bolder fs-5">Question</th>
                                            <th class="p-0 min-w-150px text-gray-900 fw-bolder fs-5">Your Answer
                                            </th>
                                            <th class="p-0 min-w-150px text-gray-900 fw-bolder fs-5">Correct Answer
                                            </th>
                                            <th class="p-0 min-w-100px text-gray-900 fw-bolder fs-5">Status</th>
                                            <th class="p-0 min-w-100px text-gray-900 fw-bolder fs-5">Score</th>
                                            <th class="p-0 min-w-100px text-gray-900 fw-bolder fs-5">Video</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($answers as $index => $answer)
                                            @php
                                                $correctOption = $answer->question->QuestionOption
                                                    ->where('is_correct', true)
                                                    ->first()->option_text;
                                                $question = $answer->question;
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <span
                                                                class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">
                                                                {{ $answer->question->title }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="">
                                                    <span
                                                        class="{{ $answer->option->option_text != $correctOption ? 'text-danger' : 'text-success' }}">{{ $answer->option->option_text ?? 'N/A' }}</span>
                                                </td>
                                                <td class="">
                                                    {{ $correctOption }}
                                                </td>
                                                <td class="">
                                                    <span>
                                                        @if ($answer->option->option_text != $correctOption)
                                                            <span class="badge badge-light-danger">Wrong</span>
                                                        @else
                                                            <span class="badge badge-light-success">Correct</span>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td class="">
                                                    {{ $answer->question->points }}
                                                </td>
                                                <td class="">
                                                    Video
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    <div class="separator mb-4"></div>
                    <a href="{{ route('quiz.index', ['slug' => $attempt->quiz->slug]) }}" class="btn btn-primary">Retry
                        Quiz</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets') }}/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="{{ asset('assets') }}/js/custom/apps/ecommerce/catalog/products.js"></script>
@endsection
