@extends('layouts.dashboard')
@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <!-- Total Questions -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Questions</h5>
                    <p class="card-text">{{ $totalQuestions }}</p>
                </div>
            </div>
        </div>
        <!-- Correct Answers -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Correct Answers</h5>
                    <p class="card-text text-success">{{ $correctAnswers }}</p>
                </div>
            </div>
        </div>
        <!-- Wrong Answers -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Wrong Answers</h5>
                    <p class="card-text text-danger">{{ $wrongAnswers }}</p>
                </div>
            </div>
        </div>
    </div>

        <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>User's Answer</th>
                        <th>Correct Answer</th>
                        <th>Score</th>
                        <th>Video</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($answers as $index => $question)
                        @php
                            $userAnswer = $question->answers->first()?->option?->option_text;
                            $correctOption = $question->QuestionOption->where('is_correct', 1)->pluck('option_text')->first();
                        @endphp
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $question->title }}</td>
                            <td>{{ $userAnswer ?? 'N/A' }}</td>
                            <td>{{ $correctOption }}</td>
                            <td>{{ $question->points ?? 0 }}</td>
                            <td>
                                @if ($question->has_video)
                                    @if ($question->video_source === 'youtube')
                                        <a href="{{ $question->youtube_url }}" target="_blank">Watch Video</a>
                                    @elseif ($question->video_source === 'vimeo')
                                        <a href="{{ $question->vimeo_url }}" target="_blank">Watch Video</a>
                                    @elseif ($question->video_source === 'file')
                                        <a href="{{ asset('storage/' . $question->file_path) }}" target="_blank">Watch Video</a>
                                    @endif
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection