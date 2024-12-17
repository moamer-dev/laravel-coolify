@php
    $quizAttempts = $user->quizAttempts;
@endphp
<div class="col-lg-9 col-md-8 col-12">
    <!-- Card -->
    <div class="card mb-4">
        <!-- Card body -->
        <div class="card-header">
            <h3 class="mb-0">Your Quiz Attempts</h3>
        </div>
        @if ($quizAttempts->isEmpty())
            <div class="card-body">
                <div class="text-center">
                    <img src="{{ asset('images/empty.svg') }}" alt="Empty" class="img-fluid" style="max-width: 200px">
                    <h4 class="mt-3">No quiz attempts found</h4>
                    <p class="text-muted">You have not attempted any quiz yet.</p>
                </div>
            </div>
        @else
            <!-- table -->
            <div class="table-responsive">
                <table class="table table-hover table-centered text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>Quiz</th>
                            <th>Score</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizAttempts as $quizAttempt)
                            <tr>
                                <td><a href="{{ route('quiz.index', $quizAttempt->quiz->slug) }}">
                                        {{ $quizAttempt->quiz->title }} </a>
                                </td>
                                <td>{{ $quizAttempt->score }}</td>
                                <td>
                                    @if ($quizAttempt->score >= $quizAttempt->quiz->passing_percentage)
                                        <span class="badge bg-success">Passed</span>
                                    @else
                                        <span class="badge bg-danger">Failed</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('quiz.attempt.show', ['attemptId' => $quizAttempt->id]) }}" class="btn btn-primary btn-sm">View</a>
                                    <a href="#" wire:click.prevent="delete({{ $quizAttempt->id }})"
                                        class="btn btn-danger btn-sm">Delete</a>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
